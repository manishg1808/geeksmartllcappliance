<?php
/**
 * Shared service detail layout.
 * Expects $serviceSlug. Optional $formType override.
 * Uses $servicesList from config.php.
 */
if (!isset($servicesList) || !is_array($servicesList)) {
    require_once __DIR__ . '/../config.php';
}

$serviceSlug = $serviceSlug ?? 'refrigerator-repair';
$serviceData = $servicesList[$serviceSlug] ?? null;

if (!$serviceData) {
    header('Location: ' . SITE_URL . '/services.php');
    exit;
}

// Preserve existing lead form_type keys used by admin
$formTypeMap = [
    'refrigerator-repair'         => 'refrigerator_service',
    'washer-repair'               => 'washer_service',
    'dryer-repair'                => 'dryer_service',
    'oven-repair'                 => 'oven_service',
    'dishwasher-repair'           => 'dishwasher_service',
    'commercial-appliance-repair' => 'commercial_service',
    'printer-service'             => 'printer_quick_request',
];
$formType = $formType ?? ($formTypeMap[$serviceSlug] ?? (str_replace('-', '_', $serviceSlug)));

$pageTitle = ($pageTitle ?? null) ?: ($serviceData['title'] . ' | GeekSmart Appliance');
$pageDesc  = ($pageDesc ?? null) ?: ($serviceData['short_desc'] . ' Same-day diagnostics and repair by GeekSmart Appliance.');

// Related services — curated per service page
$related = [];
$relatedSlugs = $serviceData['related_slugs'] ?? [];
foreach ($relatedSlugs as $relSlug) {
    if ($relSlug === $serviceSlug || !isset($servicesList[$relSlug])) {
        continue;
    }
    $related[$relSlug] = $servicesList[$relSlug];
}
if (count($related) < 3) {
    foreach ($servicesList as $slug => $srv) {
        if ($slug === $serviceSlug || isset($related[$slug])) {
            continue;
        }
        if (($srv['category'] ?? '') === ($serviceData['category'] ?? '')) {
            $related[$slug] = $srv;
        }
        if (count($related) >= 3) {
            break;
        }
    }
}

$whyChoose = $serviceData['why_choose'] ?? [
    ['icon' => 'clock', 'title' => 'Same-Day Dispatch', 'desc' => 'Fast technician routing when your appliance fails.'],
    ['icon' => 'wrench', 'title' => 'Experienced Techs', 'desc' => 'Trained on major residential and commercial brands.'],
    ['icon' => 'badge-check', 'title' => '90-Day Protection', 'desc' => 'Parts and labor covered after approved repairs.'],
];

include_once __DIR__ . '/header.php';
include_once __DIR__ . '/navigation.php';
?>

<!-- Service Hero -->
<section class="svc-hero">
  <div class="container">
    <div class="svc-hero-inner">
      <span class="badge badge-cyan svc-hero-badge">
        <i data-lucide="<?php echo htmlspecialchars($serviceData['icon']); ?>" style="width: 16px; height: 16px;"></i>
        <?php echo htmlspecialchars($serviceData['category']); ?>
      </span>
      <h1 class="svc-hero-title"><?php echo htmlspecialchars($serviceData['title']); ?></h1>
      <p class="svc-hero-desc"><?php echo htmlspecialchars($serviceData['full_desc']); ?></p>
      <div class="svc-hero-actions">
        <button class="btn btn-cyan btn-lg" data-open-modal="booking-modal" data-service-title="<?php echo htmlspecialchars($serviceData['title']); ?>">
          <i data-lucide="calendar-check" style="width: 18px; height: 18px;"></i>
          Book This Service
        </button>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline-white btn-lg btn-phone-wrap">
          <i data-lucide="phone" style="width: 18px; height: 18px;"></i>
          Call <?php echo PHONE_NUMBER; ?>
        </a>
      </div>
      <div class="svc-hero-meta">
        <span><i data-lucide="zap" style="width: 16px; height: 16px;"></i> <?php echo htmlspecialchars($serviceData['turnaround']); ?></span>
        <span><i data-lucide="shield-check" style="width: 16px; height: 16px;"></i> 90-Day Parts &amp; Labor</span>
        <span><i data-lucide="check-circle" style="width: 16px; height: 16px;"></i> Certified Technicians</span>
      </div>
    </div>
  </div>
</section>

<!-- Main content + form -->
<section class="svc-main section-padding">
  <div class="container">
    <div class="svc-layout">
      <div class="svc-content">
        <h2 class="svc-h2">Common Issues We Fix</h2>
        <p class="svc-lead">
          Our technicians diagnose electronic, mechanical, and control-board faults for this equipment type:
        </p>

        <div class="svc-issues-card">
          <ul class="svc-issues-list">
            <?php foreach ($serviceData['common_issues'] as $issue): ?>
              <li>
                <i data-lucide="alert-circle" style="width: 20px; height: 20px;"></i>
                <span><?php echo htmlspecialchars($issue); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <h2 class="svc-h2">How Our Service Works</h2>
        <div class="svc-steps">
          <div class="svc-step">
            <div class="svc-step-num">1</div>
            <div>
              <h3>Diagnostic Check</h3>
              <p>Error-code reading, voltage checks, and mechanical inspection on the unit.</p>
            </div>
          </div>
          <div class="svc-step">
            <div class="svc-step-num">2</div>
            <div>
              <h3>Clear Flat-Rate Quote</h3>
              <p>Upfront cost for parts and labor before any repair work starts.</p>
            </div>
          </div>
          <div class="svc-step">
            <div class="svc-step-num">3</div>
            <div>
              <h3>OEM Parts Repair</h3>
              <p>Genuine factory-grade components installed and calibrated on-site.</p>
            </div>
          </div>
          <div class="svc-step">
            <div class="svc-step-num">4</div>
            <div>
              <h3>Test &amp; Protection</h3>
              <p>Full cycle test plus 90-day parts and labor service protection.</p>
            </div>
          </div>
        </div>

        <h2 class="svc-h2">Why Choose GeekSmart for <?php echo htmlspecialchars($serviceData['title']); ?></h2>
        <div class="svc-benefits">
          <?php foreach ($whyChoose as $benefit): ?>
            <div class="svc-benefit">
              <i data-lucide="<?php echo htmlspecialchars($benefit['icon']); ?>" style="width: 22px; height: 22px;"></i>
              <h4><?php echo htmlspecialchars($benefit['title']); ?></h4>
              <p><?php echo htmlspecialchars($benefit['desc']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <aside class="svc-sidebar">
        <div class="svc-form-card">
          <h3>Request This Service</h3>
          <p class="svc-form-note">Share your details — a specialist will follow up shortly.</p>

          <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
            <input type="hidden" name="form_type" value="<?php echo htmlspecialchars($formType); ?>">
            <input type="hidden" name="service" value="<?php echo htmlspecialchars($serviceData['title']); ?>">

            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="Your full name" autocomplete="name">
            </div>

            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" required placeholder="<?php echo htmlspecialchars(PHONE_NUMBER); ?>" autocomplete="tel">
            </div>

            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="you@example.com" autocomplete="email">
            </div>

            <div class="form-group">
              <label class="form-label">Symptom / Error Code</label>
              <textarea name="message" class="form-control" rows="3" placeholder="Describe the issue or error code"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
              <i data-lucide="send" style="width: 16px; height: 16px;"></i>
              Connect With Specialist
            </button>
          </form>

          <div class="svc-form-footer">
            <div class="svc-overview-row">
              <span>Response</span>
              <strong><?php echo htmlspecialchars($serviceData['turnaround']); ?></strong>
            </div>
            <div class="svc-overview-row">
              <span>Protection</span>
              <strong>90 Days</strong>
            </div>
            <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline btn-sm btn-phone-wrap" style="width: 100%; justify-content: center; margin-top: 0.75rem;">
              <i data-lucide="phone-call" style="width: 16px; height: 16px;"></i>
              Call <?php echo PHONE_NUMBER; ?>
            </a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php if (!empty($related)): ?>
<section class="svc-related">
  <div class="container">
    <div class="svc-related-head">
      <h2>Related Services for <?php echo htmlspecialchars(explode('&', $serviceData['title'])[0]); ?></h2>
      <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline btn-sm">View All Services &rarr;</a>
    </div>
    <div class="grid grid-cols-3">
      <?php foreach ($related as $relSlug => $rel): ?>
        <a href="<?php echo SITE_URL . $rel['url']; ?>" class="svc-related-card">
          <div class="svc-related-icon">
            <i data-lucide="<?php echo htmlspecialchars($rel['icon']); ?>" style="width: 22px; height: 22px;"></i>
          </div>
          <h3><?php echo htmlspecialchars($rel['title']); ?></h3>
          <p><?php echo htmlspecialchars($rel['short_desc']); ?></p>
          <span class="svc-related-link">View details &rarr;</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="svc-cta-banner">
  <div class="container text-center">
    <h2>Need Help Right Away?</h2>
    <p>Book a technician appointment or call our dispatch hotline for faster routing.</p>
    <div class="svc-hero-actions" style="justify-content: center;">
      <button class="btn btn-accent btn-lg" data-open-modal="booking-modal" data-service-title="<?php echo htmlspecialchars($serviceData['title']); ?>">
        <i data-lucide="calendar" style="width: 18px; height: 18px;"></i>
        Book Appointment
      </button>
      <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline-white btn-lg">
        <i data-lucide="phone" style="width: 18px; height: 18px;"></i>
        <?php echo PHONE_NUMBER; ?>
      </a>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/footer.php'; ?>
