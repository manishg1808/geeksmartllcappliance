<?php
/**
 * GeekSmart Appliance - Clean Footer Include
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <!-- Brand Summary -->
      <div>
        <img src="<?php echo SITE_URL; ?>/assets/images/logo-light.svg" alt="<?php echo SITE_NAME; ?>" width="210" style="margin-bottom: 1.25rem;">
        <p style="font-size: 0.9rem; line-height: 1.6; color: #94a3b8;">
          GeekSmart Appliance provides reliable diagnostic and repair services for kitchen appliances, laundry units, printers, commercial equipment, and smart home technology.
        </p>
      </div>

      <!-- Quick Links -->
      <div>
        <h4 class="footer-title">Quick Links</h4>
        <ul class="footer-links">
          <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
          <li><a href="<?php echo SITE_URL; ?>/about.php">About Us</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services.php">All Services</a></li>
          <li><a href="<?php echo SITE_URL; ?>/booking.php">Book Appointment</a></li>
          <li><a href="<?php echo SITE_URL; ?>/contact.php">Contact Support</a></li>
          <li><a href="<?php echo SITE_URL; ?>/printer-service.php">Printer Support</a></li>
        </ul>
      </div>

      <!-- Core Services -->
      <div>
        <h4 class="footer-title">Services</h4>
        <ul class="footer-links">
          <li><a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php">Refrigerator Repair</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services/washer-repair.php">Washing Machine Repair</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services/dryer-repair.php">Clothes Dryer Repair</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services/oven-repair.php">Oven & Stove Repair</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services/dishwasher-repair.php">Dishwasher Repair</a></li>
          <li><a href="<?php echo SITE_URL; ?>/services/commercial-appliance-repair.php">Commercial Equipment</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h4 class="footer-title">Contact</h4>
        <ul style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.875rem;">
          <li>
            <strong>Hotline:</strong><br>
            <a href="tel:<?php echo PHONE_RAW; ?>" style="color: #60a5fa; font-weight: 700; font-size: 1.05rem;"><?php echo PHONE_NUMBER; ?></a>
          </li>
          <li>
            <strong>Email:</strong><br>
            <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" style="color: #94a3b8;"><?php echo EMAIL_ADDRESS; ?></a>
          </li>
          <li>
            <strong>Coverage Area:</strong><br>
            <?php echo SERVICE_AREA; ?>
          </li>
        </ul>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div>
        &copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. All rights reserved.
      </div>
      <div class="footer-policy-links">
        <a href="<?php echo SITE_URL; ?>/privacy-policy.php" style="color: #94a3b8;">Privacy Policy</a>
        <a href="<?php echo SITE_URL; ?>/terms.php" style="color: #94a3b8;">Terms of Service</a>
        <a href="<?php echo SITE_URL; ?>/refund-cancellation-policy.php" style="color: #94a3b8;">Refund Policy</a>
        <a href="<?php echo SITE_URL; ?>/cookie-policy.php" style="color: #94a3b8;">Cookie Policy</a>
        <a href="<?php echo SITE_URL; ?>/disclaimer.php" style="color: #94a3b8;">Disclaimer</a>
      </div>
    </div>
  </div>
</footer>

<button type="button" class="scroll-top-btn" id="scroll-top-btn" aria-label="Scroll to top">
  <i data-lucide="chevron-up" style="width: 22px; height: 22px;"></i>
</button>

<?php if (file_exists(__DIR__ . '/booking-modal.php')) include_once __DIR__ . '/booking-modal.php'; ?>
<?php if (file_exists(__DIR__ . '/cookie-consent.php')) include_once __DIR__ . '/cookie-consent.php'; ?>
<?php if (file_exists(__DIR__ . '/mobile-navigation.php')) include_once __DIR__ . '/mobile-navigation.php'; ?>

<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
