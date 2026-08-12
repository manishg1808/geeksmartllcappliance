<?php
/**
 * GeekSmart Appliance - Compact Booking Modal
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<div class="modal booking-modal" id="booking-modal">
  <div class="modal-backdrop"></div>
  <div class="modal-content modal-content-compact">
    <button class="modal-close" data-close-modal aria-label="Close modal">&times;</button>

    <div class="modal-header-compact">
      <span class="modal-badge"><i data-lucide="zap" style="width: 12px; height: 12px;"></i> Quick Booking</span>
      <h3>Schedule Service</h3>
      <p>Fill in your details — we will confirm shortly.</p>
    </div>

    <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form modal-form-compact">
      <input type="hidden" name="form_type" value="booking">

      <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" placeholder="John Miller" required autocomplete="name">
      </div>

      <div class="modal-form-row">
        <div class="form-group">
          <label class="form-label">Phone *</label>
          <input type="tel" name="phone" class="form-control" placeholder="(808) 000-0000" required autocomplete="tel">
        </div>
        <div class="form-group">
          <label class="form-label">Email *</label>
          <input type="email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Service *</label>
        <select name="service" class="form-select" required>
          <?php service_select_options('Select service'); ?>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Problem / Error Code</label>
        <textarea name="message" class="form-control modal-textarea" rows="2" placeholder="Brief issue description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary btn-sm modal-submit-btn">
        <i data-lucide="check-circle" style="width: 16px; height: 16px;"></i> Submit Request
      </button>

      <p class="modal-trust-note">
        <i data-lucide="shield-check" style="width: 12px; height: 12px;"></i> Private &amp; secure — no spam.
      </p>
    </form>
  </div>
</div>
