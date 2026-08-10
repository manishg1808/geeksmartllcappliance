<?php
/**
 * GeekSmart LLC Appliance - GDPR & CCPA Cookie Consent Banner Include
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="cookie-banner" id="cookie-banner" style="display: none;">
  <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
    <i class="ri-cookie-line" style="font-size: 1.5rem; color: var(--accent-cyan);"></i>
    <div>
      <h5 style="font-size: 1rem; font-weight: 700; color: #ffffff;">Cookie & Privacy Preference</h5>
      <p style="font-size: 0.85rem; color: rgba(255, 255, 255, 0.8); line-height: 1.4; margin-top: 4px;">
        We use essential cookies to personalize your experience, analyze site usage, and support diagnostic requests. By continuing, you agree to our <a href="<?php echo SITE_URL; ?>/privacy-policy.php" style="color: var(--accent-cyan); text-decoration: underline;">Privacy Policy</a>.
      </p>
    </div>
  </div>
  <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
    <button id="accept-cookies" class="btn btn-cyan btn-sm">Accept All Cookies</button>
  </div>
</div>
