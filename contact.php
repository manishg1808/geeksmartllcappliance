<?php
/**
 * GeekSmart Appliance - Rich Contact Us Page with Unique Grid Layouts & Lucide Icons
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Contact Us | GeekSmart Appliance Repair & Tech Support";
$pageDesc  = "Get in touch with GeekSmart Appliance. Direct phone hotline support, email inquiries, and service area information across British Columbia.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<!-- Header Banner -->
<section style="background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i data-lucide="headphones" style="width: 16px; height: 16px; vertical-align: middle;"></i> Get In Touch</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem; color: #ffffff;">Contact Support & Service Dispatch</h1>
    <p style="font-size: 1.15rem; max-width: 680px; margin: 0 auto; color: rgba(255,255,255,0.85);">
      Our technical team is ready to assist you with questions, service estimates, or urgent repair needs.
    </p>
  </div>
</section>

<!-- 1. ASYMMETRIC CONTACT CARDS & FORM SPLIT GRID -->
<section style="padding: 4.5rem 0; background: var(--bg-light);">
  <div class="container">
    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 3rem;">
      <!-- Left Column: Contact Cards -->
      <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
          <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
            <i data-lucide="phone-call" style="width: 24px; height: 24px;"></i>
          </div>
          <h4 style="font-weight: 800; color: var(--text-main); font-size: 1.1rem; margin-bottom: 0.35rem;">Customer Support Hotline</h4>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 0.75rem;">Instant connection with a senior technical advisor.</p>
          <a href="tel:<?php echo PHONE_RAW; ?>" style="font-size: 1.35rem; font-weight: 800; color: var(--primary);"><?php echo PHONE_NUMBER; ?></a>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
          <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
            <i data-lucide="mail" style="width: 24px; height: 24px;"></i>
          </div>
          <h4 style="font-weight: 800; color: var(--text-main); font-size: 1.1rem; margin-bottom: 0.35rem;">Email Inquiry Support</h4>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 0.75rem;">Send us your query or error code diagnostic details.</p>
          <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" style="font-weight: 700; color: var(--primary); font-size: 0.95rem; text-decoration: underline;"><?php echo EMAIL_ADDRESS; ?></a>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2rem; border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
          <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
            <i data-lucide="clock" style="width: 24px; height: 24px;"></i>
          </div>
          <h4 style="font-weight: 800; color: var(--text-main); font-size: 1.1rem; margin-bottom: 0.35rem;">Dispatch Hours</h4>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 0.75rem;"><?php echo BUSINESS_HOURS; ?></p>
          <span style="font-size: 0.75rem; font-weight: 700; background: var(--success-subtle); color: var(--success); padding: 0.25rem 0.65rem; border-radius: var(--radius-sm); display: inline-flex; align-items: center; gap: 0.35rem;">
            <i data-lucide="zap" style="width: 14px; height: 14px;"></i> Emergency On-Call Technicians
          </span>
        </div>
      </div>

      <!-- Right Column: Contact Form -->
      <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2.75rem; border: 1px solid var(--border-light); box-shadow: var(--shadow-card);">
        <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Send Us A Direct Message</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 1.75rem;">Fill out the form below and an technical advisor will connect with you shortly.</p>

        <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="ajax-form">
          <input type="hidden" name="form_type" value="contact_page">

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <label class="form-label">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" placeholder="(808) 999-7791" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Email Address *</label>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
          </div>

          <div class="form-group">
            <label class="form-label">Service Subject / Appliance *</label>
            <input type="text" name="service" class="form-control" placeholder="e.g. Refrigerator Repair / Printer Network Setup" required>
          </div>

          <div class="form-group">
            <label class="form-label">Message Details / Error Symptoms *</label>
            <textarea name="message" class="form-control" rows="5" placeholder="How can our technical team help you today?" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 0.5rem;">
            <i data-lucide="send" style="width: 18px; height: 18px;"></i> Send Inquiry Message
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- 2. EMERGENCY DISPATCH VS STANDARD SERVICE MATRIX -->
<section style="padding: 4.5rem 0; background: #ffffff; border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Appointment Types</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">Choose Your Service Protocol</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">We offer flexible options depending on your equipment urgency.</p>
    </div>

    <div class="grid grid-cols-2" style="gap: 2rem;">
      <div style="background: var(--bg-light); padding: 2.25rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light);">
        <h4 style="font-size: 1.25rem; color: var(--text-main); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
          <i data-lucide="calendar" style="color: var(--primary); width: 22px; height: 22px;"></i> Standard Onsite Scheduling
        </h4>
        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 1.25rem; line-height: 1.6;">
          Ideal for routine maintenance, non-critical appliance repairs, or scheduled printer setup. Select your preferred morning or afternoon window.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.875rem; color: var(--text-main);">
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Next-day appointment availability</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Flat-rate upfront diagnostic check</li>
        </ul>
      </div>

      <div style="background: #ffffff; padding: 2.25rem; border-radius: var(--radius-lg); border: 2px solid var(--border-accent); box-shadow: 0 10px 25px -5px rgba(37,99,235,0.12);">
        <h4 style="font-size: 1.25rem; color: var(--primary); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
          <i data-lucide="zap" style="color: var(--accent); width: 22px; height: 22px;"></i> Priority Same-Day Dispatch
        </h4>
        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 1.25rem; line-height: 1.6;">
          For urgent situations like leaking refrigerators, non-spinning washers before work, or commercial cooler alerts.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.875rem; color: var(--text-main);">
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> 15-minute response confirmation</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Mobile technician dispatched immediately</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
