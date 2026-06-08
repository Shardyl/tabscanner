/* Live hero receipt-OCR uploader — talks to the server-side REST proxy (key stays on the server). */
(function () {
  var cfg = window.TS_DEMO || {};
  var base = cfg.base || '/wp-json/tabscanner/v1/';
  var register = cfg.register || 'https://dashboard.tabscanner.com/register';
  var scan = document.getElementById('demo');
  if (!scan) return;
  var file = document.getElementById('uplFile');
  var drop = document.getElementById('uplDrop');
  var foot = document.getElementById('uplFootBtn');
  var thumb = document.getElementById('uplThumb');
  var statusT = document.getElementById('uplStatusT');
  var timerEl = document.getElementById('uplTimer');
  var result = document.getElementById('uplResult');
  var errBox = document.getElementById('uplErr');
  var again = document.getElementById('uplAgain');
  var t0 = 0, ti = null;

  function fmt(ms) { return (ms / 1000).toFixed(1) + 's'; }
  function money(v) { return (v == null || v === '') ? '—' : Number(v).toFixed(2); }
  function esc(s) { return String(s).replace(/[&<>]/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;' }[c]; }); }
  function setState(s) {
    scan.classList.remove('busy', 'done', 'error');
    if (s) scan.classList.add(s);
  }

  function pick() { file.click(); }
  if (drop) {
    drop.addEventListener('click', pick);
    ['dragenter', 'dragover'].forEach(function (e) { drop.addEventListener(e, function (ev) { ev.preventDefault(); drop.classList.add('over'); }); });
    ['dragleave', 'drop'].forEach(function (e) { drop.addEventListener(e, function (ev) { ev.preventDefault(); drop.classList.remove('over'); }); });
    drop.addEventListener('drop', function (ev) { var f = ev.dataTransfer.files[0]; if (f) start(f); });
  }
  if (foot) foot.addEventListener('click', pick);
  file.addEventListener('change', function (e) { if (e.target.files[0]) start(e.target.files[0]); });
  if (again) again.addEventListener('click', function () { setState(''); file.value = ''; });

  // Shrink big phone photos before upload — faster transfer, faster + more accurate OCR.
  function resizeImage(file, maxDim) {
    return new Promise(function (resolve) {
      try {
        var img = new Image();
        img.onload = function () {
          var w = img.width, h = img.height;
          if (!w || !h || Math.max(w, h) <= maxDim) { resolve(file); return; }
          var s = maxDim / Math.max(w, h);
          var c = document.createElement('canvas');
          c.width = Math.round(w * s); c.height = Math.round(h * s);
          c.getContext('2d').drawImage(img, 0, 0, c.width, c.height);
          if (c.toBlob) { c.toBlob(function (b) { resolve(b && b.size ? b : file); }, 'image/jpeg', 0.85); }
          else { resolve(file); }
        };
        img.onerror = function () { resolve(file); };
        img.src = URL.createObjectURL(file);
      } catch (e) { resolve(file); }
    });
  }

  function start(f) {
    if (!/image\/(jpeg|png)/.test(f.type)) { alert('Please choose a JPG or PNG.'); return; }
    setState('busy'); errBox.textContent = ''; result.innerHTML = '';
    thumb.src = URL.createObjectURL(f);
    statusT.textContent = 'Optimising image…';
    t0 = performance.now(); clearInterval(ti);
    ti = setInterval(function () { timerEl.textContent = fmt(performance.now() - t0); }, 50);
    resizeImage(f, 2000).then(function (blob) {
      statusT.textContent = 'Uploading…';
      var fd = new FormData();
      fd.append('file', blob, 'receipt.jpg');
      return fetch(base + 'demo-process', { method: 'POST', body: fd }).then(function (r) { return r.json(); });
    }).then(function (pr) {
      if (!pr || pr.success === false || !pr.token) { throw new Error((pr && pr.message) || 'Upload failed.'); }
      statusT.textContent = 'Reading receipt with AI…';
      return poll(pr.token);
    }).then(done).catch(function (e) { fail(e.message); });
  }

  function poll(token) {
    return new Promise(function (resolve, reject) {
      var n = 0;
      (function tick() {
        setTimeout(function () {
          fetch(base + 'demo-result/' + encodeURIComponent(token) + '?_=' + Date.now(), { cache: 'no-store' })
            .then(function (r) { return r.json(); })
            .then(function (r) {
              if (r.status === 'done') return resolve(r);
              if (r.status === 'failed') return reject(new Error('Could not read that receipt — try a clearer, straight-on photo.'));
              if (++n > 50) return reject(new Error('That receipt is taking unusually long — please try again, or get in touch and we can help.'));
              tick();
            })
            .catch(reject);
        }, 900);
      })();
    });
  }

  function done(r) {
    clearInterval(ti); setState('done');
    var res = r.result || {};
    var conf = res.totalConfidence != null ? (' · ' + Math.round(res.totalConfidence * 100) + '%') : '';
    statusT.innerHTML = '<span class="badge-ok">Parsed' + conf + '</span>';
    var h = '<div class="upl-merch">' + esc(res.establishment || 'Receipt') + '</div>';
    var meta = [res.date || '', res.currency || ''].filter(Boolean).map(esc).join('  ·  ');
    if (meta) h += '<div class="upl-meta">' + meta + '</div>';
    (res.lineItems || []).forEach(function (li) {
      h += '<div class="upl-row"><span>' + esc(li.descClean || 'Item') + '</span><span>' + money(li.lineTotal) + '</span></div>';
    });
    if (res.subTotal != null) h += '<div class="upl-row"><span>Subtotal</span><span>' + money(res.subTotal) + '</span></div>';
    if (res.tax != null) h += '<div class="upl-row"><span>Tax</span><span>' + money(res.tax) + '</span></div>';
    h += '<div class="upl-row tot"><span>TOTAL</span><span>' + money(res.total) + '</span></div>';
    if (res.gated) {
      var more = (res.lineItemCount || 0) - (res.lineItems || []).length;
      h += '<div class="upl-gate"><p>+ ' + more + ' more line items extracted. Create a free account to unlock the full breakdown.</p><a href="' + register + '">Get the full result, free →</a></div>';
    }
    result.innerHTML = h;
  }

  function fail(msg) {
    clearInterval(ti); setState('error');
    statusT.textContent = 'Error';
    errBox.textContent = msg || 'Something went wrong.';
  }

  // ----- contact modal -----
  var modal = document.getElementById('contactModal');
  var openC = document.getElementById('uplContact');
  var closeC = document.getElementById('contactClose');
  function openModal() { if (modal) { modal.classList.add('open'); modal.setAttribute('aria-hidden', 'false'); } }
  function closeModal() { if (modal) { modal.classList.remove('open'); modal.setAttribute('aria-hidden', 'true'); } }
  if (openC) openC.addEventListener('click', openModal);
  if (closeC) closeC.addEventListener('click', closeModal);
  if (modal) modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });

  var cform = document.getElementById('contactModalForm');
  if (cform) {
    cform.addEventListener('submit', function (e) {
      e.preventDefault();
      var note = document.getElementById('contactModalNote');
      var btn = cform.querySelector('button[type=submit]');
      btn.disabled = true; note.className = 'formnote'; note.textContent = 'Sending…';
      var data = { name: cform.name.value, email: cform.email.value, message: cform.message.value, website: cform.website.value };
      fetch((cfg.base || '/wp-json/tabscanner/v1/') + 'enquiry', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, j: j }; }); })
        .then(function (res) {
          if (res.ok && res.j.ok) { note.className = 'formnote ok'; note.textContent = "Thanks — your message has been sent. We'll be in touch shortly."; cform.reset(); }
          else { note.className = 'formnote err'; note.textContent = (res.j && res.j.error) || 'Sorry, something went wrong. Please email api@tabscanner.com.'; }
        })
        .catch(function () { note.className = 'formnote err'; note.textContent = 'Sorry, something went wrong.'; })
        .finally(function () { btn.disabled = false; });
    });
  }
})();
