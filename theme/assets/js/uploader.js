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

  function start(f) {
    if (!/image\/(jpeg|png)/.test(f.type)) { alert('Please choose a JPG or PNG.'); return; }
    setState('busy'); errBox.textContent = ''; result.innerHTML = '';
    thumb.src = URL.createObjectURL(f);
    statusT.textContent = 'Uploading…';
    t0 = performance.now(); clearInterval(ti);
    ti = setInterval(function () { timerEl.textContent = fmt(performance.now() - t0); }, 50);
    var fd = new FormData(); fd.append('file', f);
    fetch(base + 'demo-process', { method: 'POST', body: fd })
      .then(function (r) { return r.json(); })
      .then(function (pr) {
        if (!pr || pr.success === false || !pr.token) { throw new Error((pr && pr.message) || 'Upload failed.'); }
        statusT.textContent = 'Reading receipt with AI…';
        return poll(pr.token);
      })
      .then(done)
      .catch(function (e) { fail(e.message); });
  }

  function poll(token) {
    return new Promise(function (resolve, reject) {
      var n = 0;
      (function tick() {
        setTimeout(function () {
          fetch(base + 'demo-result/' + encodeURIComponent(token))
            .then(function (r) { return r.json(); })
            .then(function (r) {
              if (r.status === 'done') return resolve(r);
              if (r.status === 'failed') return reject(new Error('Could not read that receipt — try a clearer, straight-on photo.'));
              if (++n > 25) return reject(new Error('Timed out. Please try again.'));
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
})();
