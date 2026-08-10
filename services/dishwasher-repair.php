<?php
/**
 * GeekSmart Appliance - Dishwasher Repair Service
 */
require_once __DIR__ . '/../config.php';

$pageTitle = "Dishwasher Repair & Servicing | GeekSmart Appliance";
$pageDesc  = "Onsite and virtual repair for dishwasher drain pumps, standing water leaks, spray arm pressure & wash cycle resets.";

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/navigation.php';
?>

<section style="background: linear-gradient(135deg, var(--primary), var(--primary-light)); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i class="ri-drop-line"></i> Kitchen Appliance Repair</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem;">Dishwasher Repair & Servicing</h1>
    <p style="font-size: 1.15rem; max-width: 720px; margin: 0 auto 2rem auto; color: rgba(255,255,255,0.85);">
      Get your dishwasher operating silently and thoroughly clean without water leaks or standing drain pools.
    </p>

    <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
      <button class="btn btn-cyan btn-lg" data-open-modal="booking-modal">
        <i class="ri-calendar-check-line"></i> Schedule Dishwasher Repair
      </button>
      <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline-white btn-lg">
        <i class="ri-phone-fill"></i> Call <?php echo PHONE_NUMBER; ?>
      </a>
    </div>
  </div>
</section>

<section class="section-padding">
  <div class="container">
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3.5rem;">
      <div>
        <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Dishwasher Symptoms We Fix</h2>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
          <ul style="display: flex; flex-direction: column; gap: 1rem;">
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div><strong>Standing Water Pool:</strong> Drain pump motor jammed, drain line filter clog, E-code error.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div><strong>Dishes Coming Out Dirty:</strong> Clogged spray arms, low water circulation pump pressure.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div><strong>Water Leaks Around Door:</strong> Worn door seal gasket, latch alignment misread.</div>
            </li>
          </ul>
        </div>
      </div>

      <div>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-md); position: sticky; top: 100px;">
          <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Dishwasher Dispatch Request</h4>
          <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
            <input type="hidden" name="form_type" value="dishwasher_service">
            <input type="hidden" name="service" value="Dishwasher Repair & Servicing">

            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="John Doe">
            </div>

            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" required placeholder="(808) 999-7791">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">
              <i class="ri-flashlight-line"></i> Connect With Specialist
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
