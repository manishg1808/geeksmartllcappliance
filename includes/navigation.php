<?php
/**
 * GeekSmart Appliance - Clean & Simple Navigation Bar
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

$currentScript = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
?>
<!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem; font-size: 0.85rem;">
      <div>
        <span><i data-lucide="phone-call" style="color: var(--cyan); width: 14px; height: 14px; vertical-align: middle;"></i> Hotline: <a href="tel:<?php echo PHONE_RAW; ?>" style="color: #ffffff; font-weight: 700;"><?php echo PHONE_NUMBER; ?></a></span>
        <span style="margin-left: 1.25rem;"><i data-lucide="map-pin" style="color: var(--cyan); width: 14px; height: 14px; vertical-align: middle;"></i> <?php echo SERVICE_AREA; ?></span>
      </div>
      <div>
        <span style="color: var(--cyan); font-weight: 600;"><span class="pulse-dot"></span> Same-Day Emergency Service Available</span>
      </div>
    </div>
  </div>
</div>

<!-- Main Header -->
<header class="header" style="background: #ffffff; border-bottom: 1px solid var(--border-light); box-shadow: var(--shadow-sm); position: sticky; top: 0; z-index: 1000;">
  <div class="container">
    <nav class="navbar" style="height: 76px; display: flex; align-items: center; justify-content: space-between;">
      <!-- Simple Logo -->
      <a href="<?php echo SITE_URL; ?>/index.php" class="brand-logo" style="display: flex; align-items: center;">
        <img src="<?php echo SITE_URL; ?>/assets/images/logo.svg" alt="<?php echo SITE_NAME; ?>" width="210" height="44" style="height: 44px; width: auto;">
      </a>

      <!-- Navigation Menu Links -->
      <ul class="nav-menu" style="display: flex; align-items: center; gap: 1.75rem; list-style: none;">
        <li>
          <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link <?php echo ($currentScript === 'index.php') ? 'active' : ''; ?>">
            Home
          </a>
        </li>

        <li class="nav-dropdown" style="position: relative;">
          <a href="<?php echo SITE_URL; ?>/services.php" class="nav-link <?php echo (strpos($currentScript, 'service') !== false) ? 'active' : ''; ?>">
            Services <i data-lucide="chevron-down" style="width: 14px; height: 14px; vertical-align: middle;"></i>
          </a>
          <div class="nav-dropdown-menu">
            <a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php" class="nav-dropdown-item">
              <i data-lucide="snowflake" style="width: 16px; height: 16px; color: var(--primary);"></i> Refrigerator Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/services/washer-repair.php" class="nav-dropdown-item">
              <i data-lucide="shirt" style="width: 16px; height: 16px; color: var(--primary);"></i> Washer Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/services/dryer-repair.php" class="nav-dropdown-item">
              <i data-lucide="flame" style="width: 16px; height: 16px; color: var(--primary);"></i> Dryer Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/services/oven-repair.php" class="nav-dropdown-item">
              <i data-lucide="flame" style="width: 16px; height: 16px; color: var(--primary);"></i> Oven Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/services/dishwasher-repair.php" class="nav-dropdown-item">
              <i data-lucide="droplet" style="width: 16px; height: 16px; color: var(--primary);"></i> Dishwasher Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/printer-service.php" class="nav-dropdown-item">
              <i data-lucide="printer" style="width: 16px; height: 16px; color: var(--primary);"></i> Printer Service
            </a>
            <a href="<?php echo SITE_URL; ?>/services/commercial-appliance-repair.php" class="nav-dropdown-item">
              <i data-lucide="store" style="width: 16px; height: 16px; color: var(--primary);"></i> Commercial Repair
            </a>
            <a href="<?php echo SITE_URL; ?>/services.php" class="nav-dropdown-item" style="font-weight: 700; color: var(--primary); border-top: 1px solid var(--border-light);">
              All 17 Services &rarr;
            </a>
          </div>
        </li>

        <li>
          <a href="<?php echo SITE_URL; ?>/about.php" class="nav-link <?php echo ($currentScript === 'about.php') ? 'active' : ''; ?>">
            About Us
          </a>
        </li>
        <li>
          <a href="<?php echo SITE_URL; ?>/booking.php" class="nav-link <?php echo ($currentScript === 'booking.php') ? 'active' : ''; ?>">
            Booking
          </a>
        </li>
        <li>
          <a href="<?php echo SITE_URL; ?>/contact.php" class="nav-link <?php echo ($currentScript === 'contact.php') ? 'active' : ''; ?>">
            Contact
          </a>
        </li>
      </ul>

      <!-- Right Action Button -->
      <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-primary btn-sm" style="border-radius: var(--radius-full); font-weight: 700;">
          <i data-lucide="phone-call" style="width: 15px; height: 15px;"></i> <?php echo PHONE_NUMBER; ?>
        </a>
        <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle Navigation Menu">
          <i data-lucide="menu"></i>
        </button>
      </div>
    </nav>
  </div>
</header>
