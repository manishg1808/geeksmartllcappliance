<?php
/**
 * GeekSmart Appliance - Simple Printer Service Landing Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Printer Installation & Wireless Network Repair | GeekSmart Appliance";
$pageDesc  = "Professional printer setup and offline error troubleshooting for HP, Canon, Epson, Brother & copiers.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3.5rem; align-items: center;">
      <div>
        <span class="badge badge-blue" style="margin-bottom: 0.75rem;"><i class="ri-printer-line"></i> Printer Support</span>
        <h1 style="font-size: 2.6rem; font-weight: 800; line-height: 1.18; margin-bottom: 1rem;">
          Printer Installation & <span style="color: #60a5fa;">Offline Error Fix</span>
        </h1>
        <p style="font-size: 1.1rem; color: #94a3b8; margin-bottom: 1.75rem;">
          Is your wireless printer refusing to print or showing offline errors? Our specialists resolve connection bugs, driver conflicts, and spooler issues quickly.
        </p>

        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
          <button class="btn btn-primary btn-lg" data-open-modal="booking-modal">
            <i class="ri-flashlight-line"></i> Get Printer Assistance
          </button>
          <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline-white btn-lg">
            <i class="ri-phone-fill"></i> Call <?php echo PHONE_NUMBER; ?>
          </a>
        </div>
      </div>

      <div>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; color: var(--text-dark); box-shadow: var(--shadow-lg);">
          <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--text-dark); margin-bottom: 0.4rem;">Printer Service Request</h3>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.1rem;">Quick help for wireless or commercial printers.</p>

          <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
            <input type="hidden" name="form_type" value="printer_quick_request">
            <input type="hidden" name="service" value="Printer Service">

            <div class="form-group">
              <label class="form-label">Printer Brand & Model</label>
              <input type="text" name="printer_model" class="form-control" placeholder="e.g. HP OfficeJet, Canon, Epson, Brother" required>
            </div>

            <div class="form-group">
              <label class="form-label">Main Issue Experienced</label>
              <select name="issue_type" class="form-select" required>
                <option value="Printer Offline Error">Printer Showing Offline / Disconnected</option>
                <option value="WiFi Setup Error">Cannot Connect Printer to WiFi</option>
                <option value="Paper Jam Error">Paper Jam / Feed Error</option>
                <option value="Print Quality Issue">Streaked, Blurry or Blank Output</option>
                <option value="Driver Spooler Error">Print Queue Stuck</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Phone Number</label>
              <input type="tel" name="phone" class="form-control" placeholder="(808) 999-7791" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">
              <i class="ri-check-line"></i> Submit Request
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
