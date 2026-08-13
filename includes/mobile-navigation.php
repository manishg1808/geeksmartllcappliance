<?php
/**
 * GeekSmart Appliance - Off-canvas Mobile Navigation Drawer
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="drawer-overlay" id="drawer-overlay"></div>
<div class="mobile-drawer" id="mobile-drawer">
  <div class="mobile-drawer-scroll">
    <div class="mobile-drawer-head">
      <img src="<?php echo SITE_URL; ?>/assets/images/logo.svg" alt="<?php echo SITE_NAME; ?>" width="160" height="34">
      <button type="button" id="drawer-close" class="drawer-close-btn" aria-label="Close menu">
        <i data-lucide="x"></i>
      </button>
    </div>

    <ul class="mobile-drawer-nav">
      <li><a href="<?php echo SITE_URL; ?>/index.php"><i data-lucide="home"></i> Home</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services.php"><i data-lucide="wrench"></i> All Appliance Services</a></li>
      <li class="mobile-drawer-sub"><a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php">Refrigerator Repair</a></li>
      <li class="mobile-drawer-sub"><a href="<?php echo SITE_URL; ?>/services/washer-repair.php">Washing Machine Repair</a></li>
      <li class="mobile-drawer-sub"><a href="<?php echo SITE_URL; ?>/services/dryer-repair.php">Clothes Dryer Repair</a></li>
      <li class="mobile-drawer-sub"><a href="<?php echo SITE_URL; ?>/services/oven-repair.php">Oven &amp; Range Repair</a></li>
      <li class="mobile-drawer-sub"><a href="<?php echo SITE_URL; ?>/printer-service.php">Printer &amp; Copier Setup</a></li>
      <li><a href="<?php echo SITE_URL; ?>/about.php"><i data-lucide="info"></i> About Us</a></li>
      <li><a href="<?php echo SITE_URL; ?>/booking.php"><i data-lucide="calendar-check"></i> Schedule Appointment</a></li>
      <li><a href="<?php echo SITE_URL; ?>/contact.php"><i data-lucide="mail"></i> Contact Support</a></li>
    </ul>
  </div>

  <div class="mobile-drawer-foot">
    <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-primary mobile-drawer-call">
      <i data-lucide="phone-call"></i> Call <?php echo PHONE_NUMBER; ?>
    </a>
    <p><?php echo BUSINESS_HOURS; ?></p>
  </div>
</div>
