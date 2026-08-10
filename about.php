<?php
/**
 * GeekSmart Appliance - Rich About Us Page with Lucide Icons & Bento Grid Layouts
 */
require_once __DIR__ . '/config.php';

$pageTitle = "About Us | Premier Appliance & Tech Support - " . SITE_NAME;
$pageDesc  = "Learn about GeekSmart Appliance - British Columbia's premier provider of fast, reliable appliance repair and technical support services.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<!-- Header Banner -->
<section style="background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%); color: #ffffff; padding: 4.5rem 0 5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 0.75rem;"><i data-lucide="info" style="width: 16px; height: 16px; vertical-align: middle;"></i> Company Profile</span>
    <h1 style="font-size: 2.75rem; font-weight: 800; margin-bottom: 1rem; color: #ffffff;">About GeekSmart Appliance</h1>
    <p style="font-size: 1.15rem; max-width: 720px; margin: 0 auto; color: rgba(255,255,255,0.85);">
      Bridging modern diagnostic technology with experienced local onsite appliance and smart home repair expertise.
    </p>
  </div>
</section>

<!-- Stats Bar -->
<section style="background: #ffffff; padding: 2rem 0; border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div class="grid grid-cols-4 text-center">
      <div>
        <h3 style="font-size: 2rem; color: var(--primary); font-weight: 800;">1,680+</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Verified Reviews</p>
      </div>
      <div>
        <h3 style="font-size: 2rem; color: var(--primary); font-weight: 800;">15 Mins</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Avg Response Time</p>
      </div>
      <div>
        <h3 style="font-size: 2rem; color: var(--primary); font-weight: 800;">98.6%</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">First-Visit Resolution</p>
      </div>
      <div>
        <h3 style="font-size: 2rem; color: var(--primary); font-weight: 800;">90 Days</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Parts & Labor Protection</p>
      </div>
    </div>
  </div>
</section>

<!-- Company Overview -->
<section class="section-padding" style="padding: 4.5rem 0;">
  <div class="container">
    <div class="grid grid-cols-2" style="align-items: center; gap: 4rem;">
      <div>
        <div class="hero-badge" style="margin-bottom: 1rem;">
          <i data-lucide="shield" style="width: 16px; height: 16px; color: var(--primary);"></i> Premier Technical Advantage
        </div>
        <h2 style="font-size: 2.25rem; margin-bottom: 1.25rem;" class="text-gradient">Smart Repairs, Faster Results & Total Reliability</h2>
        <p style="font-size: 1.05rem; color: var(--text-muted); margin-bottom: 1.25rem; line-height: 1.65;">
          GeekSmart Appliance was founded to remove delays, high costs, and friction from home appliance repair and IT equipment setup.
        </p>
        <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.65;">
          We combine real-time diagnostic checks with a network of experienced mobile technicians. Whether your refrigerator is leaking, your washing machine won't spin, or your wireless printer is stuck offline, GeekSmart Appliance delivers immediate diagnostic clarity and long-lasting repairs.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
          <div style="background: var(--bg-light); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--border-light);">
            <i data-lucide="user-check" style="width: 26px; height: 26px; color: var(--primary);"></i>
            <h4 style="font-weight: 700; margin-top: 0.4rem; font-size: 0.95rem;">Experienced Technicians</h4>
            <p style="font-size: 0.825rem; color: var(--text-muted);">Trained across top brands.</p>
          </div>

          <div style="background: var(--bg-light); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--border-light);">
            <i data-lucide="clock" style="width: 26px; height: 26px; color: var(--primary);"></i>
            <h4 style="font-weight: 700; margin-top: 0.4rem; font-size: 0.95rem;">Same-Day Service</h4>
            <p style="font-size: 0.825rem; color: var(--text-muted);">Rapid dispatch across BC.</p>
          </div>
        </div>
      </div>

      <div class="glass-card">
        <h3 style="font-size: 1.35rem; margin-bottom: 1.25rem;">Why Customers Trust Us</h3>
        <ul style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.95rem;">
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
            <div><strong>Instant Communication:</strong> Over 40% of appliance error codes can be diagnosed and reset in 15 minutes.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
            <div><strong>Original OEM Parts:</strong> We use genuine factory replacement parts for Samsung, LG, Whirlpool, GE, Bosch & more.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
            <div><strong>Transparent Flat-Rate Pricing:</strong> Honest upfront estimates before any repair work commences.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
            <div><strong>90-Day Service Coverage:</strong> Complete peace of mind covering all replacement parts and labor.</div>
          </li>
        </ul>

        <div style="margin-top: 1.75rem; border-top: 1px solid var(--border-light); padding-top: 1.25rem;">
          <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent" style="width: 100%; justify-content: center;">
            <i data-lucide="phone-call" style="width: 18px; height: 18px;"></i> Speak With A Representative
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NEW SECTION 1: CORE OPERATIONAL VALUES BENTO GRID -->
<section style="padding: 4.5rem 0; background: var(--bg-light); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Core Operational Principles</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">The Values Driving Our Technical Team</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Built around transparency, speed, and customer-first technical support.</p>
    </div>

    <div class="bento-grid">
      <!-- 2-Column Featured Bento Card -->
      <div class="bento-span-2 bento-card-featured" style="padding: 2.25rem; border-radius: var(--radius-lg);">
        <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
          <i data-lucide="dollar-sign" style="width: 26px; height: 26px;"></i>
        </div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-main);">Zero Hidden Fees & Upfront Flat Rates</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
          We believe in complete financial transparency. Before any technician tightens a single screw or orders an OEM replacement component, you receive an itemized flat-rate quote. No surprise hourly surcharges or hidden travel fees.
        </p>
      </div>

      <!-- 1-Column Card -->
      <div style="background: #ffffff; padding: 2.25rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--accent-subtle); color: var(--accent); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid #ffedd5;">
            <i data-lucide="zap" style="width: 26px; height: 26px;"></i>
          </div>
          <h4 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Rapid Mobile Dispatch</h4>
          <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.6;">Same-day dispatch network equipped with diagnostic tools to resolve issues fast.</p>
        </div>
      </div>

      <!-- 1-Column Card -->
      <div style="background: #ffffff; padding: 2.25rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
          <i data-lucide="award" style="width: 26px; height: 26px;"></i>
        </div>
        <h4 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Factory OEM Direct</h4>
        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.6;">Exclusive installation of brand-certified replacement parts for extended durability.</p>
      </div>

      <!-- 2-Column Bento Card -->
      <div class="bento-span-2" style="background: #ffffff; padding: 2.25rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--success-subtle); color: var(--success); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid #dcfce7;">
          <i data-lucide="recycle" style="width: 26px; height: 26px;"></i>
        </div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-main);">Eco-Friendly Electronics & Appliance Care</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
          Extending the life of home appliances and IT hardware reduces electronic waste. When components are replaced, we safely recycle obsolete electrical parts and copper wiring in compliance with environmental standards.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- NEW SECTION 2: REGIONAL DISPATCH RADIUS GRID -->
<section style="padding: 4.5rem 0; background: #ffffff;">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Service Area Network</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">Serving British Columbia Communities</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Mobile technicians dispatched daily across major metropolitan hubs.</p>
    </div>

    <div class="grid grid-cols-4">
      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 1.5rem; border-radius: var(--radius-md);">
        <h4 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 0.3rem;">Metro Vancouver</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Downtown, Kitsilano, East Van, West End</p>
      </div>

      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 1.5rem; border-radius: var(--radius-md);">
        <h4 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 0.3rem;">Surrey & Langley</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Whalley, Cloverdale, Fleetwood, Walnut Grove</p>
      </div>

      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 1.5rem; border-radius: var(--radius-md);">
        <h4 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 0.3rem;">Burnaby & Coquitlam</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Metrotown, Brentwood, Port Moody, Westwood</p>
      </div>

      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 1.5rem; border-radius: var(--radius-md);">
        <h4 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 0.3rem;">Richmond & Delta</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Steveston, City Centre, Ladner, Tsawwassen</p>
      </div>
    </div>
  </div>
</section>

<!-- Emergency CTA -->
<section style="background: var(--text-main); color: #ffffff; padding: 4rem 0;">
  <div class="container text-center">
    <h2 style="font-size: 2.25rem; margin-bottom: 0.75rem; color: #ffffff;">Need Appliance or Tech Repair Today?</h2>
    <p style="font-size: 1.05rem; color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto 1.75rem auto;">
      Contact our direct hotline line or book online for immediate scheduling.
    </p>
    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
      <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent btn-lg">
        <i data-lucide="phone-call" style="width: 20px; height: 20px;"></i> Call <?php echo PHONE_NUMBER; ?>
      </a>
      <a href="<?php echo SITE_URL; ?>/booking.php" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar" style="width: 20px; height: 20px;"></i> Book Service Online
      </a>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
