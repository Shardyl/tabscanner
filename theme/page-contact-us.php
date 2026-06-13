<?php
/**
 * Template: Contact Us  (/contact-us/)
 */
get_header(); ?>

<section class="phero">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow"><?php echo sc_text( 'contactpg_eyebrow' ); ?></span>
    <h1><?php echo sc_text( 'contactpg_h1' ); ?></h1>
    <p class="lead"><?php echo sc_text( 'contactpg_lead' ); ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="contact">
      <div>
        <span class="eyebrow"><?php echo sc_text( 'contactpg_offices_eyebrow' ); ?></span>
        <h2 style="font-size:30px;margin:14px 0 22px"><?php echo sc_text( 'contactpg_offices_h2' ); ?></h2>
        <div class="office">
          <h4><?php echo sc_text( 'contactpg_hq_h4' ); ?></h4>
          <p><?php echo sc_text( 'contactpg_hq_p' ); ?></p>
        </div>
        <div class="office">
          <h4><?php echo sc_text( 'contactpg_usa_h4' ); ?></h4>
          <p><?php echo sc_text( 'contactpg_usa_p' ); ?></p>
        </div>
        <div class="office">
          <h4>Press Kit</h4>
          <p><a href="<?php echo esc_url( home_url('/company-overview/') ); ?>" style="color:var(--brand-3);font-weight:600">Press Kit &amp; Company Overview →</a></p>
        </div>
      </div>

      <form class="cform" id="ts-enquiry">
        <div class="field"><label>Name</label><input type="text" name="name" required placeholder="Your name"></div>
        <div class="field"><label>Email</label><input type="email" name="email" required placeholder="you@company.com"></div>
        <div class="field"><label>Message</label><textarea name="message" required placeholder="Tell us about your project"></textarea></div>
        <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
        <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center">SUBMIT</button>
        <div class="formnote" id="ts-enquiry-note" role="status"></div>
      </form>
    </div>
  </div>
</section>

<script>
(function(){
  var f=document.getElementById('ts-enquiry'); if(!f) return;
  var fStart=Date.now();
  var note=document.getElementById('ts-enquiry-note');
  f.addEventListener('submit',function(e){
    e.preventDefault();
    var btn=f.querySelector('button[type=submit]'); btn.disabled=true; note.className='formnote'; note.textContent='Sending…';
    var data={name:f.name.value,email:f.email.value,message:f.message.value,website:f.website.value,js:'ts1',et:Date.now()-fStart,turnstile:(f.querySelector('[name="cf-turnstile-response"]')||{}).value||''};
    fetch('<?php echo esc_url_raw( rest_url('tabscanner/v1/enquiry') ); ?>',{
      method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)
    }).then(function(r){return r.json().then(function(j){return {ok:r.ok,j:j};});})
      .then(function(res){
        if(res.ok && res.j.ok){ note.className='formnote ok'; note.textContent='Thanks — your message has been sent. We will be in touch shortly.'; f.reset(); }
        else { note.className='formnote err'; note.textContent=(res.j&&res.j.error)||'Sorry, something went wrong. Please email api@tabscanner.com.'; }
      }).catch(function(){ note.className='formnote err'; note.textContent='Sorry, something went wrong. Please email api@tabscanner.com.'; })
      .finally(function(){ btn.disabled=false; });
  });
})();
</script>

<?php get_footer(); ?>
