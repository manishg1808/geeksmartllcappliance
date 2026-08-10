<?php
/**
 * GeekSmart Appliance - Quick Booking Modal Include with Lucide Icons
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="modal booking-modal" id="booking-modal">
  <div class="modal-backdrop"></div>
  <div class="modal-content">
    <button class="modal-close" data-close-modal aria-label="Close modal">&times;</button>
    
    <div style="text-align: center; margin-bottom: 1.5rem;">
      <span class="badge badge-cyan" style="margin-bottom: 0.5rem;"><i data-lucide="zap" style="width: 14px; height: 14px; vertical-align: middle;"></i> Instant Diagnostic Booking</span>
      <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">Schedule Technical Service</h3>
      <p style="font-size: 0.9rem; color: var(--text-muted);">Fill out your details for immediate online or onsite appointment verification.</p>
    </div>

    <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
      <input type="hidden" name="form_type" value="booking">
      
      <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" placeholder="e.g. John Miller" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label class="form-label">Phone Number *</label>
          <input type="tel" name="phone" class="form-control" placeholder="(808) 000-0000" required>
        </div>
        <div class="form-group">
          <label class="form-label">Email Address *</label>
          <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Appliance / Tech Category *</label>
        <select name="service" class="form-select" required>
          <option value="">-- Select Service Needed --</option>
          <?php foreach ($servicesList as $key => $svc): ?>
            <option value="<?php echo htmlspecialchars($svc['title']); ?>">
              <?php echo htmlspecialchars($svc['title']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Describe Problem / Error Code</label>
        <textarea name="message" class="form-control" rows="3" placeholder="e.g. Refrigerator not cooling, E4 error code, printer showing offline..."></textarea>
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 0.5rem;">
        <i data-lucide="check-circle" style="width: 18px; height: 18px;"></i> Confirm & Request Assistance
      </button>
      
      <p style="font-size: 0.8rem; text-align: center; color: var(--text-muted); margin-top: 1rem;">
        <i data-lucide="shield-check" style="color: var(--success); width: 14px; height: 14px; vertical-align: middle;"></i> 100% Privacy Protection. No spam policy.
      </p>
    </form>
  </div>
</div>
