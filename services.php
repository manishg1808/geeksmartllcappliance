<?php
/**
 * GeekSmart Appliance - Full Interactive Services Catalog (17+ Services) with Rich Grid Sections & Lucide Icons
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Full Appliance & Technical Services Catalog (17+ Services) | GeekSmart Appliance";
$pageDesc  = "Explore our complete catalog of certified appliance diagnostics, kitchen repairs, laundry troubleshooting, commercial unit service, and printer setup.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<!-- 1. HERO SEARCH & BANNER SECTION -->
<section style="padding: 4.5rem 0 3.5rem; background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); border-bottom: 1px solid var(--border-light);">
  <div class="container text-center" style="max-width: 820px;">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="layout-grid" style="width: 16px; height: 16px;"></i> Complete Catalog • 17 Technical Solutions</span>
    <h1 style="font-size: 2.85rem; margin-bottom: 1rem;" class="text-gradient">
      Appliance & Tech Services Catalog
    </h1>
    <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 2rem;">
      Find instant diagnostic evaluations and repair solutions for home appliances, commercial equipment, and printer networks.
    </p>

    <!-- Live Interactive Search Bar -->
    <div style="position: relative; max-width: 580px; margin: 0 auto;">
      <input type="text" id="service-search-input" class="form-control" placeholder="Search by service name or symptom (e.g. Refrigerator, Printer, Washer, Leak)..." style="padding: 1rem 1.25rem 1rem 3rem; font-size: 1rem; border-radius: var(--radius-full); box-shadow: var(--shadow-card);">
      <i data-lucide="search" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: var(--primary); width: 20px; height: 20px;"></i>
    </div>
  </div>
</section>

<!-- 2. FILTER TABS & ALL 17-SERVICES GRID -->
<section style="padding: 4.5rem 0; background: var(--bg-light);">
  <div class="container">
    <!-- Category Filter Tabs Bar -->
    <div class="filter-tabs" style="margin-bottom: 2.5rem;">
      <button class="filter-tab active" data-category="all">All Services (17+)</button>
      <button class="filter-tab" data-category="Kitchen Appliances">Kitchen</button>
      <button class="filter-tab" data-category="Laundry Appliances">Laundry</button>
      <button class="filter-tab" data-category="Printers & Tech">Tech & Printer</button>
      <button class="filter-tab" data-category="Commercial">Commercial</button>
      <button class="filter-tab" data-category="Smart Home & TV">Smart Home</button>
    </div>

    <!-- Dynamic 17-Service Bento Mosaic Grid -->
    <div class="bento-grid catalog-mosaic-grid" id="services-catalog-grid">
      <?php
      $catalogLayouts = ['wide', 'standard', 'compact', 'featured', 'horizontal', 'accent', 'standard'];
      $catalogIndex   = 0;
      foreach ($servicesList as $slug => $srv):
          $layout = $catalogLayouts[$catalogIndex % count($catalogLayouts)];
          $catalogIndex++;
          include __DIR__ . '/includes/service-catalog-card.php';
      endforeach;
      ?>
    </div>
  </div>
</section>

<!-- 3. NEW SECTION: SYMPTOM DIAGNOSTIC MATRIX GRID -->
<section style="padding: 4.5rem 0; background: #ffffff; border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);" id="symptom-matrix">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Diagnostic Troubleshooting</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">Troubleshoot By Equipment Symptom</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Identify your appliance issue below for targeted technician dispatch.</p>
    </div>

    <div class="grid grid-cols-3">
      <!-- Symptom Column 1 -->
      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 2rem; border-radius: var(--radius-lg);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid var(--border-accent);">
          <i data-lucide="snowflake" style="width: 24px; height: 24px;"></i>
        </div>
        <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Cooling & Frost Issues</h3>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">Warm refrigerator compartments, frost buildup, ice maker jams, and wine cooler thermostat faults.</p>
        <a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php" class="btn btn-outline btn-sm">View Cooling Repairs &rarr;</a>
      </div>

      <!-- Symptom Column 2 -->
      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 2rem; border-radius: var(--radius-lg);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: var(--accent-subtle); color: var(--accent); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid #ffedd5;">
          <i data-lucide="droplet" style="width: 24px; height: 24px;"></i>
        </div>
        <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Drainage & Leakage</h3>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">Standing water in dishwashers or washers, leaking under-sink disposals, and clogged drain solenoids.</p>
        <a href="<?php echo SITE_URL; ?>/services/washer-repair.php" class="btn btn-outline btn-sm">View Drainage Repairs &rarr;</a>
      </div>

      <!-- Symptom Column 3 -->
      <div style="background: var(--bg-light); border: 1px solid var(--border-light); padding: 2rem; border-radius: var(--radius-lg);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: var(--success-subtle); color: var(--success); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid #dcfce7;">
          <i data-lucide="flame" style="width: 24px; height: 24px;"></i>
        </div>
        <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Heating & Power Trips</h3>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">Dryers tumbling without heat, gas range igniters clicking, oven display codes, and breaker trips.</p>
        <a href="<?php echo SITE_URL; ?>/services/oven-repair.php" class="btn btn-outline btn-sm">View Heating Repairs &rarr;</a>
      </div>
    </div>
  </div>
</section>

<!-- 4. NEW SECTION: RESIDENTIAL VS COMMERCIAL SERVICE TIERS BENTO MATRIX -->
<section style="padding: 4.5rem 0; background: var(--bg-light); border-bottom: 1px solid var(--border-light);" id="service-tiers">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Service Tiers</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">Tailored Technical Solutions</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Whether servicing home kitchens or commercial facilities, we deliver dedicated protocols.</p>
    </div>

    <div class="grid grid-cols-2" style="gap: 2rem;">
      <!-- Tier 1: Residential -->
      <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); box-shadow: var(--shadow-sm);">
        <span style="font-size: 0.75rem; font-weight: 700; background: var(--primary-subtle); color: var(--primary); padding: 0.25rem 0.65rem; border-radius: var(--radius-sm); margin-bottom: 1rem; display: inline-block;">Residential Homeowners</span>
        <h3 style="font-size: 1.4rem; color: var(--text-main); margin-bottom: 1rem; font-weight: 800;">Home Appliance Service Protocol</h3>
        <p style="font-size: 0.925rem; color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.6;">
          Convenient same-day appointment slots for residential kitchens, laundry rooms, smart TVs, and home printers.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.875rem; color: var(--text-main); margin-bottom: 1.75rem;">
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Flat-rate upfront diagnostic estimate</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Original OEM replacement components</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> 90-day parts protection policy</li>
        </ul>
        <a href="<?php echo SITE_URL; ?>/booking.php" class="btn btn-primary" style="width: 100%; justify-content: center;">Schedule Home Visit</a>
      </div>

      <!-- Tier 2: Commercial -->
      <div style="background: #ffffff; padding: 2.5rem; border-radius: var(--radius-lg); border: 2px solid var(--border-accent); box-shadow: 0 10px 30px -5px rgba(37,99,235,0.12);">
        <span style="font-size: 0.75rem; font-weight: 700; background: var(--accent-subtle); color: var(--accent); padding: 0.25rem 0.65rem; border-radius: var(--radius-sm); margin-bottom: 1rem; display: inline-block;">Commercial Businesses</span>
        <h3 style="font-size: 1.4rem; color: var(--primary); margin-bottom: 1rem; font-weight: 800;">Commercial Priority Dispatch Protocol</h3>
        <p style="font-size: 0.925rem; color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.6;">
          Priority emergency response for restaurants, hotels, laundromats, offices, and commercial facilities across BC.
        </p>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.875rem; color: var(--text-main); margin-bottom: 1.75rem;">
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Priority emergency technician response</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> High-capacity commercial equipment testing</li>
          <li style="display: flex; gap: 0.5rem; align-items: center;"><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> Commercial billing & preventive maintenance</li>
        </ul>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent" style="width: 100%; justify-content: center;"><i data-lucide="phone-call" style="width: 18px; height: 18px;"></i> Emergency Business Line</a>
      </div>
    </div>
  </div>
</section>

<!-- 5. NEW SECTION: CONNECTED STEPPER TIMELINE FLOW -->
<section style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid var(--border-light);" id="diagnostic-flow">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Quality Workflow</div>
      <h2 style="font-size: 2.35rem; margin-bottom: 0.75rem;" class="text-gradient">Our 4-Step Technical Protocol</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Rigorous diagnostic procedures executed on every appointment.</p>
    </div>

    <div class="stepper-timeline">
      <div class="step-card">
        <div class="step-badge-num">1</div>
        <h4 style="font-size: 1.1rem; margin-bottom: 0.4rem; color: var(--text-main);">Onsite Inspection</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Voltage checks, error code readings, and mechanical diagnostics.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">2</div>
        <h4 style="font-size: 1.1rem; margin-bottom: 0.4rem; color: var(--text-main);">Flat-Rate Quote</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Itemized cost provided before any component work begins.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">3</div>
        <h4 style="font-size: 1.1rem; margin-bottom: 0.4rem; color: var(--text-main);">OEM Replacement</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Installation of genuine factory-certified replacement parts.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">4</div>
        <h4 style="font-size: 1.1rem; margin-bottom: 0.4rem; color: var(--text-main);">System Calibration</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Post-repair test run and 90-day service protection activation.</p>
      </div>
    </div>
  </div>
</section>

<!-- 6. FAQ SECTION -->
<section style="padding: 4.5rem 0; background: var(--bg-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Service Questions</div>
      <h2 style="font-size: 2.25rem; margin-bottom: 0.75rem;" class="text-gradient">Catalog FAQs</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Common queries regarding our equipment coverage and diagnostic procedure.</p>
    </div>

    <div class="faq-accordion">
      <div class="faq-item active">
        <div class="faq-header">
          How do I select the right service for my appliance?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          Use the search bar at the top of this page or select a category tab (Kitchen, Laundry, Tech, Commercial). You can also click "Book" on any card to consult our team.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-header">
          Are replacement parts included in the repair quote?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          Our technicians provide clear upfront flat-rate estimates that cover both genuine replacement parts and labor before work begins.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 7. EMERGENCY CTA BANNER -->
<section style="background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%); color: #ffffff; padding: 4rem 0;">
  <div class="container text-center">
    <h2 style="font-size: 2.25rem; margin-bottom: 1rem; color: #ffffff;">Don't See Your Specific Equipment Listed?</h2>
    <p style="font-size: 1.1rem; color: rgba(255,255,255,0.85); max-width: 650px; margin: 0 auto 1.75rem auto;">
      Our technical team handles custom appliance repairs, commercial equipment, and specialized tech setups.
    </p>
    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
      <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent btn-lg">
        <i data-lucide="phone-call" style="width: 20px; height: 20px;"></i> Call Hotline: <?php echo PHONE_NUMBER; ?>
      </a>
      <a href="<?php echo SITE_URL; ?>/booking.php" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar" style="width: 20px; height: 20px;"></i> Book Custom Inspection
      </a>
    </div>
  </div>
</section>

<!-- Live Search Client-Side Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('service-search-input');
  const catalogItems = document.querySelectorAll('.service-catalog-item');
  const filterTabs = document.querySelectorAll('.filter-tab');

  if (searchInput) {
    searchInput.addEventListener('input', () => {
      const query = searchInput.value.toLowerCase().trim();
      catalogItems.forEach(item => {
        const title = item.getAttribute('data-title') || '';
        if (query === '' || title.includes(query)) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
      if (window.lucide) lucide.createIcons();
    });
  }

  filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      filterTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const cat = tab.getAttribute('data-category');
      catalogItems.forEach(item => {
        if (cat === 'all' || item.getAttribute('data-category') === cat) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
      if (window.lucide) lucide.createIcons();
    });
  });
});
</script>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
