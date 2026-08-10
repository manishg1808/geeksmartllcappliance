<?php
/**
 * GeekSmart Appliance - Comprehensive Privacy Policy Page
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Privacy Policy | " . SITE_NAME;
$pageDesc  = "Learn how GeekSmart Appliance collects, protects, uses, and safeguards your personal data and service information.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 0 3.5rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container" style="max-width: 920px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="shield-check" style="width: 14px; height: 14px;"></i> Data Protection & Transparency</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem;" class="text-gradient">Privacy Policy</h1>
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
        <a href="#section-1" style="color: var(--primary);">1. Information We Collect</a>
        <a href="#section-2" style="color: var(--primary);">2. How We Use Your Information</a>
        <a href="#section-3" style="color: var(--primary);">3. Sharing of Information</a>
        <a href="#section-4" style="color: var(--primary);">4. Cookies & Tracking Technologies</a>
        <a href="#section-5" style="color: var(--primary);">5. Data Security Standards</a>
        <a href="#section-6" style="color: var(--primary);">6. Your Rights & Privacy Choices</a>
        <a href="#section-7" style="color: var(--primary);">7. Children's Privacy</a>
        <a href="#section-8" style="color: var(--primary);">8. California Privacy Rights (CCPA)</a>
        <a href="#section-9" style="color: var(--primary);">9. Policy Modifications</a>
        <a href="#section-contact" style="color: var(--primary);">10. Contact Us</a>
      </div>
    </div>

    <!-- Main Content Body -->
    <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-card); display: flex; flex-direction: column; gap: 2rem; font-size: 0.95rem; color: var(--text-muted); line-height: 1.7;">
      
      <p style="font-size: 1.05rem; color: var(--text-main);">
        This Privacy Policy outlines how <strong><?php echo SITE_NAME; ?></strong> ("Company," "we," "us," or "our") collects, uses, protects, and discloses personal information obtained when you browse our website or utilize our appliance repair and technical support services.
      </p>

      <!-- Section 1 -->
      <div id="section-1" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">1. Information We Collect</h2>
        <p style="margin-bottom: 1rem;">We obtain personal details provided directly by you, data gathered automatically during website usage, and verification details from authorized third-party partners.</p>
        
        <h4 style="font-size: 1rem; color: var(--text-main); margin-bottom: 0.4rem;">A. Information You Direct Provide:</h4>
        <ul style="list-style: disc; padding-left: 1.25rem; margin-bottom: 1.25rem; font-size: 0.9rem;">
          <li>Full name, telephone number, email address, and home/business address.</li>
          <li>Appliance details, equipment model numbers, and symptom descriptions.</li>
          <li>Payment information processed through secure, PCI-compliant payment gateways.</li>
          <li>Service inquiries, feedback forms, and customer support communications.</li>
        </ul>

        <h4 style="font-size: 1rem; color: var(--text-main); margin-bottom: 0.4rem;">B. Information Collected Automatically:</h4>
        <ul style="list-style: disc; padding-left: 1.25rem; font-size: 0.9rem;">
          <li>IP addresses, browser type, operating system version, and device identifiers.</li>
          <li>Pages viewed, referral source URLs, time spent per page, and navigation clicks.</li>
        </ul>
      </div>

      <!-- Section 2 -->
      <div id="section-2" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">2. How We Use Your Information</h2>
        <p style="margin-bottom: 1rem;">The information we collect is processed for administrative and operational purposes, including:</p>
        <ul style="list-style: disc; padding-left: 1.25rem; font-size: 0.9rem;">
          <li>Scheduling and completing mobile onsite service visits or remote diagnostic sessions.</li>
          <li>Sending appointment reminders, order confirmations, repair status updates, and invoices.</li>
          <li>Responding to customer support inquiries, feedback messages, and service claims.</li>
          <li>Improving website performance, diagnostic workflows, and customer experience.</li>
          <li>Detecting, preventing, and mitigating fraudulent transactions or unauthorized access.</li>
          <li>Fulfilling legal obligations and regulatory requirements across British Columbia.</li>
        </ul>
      </div>

      <!-- Section 3 -->
      <div id="section-3" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">3. Sharing of Information</h2>
        <p style="margin-bottom: 1rem;">We maintain a strict policy against selling your personal data to third parties. We may disclose information under the following limited circumstances:</p>
        <ul style="list-style: disc; padding-left: 1.25rem; font-size: 0.9rem;">
          <li><strong>Authorized Service Providers:</strong> Trusted third-party vendors (payment processors, SMS dispatch systems, CRM platforms) necessary to execute services.</li>
          <li><strong>Legal & Regulatory Mandates:</strong> When compelled by subpoena, court order, or applicable provincial/federal laws.</li>
          <li><strong>Protection of Rights:</strong> To enforce our terms, prevent fraud, and safeguard the rights and safety of <?php echo SITE_NAME; ?> and our customers.</li>
          <li><strong>Business Transfers:</strong> In connection with any merger, asset acquisition, or corporate restructuring.</li>
        </ul>
      </div>

      <!-- Section 4 -->
      <div id="section-4" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">4. Cookies & Tracking Technologies</h2>
        <p style="margin-bottom: 1rem;">Our website utilizes session and persistent cookies to personalize content, retain user preferences, and analyze web traffic anonymously. You can manage or disable cookies in your web browser settings at any time.</p>
      </div>

      <!-- Section 5 -->
      <div id="section-5" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">5. Data Security Standards</h2>
        <p style="margin-bottom: 1rem;">We implement industry-standard administrative, technical, and physical safeguards—including SSL encryption and firewalls—to protect your personal information against unauthorized access, loss, or alteration.</p>
      </div>

      <!-- Section 6 -->
      <div id="section-6" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">6. Your Rights & Privacy Choices</h2>
        <p style="margin-bottom: 1rem;">Depending on your location, you hold the right to request access to, correction of, or deletion of your personal data held by us. You may also unsubscribe from promotional emails by following the opt-out link in any message.</p>
      </div>

      <!-- Section 7 -->
      <div id="section-7" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">7. Children's Privacy</h2>
        <p style="margin-bottom: 1rem;">Our services are strictly directed to individuals aged 18 and older. We do not knowingly collect personal data from minors under 18 years of age.</p>
      </div>

      <!-- Section 8 -->
      <div id="section-8" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">8. California Privacy Rights (CCPA)</h2>
        <p style="margin-bottom: 1rem;">California residents have specific rights regarding personal data, including the right to know what personal information is collected, request deletion, and opt out of any data sharing.</p>
      </div>

      <!-- Section 9 -->
      <div id="section-9" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 0.85rem;">9. Changes to This Policy</h2>
        <p style="margin-bottom: 1rem;">We reserve the right to revise this Privacy Policy periodically. Any modifications will be published on this page with an updated effective date.</p>
      </div>

      <!-- Contact Us -->
      <div id="section-contact" style="border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
        <h2 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem;">10. Contact Us</h2>
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
