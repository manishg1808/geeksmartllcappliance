<?php
/**
 * GeekSmart LLC Appliance - Off-canvas Mobile Navigation Drawer Include
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="drawer-overlay" id="drawer-overlay"></div>
<div class="mobile-drawer" id="mobile-drawer">
  <div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
      <img src="<?php echo SITE_URL; ?>/assets/images/logo.svg" alt="<?php echo SITE_NAME; ?>" width="180">
      <button id="drawer-close" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-main);">
        <i class="ri-close-line"></i>
      </button>
    </div>

    <ul style="display: flex; flex-direction: column; gap: 1.25rem; font-size: 1.1rem; font-weight: 600;">
      <li><a href="<?php echo SITE_URL; ?>/index.php" style="color: var(--primary);"><i class="ri-home-4-line"></i> Home</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services.php" style="color: var(--primary);"><i class="ri-tools-line"></i> All Appliance Services</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php" style="color: var(--text-muted); padding-left: 1.5rem; font-size: 0.95rem;">• Refrigerator Repair</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services/washer-repair.php" style="color: var(--text-muted); padding-left: 1.5rem; font-size: 0.95rem;">• Washing Machine Repair</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services/dryer-repair.php" style="color: var(--text-muted); padding-left: 1.5rem; font-size: 0.95rem;">• Clothes Dryer Repair</a></li>
      <li><a href="<?php echo SITE_URL; ?>/services/oven-repair.php" style="color: var(--text-muted); padding-left: 1.5rem; font-size: 0.95rem;">• Oven & Range Repair</a></li>
      <li><a href="<?php echo SITE_URL; ?>/printer-service.php" style="color: var(--text-muted); padding-left: 1.5rem; font-size: 0.95rem;">• Printer & Copier Setup</a></li>
      <li><a href="<?php echo SITE_URL; ?>/about.php" style="color: var(--primary);"><i class="ri-information-line"></i> About Us</a></li>
      <li><a href="<?php echo SITE_URL; ?>/booking.php" style="color: var(--primary);"><i class="ri-calendar-check-line"></i> Schedule Appointment</a></li>
      <li><a href="<?php echo SITE_URL; ?>/contact.php" style="color: var(--primary);"><i class="ri-mail-line"></i> Contact Support</a></li>
    </ul>
  </div>

  <div style="border-top: 1px solid var(--border-color); padding-top: 1.5rem;">
    <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-primary" style="width: 100%; margin-bottom: 0.75rem;">
      <i class="ri-phone-fill"></i> Call <?php echo PHONE_NUMBER; ?>
    </a>
    <p style="font-size: 0.8rem; text-align: center; color: var(--text-muted);">
      <?php echo BUSINESS_HOURS; ?>
    </p>
  </div>
</div>
