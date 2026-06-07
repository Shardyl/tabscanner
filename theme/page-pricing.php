<?php
/**
 * Template: Pricing  (/pricing/)
 */
get_header(); ?>

<section class="phero">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow">Pricing</span>
    <h1>Simple <span class="g">Monthly Plans</span></h1>
    <p class="lead">1 credit = 1 receipt scan. No credit card required for starter plan.</p>
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
    <p class="price-note">Our enterprise plans are far less expensive than competitors like Amazon and Veryfi, at a fraction of a cent depending on volume.</p>
  </div>
</section>

<section class="section" style="background:var(--bg-2);border-top:1px solid var(--line)">
  <div class="wrap">
    <div class="midcta">
      <h2>Free to use now</h2>
      <h3>Start extracting receipt data from day 1. No credit card required for the starter plan.</h3>
      <div class="row">
        <a class="btn btn-ghost btn-lg" href="https://dashboard.tabscanner.com/register">Get Started Free <span class="arr">→</span></a>
        <a class="s" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Schedule A Chat</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
