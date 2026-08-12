<?php
/**
 * GeekSmart Appliance - Confirmation Landing Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Thank You | Service Request Received - " . SITE_NAME;
$ticketId  = filter_input(INPUT_GET, 'ticket', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'GS-' . rand(1000, 9999);

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section class="section-padding" style="background: var(--bg-light); text-align: center;">
  <div class="container" style="max-width: 680px;">
    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 3.5rem 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-md);">
      <div style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.12); color: var(--success); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto;">
        <i data-lucide="check-circle" style="width: 44px; height: 44px;"></i>
      </div>

      <span class="badge badge-emerald" style="margin-bottom: 0.75rem;">Request Confirmed</span>
      <h1 style="font-size: 2.25rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem;">Thank You For Choosing GeekSmart Appliance!</h1>
      <p style="font-size: 1.05rem; color: var(--text-muted); margin-bottom: 1.5rem;">
        Your service ticket <strong>#<?php echo htmlspecialchars($ticketId); ?></strong> has been logged. One of our certified technicians will call you back within 15 minutes.
      </p>

      <div style="background: var(--bg-light); padding: 1.25rem; border-radius: var(--radius-md); text-align: left; margin-bottom: 2rem;">
        <h5 style="font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.4rem;">
          <i data-lucide="phone-call" style="width: 18px; height: 18px; color: var(--primary);"></i> Need Immediate Help?
        </h5>
        <p style="font-size: 0.9rem; color: var(--text-muted);">
          If this is a refrigeration emergency or an urgent printer disruption, call our dispatch line directly at <a href="tel:<?php echo PHONE_RAW; ?>" style="color: var(--primary-accent); font-weight: 700;"><?php echo PHONE_NUMBER; ?></a>.
        </p>
      </div>

      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo SITE_URL; ?>/index.php" class="btn btn-primary">Return to Home</a>
        <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline">Explore All Services</a>
      </div>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
