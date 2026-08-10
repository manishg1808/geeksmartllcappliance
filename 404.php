<?php
/**
 * GeekSmart LLC Appliance - Custom 404 Error Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Page Not Found (404) | GeekSmart LLC Appliance";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section class="section-padding text-center">
  <div class="container" style="max-width: 600px;">
    <h1 style="font-size: 6rem; font-weight: 800; color: var(--primary-accent); line-height: 1;">404</h1>
    <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem;">Page Not Found</h2>
    <p style="font-size: 1rem; color: var(--text-muted); margin-bottom: 2rem;">
      The page you were looking for might have been moved, renamed, or is temporarily unavailable.
    </p>

    <div style="display: flex; gap: 1rem; justify-content: center;">
      <a href="<?php echo SITE_URL; ?>/index.php" class="btn btn-primary">Return to Homepage</a>
      <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline">Explore All Services</a>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
