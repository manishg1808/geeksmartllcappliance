<?php
/**
 * GeekSmart LLC Appliance - Official Cookie Policy Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Cookie Policy | " . SITE_NAME;
$pageDesc  = "Learn how GeekSmart LLC Appliance uses necessary, analytics, and functional cookies on our website.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 0 3.5rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container" style="max-width: 920px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="cookie" style="width: 14px; height: 14px;"></i> Privacy & Web Tracking Data</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem;" class="text-gradient">Cookie Policy</h1>
    <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 600;">Effective Date: May 25, 2026 • GeekSmart LLC Appliance</p>
  </div>
</section>

<section style="padding: 4rem 0; background: var(--bg-light);">
  <div class="container" style="max-width: 920px;">
    
    <!-- Table of Contents -->
    <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); margin-bottom: 2.5rem; box-shadow: var(--shadow-sm);">
      <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--text-main); margin-bottom: 1rem; border-left: 4px solid var(--primary); padding-left: 0.75rem;">
        Table of Contents
      </h3>
      <div class="grid grid-cols-2" style="font-size: 0.9rem; font-weight: 600; gap: 0.65rem;">
        <a href="#what-are-cookies" style="color: var(--primary);">1. What Are Cookies</a>
        <a href="#cookies-we-use" style="color: var(--primary);">2. Cookies We Use</a>
        <a href="#third-party-cookies" style="color: var(--primary);">3. Third-Party Cookies</a>
        <a href="#control-cookies" style="color: var(--primary);">4. How to Control Cookies</a>
        <a href="#changes-policy" style="color: var(--primary);">5. Changes to This Policy</a>
        <a href="#contact-us" style="color: var(--primary);">6. Contact Us</a>
      </div>
    </div>

    <!-- Main Content Body -->
    <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: 2rem; font-size: 0.95rem; color: var(--text-muted); line-height: 1.7;">
      
      <p style="font-size: 1.05rem; color: var(--text-main);">
        This Cookie Policy explains how <strong><?php echo SITE_NAME; ?></strong> ("we," "us," or "our") uses cookies and similar tracking technologies on our website. By continuing to navigate our site, you consent to the cookie usage described below.
      </p>

      <!-- Section 1 -->
      <div id="what-are-cookies" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">1. What Are Cookies</h2>
        <p style="margin-bottom: 1rem;">Cookies are small data files placed on your computer or mobile device when you visit a website. They are widely used by web developers to make websites function efficiently, remember preferences, and gather diagnostic statistics.</p>
        
        <div class="grid grid-cols-2" style="margin-top: 1rem;">
          <div style="background: var(--bg-light); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--border-light);">
            <strong style="color: var(--text-main); display: block; margin-bottom: 0.3rem;">Session Cookies</strong>
            <p style="font-size: 0.85rem;">Temporary files that expire automatically when you close your web browser.</p>
          </div>
          <div style="background: var(--bg-light); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--border-light);">
            <strong style="color: var(--text-main); display: block; margin-bottom: 0.3rem;">Persistent Cookies</strong>
            <p style="font-size: 0.85rem;">Files that remain stored on your device until a set expiration date or manual deletion.</p>
          </div>
        </div>
      </div>

      <!-- Section 2 -->
      <div id="cookies-we-use" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">2. Cookies We Use</h2>
        <div class="grid grid-cols-2">
          <div style="background: var(--primary-subtle); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--border-accent);">
            <strong style="color: var(--primary); display: block; margin-bottom: 0.3rem;"><i data-lucide="lock" style="width: 16px; height: 16px; vertical-align: middle;"></i> Necessary Cookies</strong>
            <p style="font-size: 0.85rem;">Essential for basic site navigation, form security, and online booking widgets.</p>
          </div>
          <div style="background: var(--success-subtle); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #a7f3d0;">
            <strong style="color: var(--success); display: block; margin-bottom: 0.3rem;"><i data-lucide="bar-chart-2" style="width: 16px; height: 16px; vertical-align: middle;"></i> Analytics Cookies</strong>
            <p style="font-size: 0.85rem;">Anonymously evaluate traffic patterns and popular service categories to improve usability.</p>
          </div>
        </div>
      </div>

      <!-- Section 3 -->
      <div id="third-party-cookies" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">3. Third-Party Cookies</h2>
        <p>Some cookies are set by third-party integrations (such as Google Analytics or payment processors) to provide embedded functionality. These third parties manage data according to their respective privacy standards.</p>
      </div>

      <!-- Section 4 -->
      <div id="control-cookies" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">4. How to Control Cookies</h2>
        <p>You can adjust your web browser settings to block or erase cookies at any time. Note that blocking necessary cookies may affect the performance of appointment booking forms.</p>
      </div>

      <!-- Section 5 -->
      <div id="changes-policy" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">5. Changes to This Policy</h2>
        <p>We may modify this Cookie Policy as web technologies evolve. Updated versions will be posted here with a revised effective date.</p>
      </div>

      <!-- Contact Us -->
      <div id="contact-us" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem;">6. Contact Us</h2>
        <div style="background: var(--text-main); color: #ffffff; padding: 1.75rem; border-radius: var(--radius-md);">
          <h4 style="font-size: 1.1rem; color: var(--cyan); margin-bottom: 0.75rem;"><?php echo SITE_NAME; ?></h4>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem;">📍 <?php echo BUSINESS_ADDRESS; ?></p>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem;">📧 <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" style="color: #60a5fa;"><?php echo EMAIL_ADDRESS; ?></a></p>
          <p style="font-size: 0.9rem;">📞 <a href="tel:<?php echo PHONE_RAW; ?>" style="color: var(--cyan); font-weight: 700;"><?php echo PHONE_NUMBER; ?></a></p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
