<?php
/**
 * GeekSmart Appliance - Comprehensive Terms and Conditions Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Terms and Conditions | " . SITE_NAME;
$pageDesc  = "Read the official Terms and Conditions governing repair services, diagnostic requests, and website usage for GeekSmart Appliance.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 0 3.5rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container" style="max-width: 920px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="file-text" style="width: 14px; height: 14px;"></i> Legal Agreement & Terms</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem;" class="text-gradient">Terms and Conditions</h1>
    <p style="color: var(--text-muted); font-size: 0.95rem; font-weight: 600;">Effective Date: May 25, 2026 • GeekSmart Appliance</p>
  </div>
</section>

<section style="padding: 4rem 0; background: var(--bg-light);">
  <div class="container" style="max-width: 920px;">
    
    <!-- Table of Contents -->
    <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); margin-bottom: 2.5rem; box-shadow: var(--shadow-sm);">
      <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--text-main); margin-bottom: 1rem; border-left: 4px solid var(--primary); padding-left: 0.75rem;">
        Table of Contents
      </h3>
      <div class="grid grid-cols-2" style="font-size: 0.9rem; font-weight: 600; gap: 0.65rem;">
        <a href="#section-1" style="color: var(--primary);">1. Acceptance of Terms</a>
        <a href="#section-2" style="color: var(--primary);">2. Scope of Technical Services</a>
        <a href="#section-3" style="color: var(--primary);">3. Eligibility & Access Authorization</a>
        <a href="#section-4" style="color: var(--primary);">4. Pricing, Estimates & Billing</a>
        <a href="#section-5" style="color: var(--primary);">5. Scheduling & Onsite Access</a>
        <a href="#section-6" style="color: var(--primary);">6. Cancellation & Rescheduling</a>
        <a href="#section-7" style="color: var(--primary);">7. Service Protection & Liability Limits</a>
        <a href="#section-8" style="color: var(--primary);">8. Intellectual Property</a>
        <a href="#section-9" style="color: var(--primary);">9. User Conduct & Responsibilities</a>
        <a href="#section-10" style="color: var(--primary);">10. Indemnification</a>
        <a href="#section-11" style="color: var(--primary);">11. Governing Law & Disputes</a>
        <a href="#section-12" style="color: var(--primary);">12. Contact Information</a>
      </div>
    </div>

    <!-- Main Content Body -->
    <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: 2rem; font-size: 0.95rem; color: var(--text-muted); line-height: 1.7;">
      
      <p style="font-size: 1.05rem; color: var(--text-main);">
        These Terms and Conditions ("Terms") govern your use of the website and technical repair services supplied by <strong><?php echo SITE_NAME; ?></strong> ("Company," "we," "us," or "our"). By requesting an appointment, submitting a service form, or engaging our technicians, you agree to adhere to these Terms.
      </p>

      <!-- Section 1 -->
      <div id="section-1" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">1. Acceptance of Terms</h2>
        <p>By browsing our website, booking diagnostic appointments, or engaging our repair personnel, you acknowledge that you have read, understood, and agreed to be bound by these Terms and our Privacy Policy. If you do not accept these Terms, you must discontinue using our services immediately.</p>
      </div>

      <!-- Section 2 -->
      <div id="section-2" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">2. Scope of Technical Services</h2>
        <p style="margin-bottom: 0.85rem;"><?php echo SITE_NAME; ?> offers onsite and remote technical support for residential and commercial equipment, including but not limited to:</p>
        <ul style="list-style: disc; padding-left: 1.25rem; font-size: 0.9rem;">
          <li>Refrigerator, freezer, ice maker, and wine cooler diagnostics and component repairs.</li>
          <li>Washing machine, clothes dryer, oven, range, and dishwasher repairs.</li>
          <li>Printer setup, copier configuration, paper jam fixes, and wireless driver troubleshooting.</li>
          <li>Commercial equipment inspection, preventive maintenance, and component replacements.</li>
          <li>Smart home hub pairing, TV wall mounting, and IT network optimization.</li>
        </ul>
      </div>

      <!-- Section 3 -->
      <div id="section-3" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">3. Eligibility & Access Authorization</h2>
        <p style="margin-bottom: 0.85rem;">To authorize technical service, you confirm and state that:</p>
        <ul style="list-style: disc; padding-left: 1.25rem; font-size: 0.9rem;">
          <li>You are at least 18 years of age and possess full legal authority to enter into service agreements.</li>
          <li>You own the equipment or hold explicit authorization from the property owner to grant repair access.</li>
          <li>You will provide a safe, accessible working environment for our mobile service personnel.</li>
        </ul>
      </div>

      <!-- Section 4 -->
      <div id="section-4" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">4. Pricing, Estimates & Billing</h2>
        <p style="margin-bottom: 0.85rem;">Diagnostic evaluations and repair estimates are provided prior to initiating work. All flat-rate service fees, replacement component costs, and taxes are due upon completion of the service appointment unless alternative corporate billing terms are established in writing.</p>
      </div>

      <!-- Section 5 -->
      <div id="section-5" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">5. Scheduling & Onsite Access</h2>
        <p>Appointment windows are provided in good faith. While we strive to maintain exact arrival times, delays due to traffic, severe weather, or complex prior repairs may occur. We will notify you promptly of any schedule adjustments.</p>
      </div>

      <!-- Section 6 -->
      <div id="section-6" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">6. Cancellation & Rescheduling</h2>
        <p>Appointments may be canceled or rescheduled without charge up to 24 hours prior to the scheduled service time. Refer to our Refund & Cancellation Policy for full details on late cancellations.</p>
      </div>

      <!-- Section 7 -->
      <div id="section-7" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">7. Service Protection & Liability Limits</h2>
        <p style="margin-bottom: 0.85rem;">All replacement parts supplied and installed by <?php echo SITE_NAME; ?> carry a 90-day parts and labor protection policy. Our liability for any claim arising out of service performance shall not exceed the total amount paid by the customer for that specific service call.</p>
      </div>

      <!-- Section 8 -->
      <div id="section-8" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">8. Intellectual Property</h2>
        <p>All logos, website copy, graphic designs, icons, and software scripts displayed on this website are the property of <?php echo SITE_NAME; ?> and are protected by applicable copyright and trademark laws.</p>
      </div>

      <!-- Section 9 -->
      <div id="section-9" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">9. User Conduct & Responsibilities</h2>
        <p>Users agree not to misuse our digital platforms, submit false service requests, tamper with diagnostic scripts, or engage in abusive conduct toward our support staff or technicians.</p>
      </div>

      <!-- Section 10 -->
      <div id="section-10" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">10. Indemnification</h2>
        <p>You agree to defend, indemnify, and hold harmless <?php echo SITE_NAME; ?> from any claims, damages, or expenses resulting from your breach of these Terms or unauthorized equipment alterations.</p>
      </div>

      <!-- Section 11 -->
      <div id="section-11" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">11. Governing Law & Disputes</h2>
        <p>These Terms are governed by and construed in accordance with the laws of British Columbia, Canada. Any legal proceedings shall be conducted exclusively within the courts of British Columbia.</p>
      </div>

      <!-- Section 12 -->
      <div id="section-12" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem;">12. Contact Information</h2>
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
