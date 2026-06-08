<?php
/**
 * Template: Expense Management use case  (/ocr-expense-management/)
 */
get_header(); ?>

<section class="phero">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow"><?php echo sc_text( 'exp_eyebrow' ); ?></span>
    <h1><?php echo sc_text( 'exp_h1' ); ?></h1>
    <p class="lead"><?php echo sc_text( 'exp_lead' ); ?></p>
    <div class="row">
      <a class="btn btn-primary btn-lg" href="https://dashboard.tabscanner.com/register">Test Drive The Uploader <span class="arr">→</span></a>
      <a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Schedule A Chat</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">Automated Receipt Capture</span><h2>Enterprise-grade expense automation, at the most affordable rates</h2></div>
    <div class="intro-copy">
      <p>Our API uses the most advanced AI OCR engines in the world. With full compliance and enterprise-grade security. Tabscanner revolutionizes expense management by automating the receipt capture process, at the most affordable rates for an enterprise-grade solution.</p>
      <p>No latency or downtime make it an essential tool for organizations operating across multiple regions and dealing with various currencies. Our layout aware API streamlines the expense reporting workflow, ensuring accuracy and efficiency in handling global expense claims.</p>
      <p>Developer-friendly accounting system integration. Comprehensive breakdowns of expenses from receipts. Offering transparency and detailed tracking. Critical for thorough financial management and analysis.</p>
    </div>
  </div>
</section>

<section class="section" style="background:var(--bg-2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
  <div class="wrap">
    <div class="def" style="max-width:980px;margin:0 auto">
      <span class="eyebrow">Multi-Currency</span>
      <h4 style="font-size:22px;margin:10px 0 12px">Built for international businesses</h4>
      <p>Tabscanner excels in environments with multiple currencies. Our system automatically recognizes and converts foreign currency transactions into your business's base currency using accurate, up-to-date exchange rates. This feature is essential for international businesses and ensures that expense reimbursements are precise and fair.</p>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">Case Studies</span><h2>Expense OCR Case Studies</h2></div>
    <div class="uc">
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="var(--brand-3)" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg></div>
        <h4>Center — Integrated Expense Management</h4>
        <p>Center integrated Tabscanner's receipt OCR solution to work with their corporate credit card. The Center app automatically matches receipt images captured with transactions made on the card enabling fast and seamless expense tracking.</p>
      </div>
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="var(--brand-3)" stroke-width="1.8"><path d="M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div>
        <h4>Wevat — Tax-Free Shopping in France</h4>
        <p>Wevat's tax rebate solution uses Tabscanner to extract accurate data for foreign shoppers through their app. The application enables shoppers to calculate and submit their rebate by taking pictures of their receipts directly through their app.</p>
      </div>
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="var(--brand-3)" stroke-width="1.8"><path d="M9 12h6M9 16h6M9 8h6M5 3h11l4 4v14H5z"/></svg></div>
        <h4>Lightyear — Purchasing &amp; Bookkeeping</h4>
        <p>Lightyear uses Tabscanner to automate and extract receipt and invoice data. Helping streamline its accounts payable and integrated bookkeeping platform.</p>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:var(--bg-2);border-top:1px solid var(--line)">
  <div class="wrap">
    <div class="midcta">
      <h2><?php echo sc_text( 'exp_midcta_h2' ); ?></h2>
      <h3><?php echo sc_text( 'exp_midcta_h3' ); ?></h3>
      <div class="row">
        <a class="btn btn-ghost btn-lg" href="https://dashboard.tabscanner.com/register">Test Drive The Uploader <span class="arr">→</span></a>
        <a class="s" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Schedule A Chat</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
