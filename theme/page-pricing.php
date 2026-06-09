<?php
/**
 * Template: Pricing  (/pricing/)
 */
get_header(); ?>

<section class="phero">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow"><?php echo sc_text( 'pricepg_eyebrow' ); ?></span>
    <h1><?php echo sc_text( 'pricepg_h1' ); ?></h1>
    <p class="lead"><?php echo sc_text( 'pricepg_lead' ); ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="price-grid">
      <div class="plan rv">
        <div class="name">Starter</div><div class="tagline">integrate and test</div>
        <div class="price">$0</div><div class="excess">FREE</div>
        <ul>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Receipt OCR</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>API manager</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>200 credits per month</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Parameters</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Regional configs</li>
        </ul>
        <a class="btn btn-ghost" href="https://dashboard.tabscanner.com/register">GET STARTED</a>
      </div>
      <div class="plan rv">
        <div class="name">Per Credit</div><div class="tagline">300 monthly credits.</div>
        <div class="price">$24</div><div class="excess">$0.08 per excess credit.</div>
        <ul>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Receipt OCR</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>API key manager</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>300 Monthly Credits</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Parameters</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Regional Configs</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Scalable and flexible credits</li>
        </ul>
        <a class="btn btn-ghost" href="https://dashboard.tabscanner.com/register">GET STARTED</a>
      </div>
      <div class="plan pop rv">
        <div class="name">Business</div><div class="tagline">6000 monthly credits.</div>
        <div class="price">$360</div><div class="excess">$0.06 per excess credit.</div>
        <ul>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Receipt OCR</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>API key manager</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>6000 Monthly Credits</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Parameters</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Custom Regional Configs</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Scalable and flexible credits</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Dedicated support</li>
        </ul>
        <a class="btn btn-primary" href="https://dashboard.tabscanner.com/register">GET STARTED</a>
      </div>
      <div class="plan rv">
        <div class="name">Enterprise</div><div class="tagline">custom training and support</div>
        <div class="price">Unlimited</div><div class="excess">Sub-1-cent scans at scale</div>
        <ul>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Everything in business</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Custom configurations</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Full Data Support team</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Account manager</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Dedicated servers</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Guaranteed response times</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Guaranteed Uptime</li>
          <li><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>Custom SLA</li>
        </ul>
        <a class="btn btn-ghost" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">GET STARTED</a>
      </div>
    </div>
    <?php if ( sc_text( 'pricepg_note' ) ) : ?><p class="price-note"><?php echo sc_text( 'pricepg_note' ); ?></p><?php endif; ?>
  </div>
</section>

<!-- PRO SERVICE -->
<section class="section">
  <div class="wrap">
    <div class="pro">
      <div class="pro-glow"></div>
      <div class="pro-top">
        <span class="pro-badge"><?php echo sc_text( 'pro_eyebrow' ); ?></span>
        <div class="pro-price"><b><?php echo sc_text( 'pro_price_amt' ); ?></b><span><?php echo sc_text( 'pro_price_per' ); ?></span></div>
      </div>
      <h2 class="pro-h"><?php echo sc_text( 'pro_h2' ); ?></h2>
      <p class="pro-p"><?php echo sc_text( 'pro_p' ); ?></p>
      <div class="pro-feats">
        <div class="pro-feat"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span><?php echo sc_text( 'pro_f1' ); ?></span></div>
        <div class="pro-feat"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span><?php echo sc_text( 'pro_f2' ); ?></span></div>
        <div class="pro-feat"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span><?php echo sc_text( 'pro_f3' ); ?></span></div>
        <div class="pro-feat"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg><span><?php echo sc_text( 'pro_f4' ); ?></span></div>
      </div>
      <div class="pro-cta">
        <span class="pro-cta-q"><?php echo sc_text( 'pro_cta' ); ?></span>
        <a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url('/contact-us/') ); ?>"><?php echo sc_text( 'pro_btn' ); ?> <span class="arr">→</span></a>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:var(--bg-2);border-top:1px solid var(--line)">
  <div class="wrap">
    <div class="midcta">
      <h2><?php echo sc_text( 'pricepg_midcta_h2' ); ?></h2>
      <h3><?php echo sc_text( 'pricepg_midcta_h3' ); ?></h3>
      <div class="row">
        <a class="btn btn-ghost btn-lg" href="https://dashboard.tabscanner.com/register">Get Started Free <span class="arr">→</span></a>
        <a class="s" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Schedule A Chat</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
