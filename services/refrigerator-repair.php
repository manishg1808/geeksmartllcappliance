<?php
/**
 * GeekSmart Appliance - Refrigerator & Freezer Repair Service
 */
require_once __DIR__ . '/../config.php';

$pageTitle = "Refrigerator & Freezer Repair | GeekSmart Appliance";
$pageDesc  = "Onsite and virtual diagnostics for Samsung, LG, Whirlpool, GE & Sub-Zero refrigerators. Fix cooling failures, error codes & compressor relay clicks.";

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/navigation.php';
?>

<section style="background: linear-gradient(135deg, var(--primary), var(--primary-light)); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i class="ri-fridge-line"></i> Kitchen Appliance Repair</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem;">Refrigerator & Freezer Repair Services</h1>
    <p style="font-size: 1.15rem; max-width: 720px; margin: 0 auto 2rem auto; color: rgba(255,255,255,0.85);">
      Rapid virtual diagnostics and same-day onsite technician repair for French door units, side-by-side models, freezers, and built-in refrigeration.
    </p>

    <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
      <button class="btn btn-cyan btn-lg" data-open-modal="booking-modal">
        <i class="ri-calendar-check-line"></i> Book Refrigerator Repair
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
        <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Common Refrigerator Issues We Fix</h2>
        <p style="font-size: 1.05rem; color: var(--text-muted); margin-bottom: 1.5rem;">
          A failing refrigerator threatens your food safety and peace of mind. Our certified technicians resolve all electronic and cooling mechanics:
        </p>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); margin-bottom: 2rem;">
          <ul style="display: flex; flex-direction: column; gap: 1rem;">
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Temperature & Cooling Failures:</strong> Refrigerator or freezer fails to hold set temperature, warm internal air flow.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Control Board Error Codes:</strong> Front display showing E-codes (e.g., 22E, 33E, 1E, SY EF errors).
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Compressor & Relay Clicking:</strong> Loud buzzing, clicking compressor start relay, or thermal overload.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Evaporator Frost & Ice Buildup:</strong> Frozen coils blocking air dampers, failing defrost heater or thermistor.
              </div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i class="ri-error-warning-fill" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
              <div>
                <strong>Water Dispenser & Ice Maker Leaks:</strong> Frozen fill tubes, jammed ice dispenser auger, or leaking inlet valves.
              </div>
            </li>
          </ul>
        </div>

        <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem;">Brands We Specialize In</h3>
        <p style="font-size: 0.95rem; color: var(--text-muted);">
          Samsung, LG, Whirlpool, GE Profile, KitchenAid, Frigidaire, Bosch, Sub-Zero, Maytag, JennAir, and Kenmore.
        </p>
      </div>

      <div>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-md); position: sticky; top: 100px;">
          <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Quick Refrigerator Dispatch</h4>
          <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
            <input type="hidden" name="form_type" value="refrigerator_service">
            <input type="hidden" name="service" value="Refrigerator & Freezer Repair">

            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="John Doe">
            </div>

            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" required placeholder="(808) 999-7791">
            </div>

            <div class="form-group">
              <label class="form-label">Symptom / Error Code</label>
              <input type="text" name="message" class="form-control" placeholder="e.g. Not cooling, display error">
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
