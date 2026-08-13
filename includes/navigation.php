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
    <div class="top-bar-inner">
      <div class="top-bar-hotline">
        <span><i data-lucide="phone-call" style="color: var(--primary); width: 14px; height: 14px; vertical-align: middle;"></i> Hotline: <a href="tel:<?php echo PHONE_RAW; ?>"><?php echo PHONE_NUMBER; ?></a></span>
      </div>
      <div class="top-bar-emergency">
        <span><span class="pulse-dot"></span> Same-Day Emergency Service Available</span>
      </div>
    </div>
  </div>
</div>

<!-- Main Header -->
<header class="header">
  <div class="container">
    <nav class="navbar">
      <!-- Simple Logo -->
      <a href="<?php echo SITE_URL; ?>/index.php" class="brand-logo">
        <img src="<?php echo SITE_URL; ?>/assets/images/logo.svg" alt="<?php echo SITE_NAME; ?>" width="210" height="44">
      </a>

      <!-- Navigation Menu Links -->
      <ul class="nav-menu">
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
          <a href="<?php echo SITE_URL; ?>/contact.php" class="nav-link <?php echo ($currentScript === 'contact.php') ? 'active' : ''; ?>">
            Contact
          </a>
        </li>
      </ul>

      <!-- Right Action Button -->
      <div class="navbar-actions">
        <a href="<?php echo SITE_URL; ?>/booking.php" class="btn btn-primary btn-sm nav-booking-btn">
          <i data-lucide="calendar-check" style="width: 15px; height: 15px;"></i> <span class="nav-booking-label">Booking</span>
        </a>
        <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle Navigation Menu">
          <i data-lucide="menu"></i>
        </button>
      </div>
    </nav>
  </div>
</header>
