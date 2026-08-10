<?php
/**
 * GeekSmart Appliance - Dedicated Booking & Appointment Scheduling Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Book Technical Service | Schedule Onsite Appointment - " . SITE_NAME;
$pageDesc  = "Schedule diagnostic checks and repair appointments for refrigerators, washers, dryers, ovens, dishwashers, commercial equipment, and office printers.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<!-- Header Banner -->
<section style="background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i data-lucide="calendar" style="width: 16px; height: 16px; vertical-align: middle;"></i> Schedule Service</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem; color: #ffffff;">Book Technician Appointment</h1>
    <p style="font-size: 1.15rem; max-width: 720px; margin: 0 auto; color: rgba(255,255,255,0.85);">
      Select your equipment category and preferred time slot for rapid onsite diagnostic evaluation across British Columbia.
    </p>
  </div>
</section>

<!-- Dedicated Booking Interface Section -->
<section style="padding: 4.5rem 0; background: var(--bg-light);">
  <div class="container">
    <div style="display: grid; grid-template-columns: 1fr 1.75fr; gap: 3.5rem; align-items: start;">
      
      <!-- Left Column: Booking Protocol & Assurances -->
      <div style="display: flex; flex-direction: column; gap: 1.75rem;">
        
        <div style="background: #ffffff; padding: 2.25rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
          <h3 style="font-size: 1.35rem; color: var(--text-main); margin-bottom: 1.25rem; font-weight: 800;">4-Step Service Process</h3>
          
          <div style="display: flex; flex-direction: column; gap: 1.25rem;">
            <div style="display: flex; gap: 1rem; align-items: flex-start;">
              <div style="width: 36px; height: 36px; border-radius: 8px; background: var(--primary-subtle); color: var(--primary); font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">1</div>
              <div>
                <strong style="color: var(--text-main); font-size: 0.95rem;">Select Service & Details</strong>
                <p style="font-size: 0.85rem; color: var(--text-muted);">Choose your appliance type and describe the error symptom.</p>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start;">
              <div style="width: 36px; height: 36px; border-radius: 8px; background: var(--primary-subtle); color: var(--primary); font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">2</div>
              <div>
                <strong style="color: var(--text-main); font-size: 0.95rem;">Technician Confirmation</strong>
                <p style="font-size: 0.85rem; color: var(--text-muted);">Our dispatch team confirms your arrival window in under 15 mins.</p>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start;">
              <div style="width: 36px; height: 36px; border-radius: 8px; background: var(--primary-subtle); color: var(--primary); font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">3</div>
              <div>
                <strong style="color: var(--text-main); font-size: 0.95rem;">Onsite Flat-Rate Diagnostic</strong>
                <p style="font-size: 0.85rem; color: var(--text-muted);">Technician inspects equipment and provides an upfront estimate.</p>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start;">
              <div style="width: 36px; height: 36px; border-radius: 8px; background: var(--primary-subtle); color: var(--primary); font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">4</div>
              <div>
                <strong style="color: var(--text-main); font-size: 0.95rem;">Repair & 90-Day Protection</strong>
                <p style="font-size: 0.85rem; color: var(--text-muted);">OEM components installed with full 90-day parts protection.</p>
              </div>
            </div>
          </div>
        </div>

        <div style="background: var(--text-main); color: #ffffff; padding: 2rem; border-radius: var(--radius-lg);">
          <h4 style="font-size: 1.15rem; color: var(--cyan); margin-bottom: 0.5rem; font-weight: 800;">Need Immediate Dispatch?</h4>
          <p style="font-size: 0.875rem; color: rgba(255,255,255,0.8); margin-bottom: 1.25rem;">Speak directly with an on-call dispatcher for urgent same-day appointments.</p>
          <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent" style="width: 100%; justify-content: center;">
            <i data-lucide="phone-call" style="width: 18px; height: 18px;"></i> Call <?php echo PHONE_NUMBER; ?>
          </a>
        </div>

      </div>

      <!-- Right Column: Interactive Appointment Booking Form -->
      <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2.75rem; border: 1px solid var(--border-light); box-shadow: var(--shadow-card);">
        <div style="margin-bottom: 1.75rem;">
          <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.35rem;">Schedule Service Online</h3>
          <p style="color: var(--text-muted); font-size: 0.925rem;">Complete your request below for instant appointment scheduling.</p>
        </div>

        <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
          <input type="hidden" name="form_type" value="booking_page">

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Sarah Jenkins" required>
            </div>
            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" placeholder="(808) 999-7791" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Email Address *</label>
            <input type="email" name="email" class="form-control" placeholder="sarah@example.com" required>
          </div>

          <div class="form-group">
            <label class="form-label">Select Equipment / Service Needed *</label>
            <select name="service" class="form-select" required>
              <option value="">-- Choose Category --</option>
              <?php foreach ($servicesList as $key => $svc): ?>
                <option value="<?php echo htmlspecialchars($svc['title']); ?>">
                  <?php echo htmlspecialchars($svc['title']); ?> (<?php echo htmlspecialchars($svc['category']); ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
              <label class="form-label">Preferred Date *</label>
              <input type="date" name="preferred_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
              <label class="form-label">Preferred Time Window *</label>
              <select name="preferred_time" class="form-select" required>
                <option value="Morning (8:00 AM - 12:00 PM)">Morning (8 AM - 12 PM)</option>
                <option value="Afternoon (12:00 PM - 4:00 PM)">Afternoon (12 PM - 4 PM)</option>
                <option value="Evening (4:00 PM - 8:00 PM)">Evening (4 PM - 8 PM)</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Describe Problem / Error Code *</label>
            <textarea name="message" class="form-control" rows="4" placeholder="e.g. Refrigerator not cooling food, washer displaying E4 error code, printer showing offline..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 0.5rem;">
            <i data-lucide="check-circle" style="width: 18px; height: 18px;"></i> Confirm & Request Appointment
          </button>

          <p style="font-size: 0.8rem; text-align: center; color: var(--text-muted); margin-top: 1rem;">
            <i data-lucide="shield-check" style="color: var(--success); width: 14px; height: 14px; vertical-align: middle;"></i> 100% Privacy Protection. No spam policy.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
