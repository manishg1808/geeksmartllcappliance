<?php
/**
 * GeekSmart Appliance - Cookie Consent Banner
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="cookie-banner" id="cookie-banner" style="display: none;">
  <div class="cookie-banner-body">
    <i data-lucide="cookie" class="cookie-banner-icon"></i>
    <div>
      <h5>Cookie &amp; Privacy Preference</h5>
      <p>
        We use essential cookies to personalize your experience, analyze site usage, and support diagnostic requests. By continuing, you agree to our <a href="<?php echo SITE_URL; ?>/privacy-policy.php">Privacy Policy</a>.
      </p>
    </div>
  </div>
  <div class="cookie-banner-actions">
    <button type="button" id="accept-cookies" class="btn btn-cyan btn-sm">Accept All Cookies</button>
  </div>
</div>
