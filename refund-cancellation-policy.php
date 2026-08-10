<?php
/**
 * GeekSmart Appliance - Official Refund & Cancellation Policy Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Refund & Cancellation Policy | " . SITE_NAME;
$pageDesc  = "Official Refund and Cancellation Policy for GeekSmart Appliance detailing appointment cancellations, service protection, and return guidelines.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 0 3.5rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container" style="max-width: 920px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="shield-check" style="width: 14px; height: 14px;"></i> Billing & Service Policies</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem;" class="text-gradient">Refund & Cancellation Policy</h1>
    <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 600;">Effective Date: May 25, 2026 • GeekSmart Appliance</p>
  </div>
</section>

<section style="padding: 4rem 0; background: var(--bg-light);">
  <div class="container" style="max-width: 920px;">
    
    <!-- 3 Feature Highlight Badges -->
    <div class="grid grid-cols-3" style="margin-bottom: 2.5rem;">
      <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <div class="service-icon-box" style="width: 48px; height: 48px; margin-bottom: 0.85rem; background: var(--primary-subtle); color: var(--primary);">
          <i data-lucide="calendar-clock" style="width: 22px; height: 22px;"></i>
        </div>
        <h4 style="font-size: 1.1rem; color: var(--text-main); margin-bottom: 0.3rem;">Cancel Free</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">24+ hours before appointment—zero fee.</p>
      </div>

      <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <div class="service-icon-box" style="width: 48px; height: 48px; margin-bottom: 0.85rem; background: var(--accent-subtle); color: var(--accent); border-color: #fed7aa;">
          <i data-lucide="shield-check" style="width: 22px; height: 22px;"></i>
        </div>
        <h4 style="font-size: 1.1rem; color: var(--text-main); margin-bottom: 0.3rem;">90-Day Coverage</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">All installed parts backed for 90 days.</p>
      </div>

      <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <div class="service-icon-box" style="width: 48px; height: 48px; margin-bottom: 0.85rem; background: var(--success-subtle); color: var(--success); border-color: #a7f3d0;">
          <i data-lucide="package" style="width: 22px; height: 22px;"></i>
        </div>
        <h4 style="font-size: 1.1rem; color: var(--text-main); margin-bottom: 0.3rem;">30-Day Returns</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Unopened supplies eligible for return.</p>
      </div>
    </div>

    <!-- Main Content Body -->
    <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: 2rem; font-size: 0.95rem; color: var(--text-muted); line-height: 1.7;">
      
      <!-- Section 1 -->
      <div id="service-cancellation">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">1.</span> Appointment Cancellation Policy
        </h2>
        <p style="margin-bottom: 1.25rem;">
          We understand that scheduling adjustments occur. Our cancellation rules accommodate customer flexibility while supporting technician dispatch logistics.
        </p>

        <!-- Styled Cancellation Table -->
        <div style="border: 1px solid var(--border-light); border-radius: var(--radius-md); overflow: hidden; margin-bottom: 1.25rem;">
          <div style="display: grid; grid-template-columns: 1.5fr 1fr 2fr; background: var(--bg-subtle); padding: 0.85rem 1.25rem; font-weight: 800; font-size: 0.85rem; color: var(--text-main);">
            <div>Cancellation Timing</div>
            <div>Fee Status</div>
            <div>Details</div>
          </div>
          <div style="display: grid; grid-template-columns: 1.5fr 1fr 2fr; padding: 1rem 1.25rem; border-top: 1px solid var(--border-light); font-size: 0.875rem; align-items: center;">
            <div><strong>24+ hours before appointment</strong></div>
            <div><span style="background: var(--success-subtle); color: var(--success); font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 4px;">No Fee</span></div>
            <div>Full cancellation at zero cost.</div>
          </div>
          <div style="display: grid; grid-template-columns: 1.5fr 1fr 2fr; padding: 1rem 1.25rem; border-top: 1px solid var(--border-light); font-size: 0.875rem; align-items: center; background: #ffffff;">
            <div><strong>Emergency cancellation</strong></div>
            <div><span style="background: var(--primary-subtle); color: var(--primary); font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 4px;">Case-by-Case</span></div>
            <div>Notify us immediately; we work to accommodate you.</div>
          </div>
        </div>
      </div>

      <!-- Section 2 -->
      <div id="protection-coverage" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">2.</span> 90-Day Service & Parts Protection
        </h2>
        <p style="margin-bottom: 1rem;">
          All replacement parts and repair labor provided by <?php echo SITE_NAME; ?> come backed by 90-day parts protection. If the identical fault recurs within 90 days, we return to inspect and correct the issue at zero extra charge.
        </p>
      </div>

      <!-- Section 3 -->
      <div id="product-returns" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">3.</span> Product & Supplies Return Terms
        </h2>
        <p style="margin-bottom: 1rem;">
          Unopened printer cartridges, accessories, or unused OEM components purchased directly from us may be returned within 30 days of purchase for a full refund minus shipping costs.
        </p>
      </div>

      <!-- Section 4 -->
      <div id="contact-us" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem;">4. Contact Us For Refunds or Rescheduling</h2>
        <div style="background: var(--text-main); color: #ffffff; padding: 1.75rem; border-radius: var(--radius-md);">
          <h4 style="font-size: 1.1rem; color: var(--cyan); margin-bottom: 0.75rem;"><?php echo SITE_NAME; ?></h4>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.45rem;">
            <i data-lucide="map-pin" style="width: 16px; height: 16px; flex-shrink: 0;"></i> <?php echo BUSINESS_ADDRESS; ?>
          </p>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.45rem;">
            <i data-lucide="mail" style="width: 16px; height: 16px; flex-shrink: 0;"></i>
            <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" style="color: #60a5fa;"><?php echo EMAIL_ADDRESS; ?></a>
          </p>
          <p style="font-size: 0.9rem; display: flex; align-items: center; gap: 0.45rem;">
            <i data-lucide="phone" style="width: 16px; height: 16px; flex-shrink: 0;"></i>
            <a href="tel:<?php echo PHONE_RAW; ?>" style="color: var(--cyan); font-weight: 700;"><?php echo PHONE_NUMBER; ?></a>
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
