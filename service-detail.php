<?php
/**
 * GeekSmart Appliance - Dynamic Service Detail Page
 */
require_once __DIR__ . '/config.php';

$serviceSlug = filter_input(INPUT_GET, 'service', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'refrigerator-repair';
$serviceData = $servicesList[$serviceSlug] ?? $servicesList['refrigerator-repair'];

$pageTitle = $serviceData['title'] . " | GeekSmart Appliance Repair";
$pageDesc  = $serviceData['short_desc'] . " Fast onsite and virtual diagnostics by certified technicians.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(135deg, var(--primary), var(--primary-light)); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
      <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><?php echo htmlspecialchars($serviceData['category']); ?></span>
      <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem;"><?php echo htmlspecialchars($serviceData['title']); ?></h1>
      <p style="font-size: 1.15rem; color: rgba(255,255,255,0.85); margin-bottom: 2rem;">
        <?php echo htmlspecialchars($serviceData['full_desc']); ?>
      </p>

      <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <button class="btn btn-cyan btn-lg" data-open-modal="booking-modal">
          <i class="ri-calendar-check-line"></i> Book <?php echo htmlspecialchars($serviceData['title']); ?>
        </button>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline-white btn-lg">
          <i class="ri-phone-fill"></i> Call <?php echo PHONE_NUMBER; ?>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="section-padding">
  <div class="container">
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem;">
      <div>
        <h3 style="font-size: 1.75rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem;">Common Symptoms & Issues We Solve</h3>
        <p style="font-size: 1rem; color: var(--text-muted); margin-bottom: 1.5rem;">
          Our certified technicians diagnose and resolve complex electronic, mechanical, and network faults:
        </p>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); margin-bottom: 2.5rem;">
          <ul style="display: flex; flex-direction: column; gap: 1rem;">
            <?php foreach ($serviceData['common_issues'] as $issue): ?>
              <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 1rem;">
                <i class="ri-error-warning-line" style="color: var(--primary-accent); font-size: 1.25rem; margin-top: 2px;"></i>
                <span><?php echo htmlspecialchars($issue); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <h3 style="font-size: 1.75rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem;">Service Process & Standards</h3>
        <p style="font-size: 1rem; color: var(--text-muted); margin-bottom: 1rem;">
          Every repair performed by GeekSmart Appliance follows strict quality control procedures to ensure optimal safety, energy efficiency, and equipment longevity.
        </p>
      </div>

      <div>
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-color); box-shadow: var(--shadow-md); position: sticky; top: 100px;">
          <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin-bottom: 1.25rem;">Service Overview</h4>
          
          <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.95rem; margin-bottom: 1.5rem;">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">
              <span style="color: var(--text-muted);">Response Time:</span>
              <strong style="color: var(--primary);"><?php echo htmlspecialchars($serviceData['turnaround']); ?></strong>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">
              <span style="color: var(--text-muted);">Protection:</span>
              <strong style="color: var(--primary);">90 Days Parts & Labor</strong>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">
              <span style="color: var(--text-muted);">Availability:</span>
              <strong style="color: var(--success);">Same-Day Dispatch</strong>
            </div>
          </div>

          <button class="btn btn-primary" style="width: 100%; margin-bottom: 0.75rem;" data-open-modal="booking-modal">
            Schedule Appointment
          </button>
          <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline" style="width: 100%;">
            <i class="ri-phone-line"></i> Call Hotline
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
