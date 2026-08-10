<?php
/**
 * GeekSmart Appliance - Washing Machine Repair Service
 */
require_once __DIR__ . '/../config.php';

$pageTitle = "Washing Machine Repair Services | GeekSmart Appliance";
$pageDesc  = "Onsite & virtual troubleshooting for top-load & front-load washing machines, drain pumps, spin failures, door latches & control board errors.";

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/navigation.php';
?>

<section style="background: linear-gradient(135deg, var(--primary), var(--primary-light)); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i class="ri-t-shirt-line"></i> Laundry Appliance Repair</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem;">Washing Machine Repair & Diagnostics</h1>
    <p style="font-size: 1.15rem; max-width: 720px; margin: 0 auto 2rem auto; color: rgba(255,255,255,0.85);">
      Fast online error code troubleshooting and same-day onsite repair for front-load and top-load washers.
    </p>

    <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
      <button class="btn btn-cyan btn-lg" data-open-modal="booking-modal">
        <i class="ri-calendar-check-line"></i> Book Washer Repair
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
        <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Washer Problems We Solve</h2>
        
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); margin-bottom: 2rem;">
          <ul style="display: flex; flex-direction: column; gap: 1rem;">
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Drain Pump & Standing Water:</strong> Washer will not drain water, showing OE / ND error codes, clogged pump filters.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Spin Cycle Failures:</strong> Tub refuses to spin or agitate, out-of-balance UB error codes, worn drive belts.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Door Latch & Switch Errors:</strong> Door locked shut or refusing to lock, dE / door switch sensor faults.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Vibration & Noise:</strong> Loud grinding, tub bearing wear, broken shock absorbers, or suspension rod failures.
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-md); position: sticky; top: 100px;">
          <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Washer Dispatch Request</h4>
          <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
            <input type="hidden" name="form_type" value="washer_service">
            <input type="hidden" name="service" value="Washing Machine Repair">

            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="John Doe">
            </div>

            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" required placeholder="(808) 999-7791">
            </div>

            <div class="form-group">
              <label class="form-label">Washer Error Code / Symptom</label>
              <input type="text" name="message" class="form-control" placeholder="e.g. OE error code, not spinning">
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
