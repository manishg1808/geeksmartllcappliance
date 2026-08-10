<?php
/**
 * GeekSmart Appliance - Official Legal Disclaimer Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Legal Disclaimer | " . SITE_NAME;
$pageDesc  = "Official legal disclaimer for GeekSmart Appliance detailing service scope, third-party link policies, and liability limits.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 0 3.5rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container" style="max-width: 920px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="alert-triangle" style="width: 14px; height: 14px;"></i> Legal Notice & Service Scope</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem;" class="text-gradient">Legal Disclaimer</h1>
    <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 600;">Effective Date: May 25, 2026 • GeekSmart Appliance</p>
  </div>
</section>

<section style="padding: 4rem 0; background: var(--bg-light);">
  <div class="container" style="max-width: 920px;">
    
    <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: 2rem; font-size: 0.95rem; color: var(--text-muted); line-height: 1.7;">
      
      <!-- Section 1 -->
      <div id="general-disclaimer">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">1.</span> General Informational Disclaimer
        </h2>
        <p style="margin-bottom: 1rem;">
          The information contained on the <strong><?php echo SITE_NAME; ?></strong> website is provided for general informational purposes only. While we endeavor to keep all diagnostic guides, error code references, and service descriptions accurate and up-to-date, <?php echo SITE_NAME; ?> makes no representation or statement of any kind, express or implied, regarding the completeness, validity, or reliability of any information on this site.
        </p>
        
        <div style="background: var(--accent-subtle); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid #ffedd5; font-size: 0.875rem; color: var(--accent-hover); font-weight: 600;">
          <i data-lucide="shield-alert" style="width: 18px; height: 18px; vertical-align: middle;"></i> <strong>Limitation of Liability:</strong> Under no circumstances shall <?php echo SITE_NAME; ?> be held liable for any loss or damage incurred as a result of relying on website content or diagnostic tips without professional technician inspection.
        </div>
      </div>

      <!-- Section 2 -->
      <div id="professional-service" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">2.</span> Professional Service Disclaimer
        </h2>
        <p style="margin-bottom: 1rem;">
          While <?php echo SITE_NAME; ?> employs experienced mobile technicians and IT specialists, repair outcomes may vary depending on equipment age, physical condition, prior unapproved modifications, or severe electrical damage.
        </p>

        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.75rem;">
          <li style="background: var(--bg-light); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-light); font-size: 0.875rem; color: var(--text-main); font-weight: 600;">
            <i data-lucide="hard-drive" style="color: var(--primary); width: 16px; height: 16px; vertical-align: middle;"></i> We strongly advise backing up important computer and network data prior to any tech support session.
          </li>
          <li style="background: var(--bg-light); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-light); font-size: 0.875rem; color: var(--text-main); font-weight: 600;">
            <i data-lucide="wrench" style="color: var(--primary); width: 16px; height: 16px; vertical-align: middle;"></i> We are not liable for pre-existing hardware defects, rusted components, or data loss not caused directly by our service personnel.
          </li>
        </ul>
      </div>

      <!-- Section 3 -->
      <div id="third-party-links" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">3.</span> Third-Party Links & Brand Disclaimer
        </h2>
        <p>
          Our website may reference third-party brand names (such as Samsung, LG, Whirlpool, GE, HP, Canon, Epson, Bosch) for compatibility and identification purposes only. All trademarks belong to their respective owners. Reference to third-party sites does not imply endorsement.
        </p>
      </div>

      <!-- Section 4 -->
      <div id="errors-omissions" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem; border-bottom: 1px solid var(--border-light); padding-bottom: 0.5rem;">
          <span style="color: var(--primary);">4.</span> Errors and Omissions
        </h2>
        <p>
          While we strive for complete accuracy, pricing, service availability, and diagnostic guidelines are subject to change without notice. Please contact our representatives directly to confirm service details.
        </p>
      </div>

      <!-- Contact Us -->
      <div id="contact-us" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem;">Contact Us</h2>
        <div style="background: var(--text-main); color: #ffffff; padding: 1.75rem; border-radius: var(--radius-md);">
          <h4 style="font-size: 1.1rem; color: var(--cyan); margin-bottom: 0.75rem;"><?php echo SITE_NAME; ?></h4>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem;">📍 <?php echo BUSINESS_ADDRESS; ?></p>
          <p style="margin-bottom: 0.4rem; font-size: 0.9rem;">📧 <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" style="color: #60a5fa;"><?php echo EMAIL_ADDRESS; ?></a></p>
          <p style="font-size: 0.9rem;">📞 <a href="tel:<?php echo PHONE_RAW; ?>" style="color: var(--cyan); font-weight: 700;"><?php echo PHONE_NUMBER; ?></a></p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
