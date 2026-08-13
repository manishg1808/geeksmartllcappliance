<?php
/**
 * GeekSmart Appliance - Flagship Homepage with SEO Content Sections
 */
require_once __DIR__ . '/config.php';

$pageTitle = "Rapid, Dependable Appliance & Tech Support | GeekSmart Appliance";
$pageDesc  = "Rapid, dependable appliance repair and tech support right when you need it most. Diagnostics for refrigerators, washers, dryers, ovens, dishwashers, commercial equipment, and office printers.";

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/navigation.php';
?>

<!-- 1. HERO BANNER SECTION WITH RIGHT-SIDE ANIMATED SERVICE SHOWCASE -->
<section class="hero-section">
  <!-- Professional Dot & Star Matrix Pattern Backdrop -->
  <div class="hero-dot-star-pattern"></div>

  <!-- Subtle Vector Star Accents -->
  <svg style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;" xmlns="http://www.w3.org/2000/svg">
    <!-- Star 1 (Top Left) -->
    <path d="M120 40 L123 52 L135 55 L123 58 L120 70 L117 58 L105 55 L117 52 Z" fill="#2563EB" opacity="0.16"/>
    <!-- Star 2 (Right Top) -->
    <path d="M1100 80 L1103 92 L1115 95 L1103 98 L1100 110 L1097 98 L1085 95 L1097 92 Z" fill="#F97316" opacity="0.16"/>
    <!-- Star 3 (Center Bottom) -->
    <path d="M480 340 L482 350 L492 352 L482 354 L480 364 L478 354 L468 352 L478 350 Z" fill="#2563EB" opacity="0.14"/>
  </svg>

  <div class="container">
    <div class="hero-grid">
      <!-- Left Column: Main Headline, Copy & CTAs -->
      <div>
        <div class="hero-badge">
          <i data-lucide="shield-check" style="color: var(--primary); width: 16px; height: 16px;"></i> Premier Diagnostic & Mobile Repair Services
        </div>
        
        <h1 class="hero-title">
          Fast, Expert <span class="text-gradient-cyan">Appliance & Tech Solutions</span> Delivered Straight to Your Door
        </h1>

        <p class="hero-desc">
          Fast, reliable diagnostic checks and expert repairs for home appliances, commercial units, and office printers. <strong>Quality service assured!</strong>
        </p>

        <div class="hero-actions">
          <button class="btn btn-accent" data-open-modal="booking-modal">
            <i data-lucide="calendar" style="width: 18px; height: 18px;"></i> Book Technician Appointment
          </button>
          <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline">
            <i data-lucide="layout-grid" style="width: 18px; height: 18px;"></i> Explore Service Directory
          </a>
        </div>

        <div class="hero-stats">
          <div>
            <div class="stat-number">4.9 ★</div>
            <div class="stat-label">1,680+ Satisfied Clients</div>
          </div>
          <div>
            <div class="stat-number">90-Day</div>
            <div class="stat-label">Parts & Labor Protection</div>
          </div>
          <div>
            <div class="stat-number">&lt; 15 Mins</div>
            <div class="stat-label">Fast Dispatch Assurance</div>
          </div>
        </div>
      </div>

      <!-- Right Column: Animated Service Showcase Widget ("Ruk Ruk Ke Animation") -->
      <div>
        <div class="hero-animated-showcase-card" id="hero-animated-showcase-card">
          <button type="button" class="showcase-nav-btn showcase-nav-prev" id="showcase-prev" aria-label="Previous service">
            <i data-lucide="chevron-left"></i>
          </button>
          <button type="button" class="showcase-nav-btn showcase-nav-next" id="showcase-next" aria-label="Next service">
            <i data-lucide="chevron-right"></i>
          </button>

          <div class="showcase-header-bar">
            <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--text-main); display: flex; align-items: center; gap: 0.5rem;">
              <i data-lucide="play-circle" style="color: var(--primary); width: 20px; height: 20px;"></i> Featured Service Showcase
            </h3>
          </div>

          <!-- Viewport carrying all slides -->
          <div class="showcase-service-viewport">
            <?php 
            $slideIndex = 0;
            foreach ($servicesList as $slug => $srv):
              $slideIndex++;
            ?>
              <div class="showcase-service-slide <?php echo ($slideIndex === 1) ? 'active' : ''; ?>" data-slide-index="<?php echo $slideIndex - 1; ?>">
                <div>
                  <div class="showcase-icon-header">
                    <div class="showcase-icon-box">
                      <i data-lucide="<?php echo htmlspecialchars($srv['icon']); ?>" style="width: 32px; height: 32px;"></i>
                    </div>
                    <div class="showcase-title-area">
                      <h4><?php echo htmlspecialchars($srv['title']); ?></h4>
                      <span><i data-lucide="zap" style="width: 14px; height: 14px; display: inline;"></i> <?php echo htmlspecialchars($srv['turnaround']); ?></span>
                    </div>
                  </div>

                  <p class="showcase-desc"><?php echo htmlspecialchars($srv['short_desc']); ?></p>

                  <ul class="showcase-issues-list">
                    <?php foreach (array_slice($srv['common_issues'], 0, 2) as $issue): ?>
                      <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px;"></i> <?php echo htmlspecialchars($issue); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>

                <div style="display: flex; gap: 0.5rem; margin-top: auto;">
                  <button class="btn btn-accent btn-sm" style="flex: 1;" data-open-modal="booking-modal" data-service-title="<?php echo htmlspecialchars($srv['title']); ?>">
                    <i data-lucide="calendar" style="width: 16px; height: 16px;"></i> Book This Service
                  </button>
                  <a href="<?php echo SITE_URL . $srv['url']; ?>" class="btn btn-outline btn-sm">
                    Details &rarr;
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Pagination & Progress Controls -->
          <div class="showcase-pagination">
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted);">
              Auto changes every 3s • Hover to pause
            </span>
            <div class="showcase-dots" id="showcase-dots-container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fluid Water Wave Bottom Divider -->
  <div class="hero-water-wave">
    <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 50px; display: block;">
      <path d="M0,32L48,42.7C96,53,192,75,288,80C384,85,480,75,576,64C672,53,768,43,864,48C960,53,1056,75,1152,80C1248,85,1344,75,1392,70L1440,64L1440,100L1392,100C1344,100,1248,100,1152,100C1056,100,960,100,864,100C768,100,672,100,576,100C480,100,384,100,288,100C192,100,96,100,48,100L0,100Z" fill="#ffffff" opacity="0.7"></path>
      <path d="M0,64L48,58.7C96,53,192,43,288,48C384,53,480,75,576,80C672,85,768,75,864,64C960,53,1056,43,1152,48C1248,53,1344,75,1392,80L1440,85L1440,100L1392,100C1344,100,1248,100,1152,100C1056,100,960,100,864,100C768,100,672,100,576,100C480,100,384,100,288,100C192,100,96,100,48,100L0,100Z" fill="#f8fafc"></path>
    </svg>
  </div>
</section>

<!-- 2. ASYMMETRIC BENTO TRUST GUARANTEES BAR -->
<section style="background: var(--bg-light); border-bottom: 1px solid var(--border-light); padding: 3rem 0;">
  <div class="container">
    <div class="bento-grid">
      <!-- 2-Column Featured Bento Card -->
      <div class="bento-span-2 bento-card-featured bento-card-featured-inner">
        <div style="display: flex; align-items: center; gap: 1.25rem;">
          <div style="width: 58px; height: 58px; border-radius: 12px; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 8px 16px rgba(37,99,235,0.25);">
            <i data-lucide="clock" style="width: 28px; height: 28px;"></i>
          </div>
          <div>
            <span style="font-size: 0.75rem; font-weight: 800; background: var(--primary-subtle); color: var(--primary); padding: 0.2rem 0.6rem; border-radius: var(--radius-sm); text-transform: uppercase;">
              <span class="pulse-dot"></span> Same-Day Priority Dispatch
            </span>
            <h4 style="font-size: 1.15rem; margin-top: 0.35rem;">15-Minute Response & Same-Day Technician Onsite</h4>
          </div>
        </div>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-primary btn-sm" style="flex-shrink: 0;">
          <i data-lucide="phone-call" style="width: 16px; height: 16px;"></i> Call Now
        </a>
      </div>

      <!-- 1-Column Card -->
      <div style="background: #ffffff; padding: 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--border-light); display: flex; align-items: center; gap: 1rem; box-shadow: var(--shadow-sm);">
        <div style="width: 50px; height: 50px; border-radius: 10px; background: var(--accent-subtle); color: var(--accent); display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 1px solid #ffedd5;">
          <i data-lucide="shield" style="width: 24px; height: 24px;"></i>
        </div>
        <div>
          <h4 style="font-size: 1rem; margin-bottom: 0.2rem;">90-Day Coverage</h4>
          <p style="font-size: 0.825rem; color: var(--text-muted);">Parts & Labor Covered</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 2.5 QUICK SERVICE REQUEST — Horizontal Lead Form -->
<section class="home-lead-bar" id="quick-request">
  <div class="container">
    <div class="home-lead-bar-card">
      <div class="home-lead-bar-intro">
        <span class="home-lead-bar-badge">
          <i data-lucide="zap" style="width: 14px; height: 14px;"></i> Fast Response
        </span>
        <h3>Request a Free Diagnostic Callback</h3>
        <p>Submit your details — our technician team responds within 15 minutes.</p>
      </div>

      <form action="<?php echo SITE_URL; ?>/process-form.php" method="POST" class="home-lead-form ajax-form">
        <input type="hidden" name="form_type" value="homepage_quick_request">
        <input type="hidden" name="message" value="Quick service request submitted from homepage horizontal form.">

        <div class="home-lead-form-field">
          <label class="sr-only" for="home-lead-name">Full Name</label>
          <input type="text" id="home-lead-name" name="name" class="form-control" placeholder="Full name" required autocomplete="name">
        </div>

        <div class="home-lead-form-field">
          <label class="sr-only" for="home-lead-phone">Phone Number</label>
          <input type="tel" id="home-lead-phone" name="phone" class="form-control" placeholder="Phone number" required autocomplete="tel">
        </div>

        <div class="home-lead-form-field">
          <label class="sr-only" for="home-lead-email">Email Address</label>
          <input type="email" id="home-lead-email" name="email" class="form-control" placeholder="Email address" autocomplete="email">
        </div>

        <div class="home-lead-form-field home-lead-form-field--select">
          <label class="sr-only" for="home-lead-service">Service Needed</label>
          <select id="home-lead-service" name="service" class="form-select" required>
            <?php service_select_options('Select service'); ?>
          </select>
        </div>

        <div class="home-lead-form-action">
          <button type="submit" class="btn btn-primary home-lead-submit">
            <i data-lucide="send" style="width: 16px; height: 16px;"></i>
            <span>Get Callback</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- 3. SERVICES CATALOG -->
<section class="home-catalog-section" id="catalog">
  <div class="container">
    <div class="home-catalog-header">
      <div class="home-catalog-eyebrow">Complete Catalog</div>
      <h2 class="text-gradient home-catalog-title">Appliance & Technical Services Directory</h2>
      <p class="home-catalog-desc">Browse our most requested services — view full details or book a technician in minutes.</p>
    </div>

    <?php
    $homeCatalogCategories = [
      'Kitchen Appliances' => 'Kitchen',
      'Laundry Appliances' => 'Laundry',
      'Printers & Tech' => 'Tech',
      'Smart Home & TV' => 'Smart Home',
      'Commercial' => 'Commercial',
    ];
    $totalServiceCount = count($servicesList);
    $homeCatalogServices = array_slice($servicesList, 0, 9, true);
    ?>

    <div class="home-catalog-panel">
      <div class="home-catalog-grid" id="homepage-services-grid">
        <?php foreach ($homeCatalogServices as $slug => $srv):
          $catLabel = $homeCatalogCategories[$srv['category']] ?? $srv['category'];
        ?>
          <article class="home-service-card service-catalog-item" data-category="<?php echo htmlspecialchars($srv['category']); ?>">
            <a href="<?php echo SITE_URL . $srv['url']; ?>" class="home-service-link" aria-label="View <?php echo htmlspecialchars($srv['title']); ?> details">
              <div class="home-service-icon">
                <i data-lucide="<?php echo htmlspecialchars($srv['icon']); ?>"></i>
              </div>
              <span class="home-service-cat"><?php echo htmlspecialchars($catLabel); ?></span>
              <h3 class="home-service-title"><?php echo htmlspecialchars($srv['title']); ?></h3>
            </a>
            <div class="home-service-actions">
              <a href="<?php echo SITE_URL . $srv['url']; ?>" class="btn btn-outline btn-sm home-service-btn">
                <span>Details</span>
                <i data-lucide="arrow-up-right"></i>
              </a>
              <button type="button" class="btn btn-primary btn-sm home-service-btn" data-open-modal="booking-modal" data-service-title="<?php echo htmlspecialchars($srv['title']); ?>">
                <span>Book</span>
              </button>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="home-catalog-explore">
      <p class="home-catalog-explore-text">
        Showing <?php echo count($homeCatalogServices); ?> of <?php echo $totalServiceCount; ?> services
      </p>
      <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-primary home-catalog-explore-btn">
        <span>Explore All Services</span>
        <i data-lucide="arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- 4. CORE TECHNICAL CAPABILITIES BENTO BOX -->
<section style="padding: 5rem 0; background: var(--bg-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Core Expertise</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Comprehensive Technical Domains</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">We specialize in diagnostic evaluations and onsite & remote technical repairs across 3 core domains.</p>
    </div>

    <div class="bento-grid">
      <!-- Domain 1: Bento Featured Span -->
      <div class="bento-span-2 glass-card bento-card-featured" style="padding: 2.25rem;">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <div style="width: 56px; height: 56px; border-radius: 10px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-accent);">
            <i data-lucide="snowflake" style="width: 28px; height: 28px;"></i>
          </div>
          <div>
            <h3 style="font-size: 1.35rem;">Kitchen & Laundry Appliance Diagnostics</h3>
            <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary);">Same-Day Mobile Dispatch Across BC</span>
          </div>
        </div>
        
        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 1.5rem;">
          Diagnostic evaluations and component repairs for refrigerators, washers, dryers, ovens, ranges, and dishwashers.
        </p>

        <ul class="service-card-features" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> Control board error decoders</li>
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> Thermostat & sensor diagnostics</li>
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> Drain pump & motor repair</li>
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> Compressor start relay tests</li>
        </ul>
      </div>

      <!-- Domain 2 -->
      <div class="glass-card" style="padding: 2.25rem;">
        <div style="width: 56px; height: 56px; border-radius: 10px; background: var(--accent-subtle); color: var(--accent); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; border: 1px solid #ffedd5;">
          <i data-lucide="printer" style="width: 28px; height: 28px;"></i>
        </div>
        <h3 style="font-size: 1.25rem; margin-bottom: 0.65rem;">Printer & Office Tech</h3>
        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 1.25rem;">
          Setup for wireless printers, laser copiers, scan-to-folder SMB setup & drivers.
        </p>
        <ul class="service-card-features">
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> WiFi offline & IP fix</li>
          <li><i data-lucide="check-circle" style="color: var(--success); width: 16px; height: 16px; display: inline;"></i> Scan-to-Email setup</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4.5 NEW SECTION: THE GEEKSMART APPLIANCE ADVANTAGE COMPARISON MATRIX -->
<section style="padding: 5rem 0; background: #ffffff; border-bottom: 1px solid var(--border-light);" id="advantage">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Transparent Choice</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">The GeekSmart Appliance Advantage</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">See why thousands of homeowners and businesses trust us over traditional repair shops.</p>
    </div>

    <div class="grid grid-cols-2" style="gap: 2rem; align-items: stretch;">
      <!-- Traditional Repair Shops (Subtle Muted Box) -->
      <div style="background: var(--bg-light); border-radius: var(--radius-lg); padding: 2.25rem; border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <span style="font-size: 0.8rem; font-weight: 700; background: #fee2e2; color: #dc2626; padding: 0.25rem 0.75rem; border-radius: var(--radius-sm); display: inline-block; margin-bottom: 1rem;">
            Traditional Local Repair Shops
          </span>
          <h3 style="font-size: 1.35rem; color: var(--text-main); margin-bottom: 1.25rem;">Standard Industry Service</h3>
          
          <ul style="list-style: none; display: flex; flex-direction: column; gap: 1rem; font-size: 0.925rem; color: var(--text-muted);">
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="x-circle" style="color: #dc2626; width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>3 to 5 Days Waiting Window:</strong> Long delays before a technician arrives at your property.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="x-circle" style="color: #dc2626; width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>Hidden Diagnostic Fees:</strong> Surprise billing add-ons and extra hourly service surcharges.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="x-circle" style="color: #dc2626; width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>Generic Aftermarket Parts:</strong> Low-cost replacement parts that fail prematurely.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="x-circle" style="color: #dc2626; width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>No Labor Coverage:</strong> Limited or zero post-service coverage after the technician leaves.</div>
            </li>
          </ul>
        </div>
      </div>

      <!-- GeekSmart Advantage (Glowing Bento Card) -->
      <div class="bento-card-featured" style="border-radius: var(--radius-lg); padding: 2.25rem; border: 2px solid var(--border-accent); display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 20px 40px -10px rgba(37,99,235,0.15);">
        <div>
          <span style="font-size: 0.8rem; font-weight: 700; background: var(--primary-subtle); color: var(--primary); padding: 0.25rem 0.75rem; border-radius: var(--radius-sm); display: inline-flex; align-items: center; gap: 0.4rem; margin-bottom: 1rem; border: 1px solid var(--border-accent);">
            <i data-lucide="check-circle-2" style="width: 14px; height: 14px;"></i> Recommended Partner
          </span>
          <h3 style="font-size: 1.35rem; color: var(--text-main); margin-bottom: 1.25rem;">GeekSmart Appliance Standard</h3>

          <ul style="list-style: none; display: flex; flex-direction: column; gap: 1rem; font-size: 0.925rem; color: var(--text-main);">
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>Same-Day Priority Dispatch:</strong> Fast 15-minute response and same-day onsite arrival across BC.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>Transparent Upfront Flat-Rates:</strong> Clear pricing quotes provided before any work commences.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>100% Genuine Factory OEM Parts:</strong> Factory replacement components from Samsung, LG, Whirlpool & GE.</div>
            </li>
            <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <i data-lucide="check-circle" style="color: var(--success); width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"></i>
              <div><strong>90-Day Parts & Labor Protection:</strong> Full comprehensive coverage on all repairs for total peace of mind.</div>
            </li>
          </ul>
        </div>

        <div style="margin-top: 1.75rem; border-top: 1px solid var(--border-light); padding-top: 1.25rem;">
          <button class="btn btn-primary" style="width: 100%; justify-content: center;" data-open-modal="booking-modal">
            <i data-lucide="zap" style="width: 16px; height: 16px;"></i> Experience The GeekSmart Advantage
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 5. INTERACTIVE APPLIANCE PROBLEM FINDER -->
<section style="padding: 5rem 0; background: #ffffff; border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Interactive Tool</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Appliance Problem Finder</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Select your equipment and symptom below to view immediate diagnostic recommendations.</p>
    </div>

    <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 2.75rem; border: 1px solid var(--border-light); max-width: 860px; margin: 0 auto; box-shadow: 0 15px 35px rgba(15,23,42,0.06);">
      <div class="grid grid-cols-2" style="margin-bottom: 1.75rem; gap: 1.5rem;">
        <div class="form-group">
          <label class="form-label" for="finder-appliance">1. Select Equipment Type *</label>
          <select id="finder-appliance" class="form-select">
            <option value="refrigerator">Refrigerator / Freezer</option>
            <option value="washer">Washing Machine</option>
            <option value="dryer">Clothes Dryer</option>
            <option value="oven">Oven / Range / Stove</option>
            <option value="dishwasher">Dishwasher</option>
            <option value="printer">Printer / Copier</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="finder-symptom">2. Select Primary Symptom *</label>
          <select id="finder-symptom" class="form-select">
            <option value="cooling">Not Cooling / Temperature Failure</option>
            <option value="error">Error Code Displayed on Panel</option>
            <option value="drain">Standing Water / Drain Failure</option>
            <option value="noise">Unusual Grinding or Clicking Noise</option>
            <option value="power">Appliance Refuses to Start</option>
            <option value="offline">Printer Showing Offline Status</option>
          </select>
        </div>
      </div>

      <div style="background: var(--primary-subtle); border-radius: var(--radius-md); padding: 1.5rem 1.75rem; border-left: 4px solid var(--primary); margin-bottom: 1.75rem; border: 1px solid var(--border-accent); border-left-width: 4px;">
        <div style="display: flex; align-items: flex-start; gap: 0.85rem;">
          <i data-lucide="lightbulb" style="width: 24px; height: 24px; color: var(--primary); margin-top: 2px;"></i>
          <div>
            <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--primary); margin-bottom: 0.35rem;" id="finder-result-title">Recommended Solution: Refrigerator Defrost Thermistor & Relay Check</h4>
            <p style="font-size: 0.925rem; color: var(--text-muted); line-height: 1.6;" id="finder-result-desc">Temperature drops are commonly caused by a faulty defrost thermistor, ice-clogged evaporator coils, or compressor start relay failures. Our technicians carry original OEM sensors for immediate resolution.</p>
          </div>
        </div>
      </div>

      <div style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;">
        <button class="btn btn-accent btn-lg" data-open-modal="booking-modal">
          <i data-lucide="calendar" style="width: 18px; height: 18px;"></i> Book Service For This Issue
        </button>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-outline btn-lg">
          <i data-lucide="phone" style="width: 18px; height: 18px;"></i> Speak With Technician
        </a>
      </div>
    </div>
  </div>
</section>

<!-- 6. CONNECTED STEPPER TIMELINE FLOW -->
<section style="padding: 5rem 0; background: var(--bg-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">How It Works</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Connected Service Workflow Timeline</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Four simple connected steps to restore your appliances and office technology back to peak performance.</p>
    </div>

    <div class="stepper-timeline">
      <div class="step-card">
        <div class="step-badge-num">1</div>
        <h4 style="font-size: 1.15rem; margin-bottom: 0.4rem;">Submit Request</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Book online or call our 24/7 hotline with your equipment details.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">2</div>
        <h4 style="font-size: 1.15rem; margin-bottom: 0.4rem;">Diagnostic Check</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Technician inspects the fault and presents clear flat-rate options.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">3</div>
        <h4 style="font-size: 1.15rem; margin-bottom: 0.4rem;">Expert Repair</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">We replace faulty components using genuine OEM replacement parts.</p>
      </div>

      <div class="step-card">
        <div class="step-badge-num">4</div>
        <h4 style="font-size: 1.15rem; margin-bottom: 0.4rem;">Tested & Support</h4>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Complete testing verified with a full 90-day parts and labor protection policy.</p>
      </div>
    </div>
  </div>
</section>

<!-- 7. NEW SEO SECTION: MANUFACTURER ERROR CODE DIAGNOSTIC LOOKUP HUB -->
<section style="padding: 5rem 0; background: #ffffff; border-bottom: 1px solid var(--border-light);" id="error-codes">
  <div class="container">
    <div style="text-align: center; max-width: 740px; margin: 0 auto 3rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Diagnostic Knowledge Base</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Common Appliance Error Code Index</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Lookup common digital error codes for Samsung, LG, Whirlpool, GE, and HP equipment.</p>
    </div>

    <div class="error-code-panel">
      <div class="error-code-head">
        <div>Brand / Manufacturer</div>
        <div>Error Code</div>
        <div>Diagnostic Cause</div>
        <div>Technician Solution</div>
      </div>

      <div class="error-code-row">
        <div data-label="Brand"><strong>Samsung Refrigerator</strong></div>
        <div data-label="Error Code"><span class="error-code-badge">E4 / 22E</span></div>
        <div data-label="Cause">Evaporator Fan Motor or Defrost Thermistor Failure</div>
        <div data-label="Solution"><a href="<?php echo SITE_URL; ?>/services/refrigerator-repair.php">Inspect Sensor &rarr;</a></div>
      </div>

      <div class="error-code-row">
        <div data-label="Brand"><strong>LG Washing Machine</strong></div>
        <div data-label="Error Code"><span class="error-code-badge">OE Error</span></div>
        <div data-label="Cause">Drain Pump Blockage or Discharge Pressure Sensor Fault</div>
        <div data-label="Solution"><a href="<?php echo SITE_URL; ?>/services/washer-repair.php">Clear Pump Line &rarr;</a></div>
      </div>

      <div class="error-code-row">
        <div data-label="Brand"><strong>Whirlpool Dryer</strong></div>
        <div data-label="Error Code"><span class="error-code-badge">E1 / F1</span></div>
        <div data-label="Cause">Primary Control Board or Thermal Cutoff Fuse Triggered</div>
        <div data-label="Solution"><a href="<?php echo SITE_URL; ?>/services/dryer-repair.php">Replace Fuse &rarr;</a></div>
      </div>

      <div class="error-code-row">
        <div data-label="Brand"><strong>HP LaserJet Printer</strong></div>
        <div data-label="Error Code"><span class="error-code-badge">79.2FE0</span></div>
        <div data-label="Cause">Internal Firmware Spooler &amp; Network IP Address Conflict</div>
        <div data-label="Solution"><a href="<?php echo SITE_URL; ?>/printer-service.php">Reset Wireless IP &rarr;</a></div>
      </div>
    </div>

    <!-- Mention Note Callout Card for Error Code Section -->
    <div style="margin-top: 1.5rem; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: var(--radius-md); padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
      <div style="display: flex; align-items: center; gap: 0.85rem; flex: 1;">
        <i data-lucide="info" style="width: 22px; height: 22px; color: var(--primary); flex-shrink: 0;"></i>
        <div style="font-size: 0.875rem; color: var(--text-main); font-weight: 500;">
          <strong>Important Diagnostic Mention:</strong> Digital error codes vary by specific model number and manufacturing year. If your equipment is displaying an unlisted error code, contact our diagnostic specialists for immediate technical assistance.
        </div>
      </div>
      <button class="btn btn-accent btn-sm" data-open-modal="booking-modal">
        <i data-lucide="headset" style="width: 16px; height: 16px;"></i> Ask A Technician
      </button>
    </div>
  </div>
</section>

<!-- 9. NEW SEO SECTION: PREVENTIVE MAINTENANCE TIPS -->
<section style="padding: 5rem 0; background: #ffffff; border-bottom: 1px solid var(--border-light);" id="maintenance-tips">
  <div class="container">
    <div style="text-align: center; max-width: 740px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Appliance Care Guide</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Preventive Maintenance & Lifespan Tips</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Simple owner practices to prevent costly appliance breakdowns and extend equipment lifespan.</p>
    </div>

    <div class="grid grid-cols-4">
      <div class="glass-card">
        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;"><i data-lucide="snowflake" style="color: var(--primary); width: 20px; height: 20px;"></i> Refrigerator Coils</h4>
        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.55;">
          Clean condenser coils every 6 months to prevent compressor overheating and maintain peak cooling performance.
        </p>
      </div>

      <div class="glass-card">
        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;"><i data-lucide="shirt" style="color: var(--primary); width: 20px; height: 20px;"></i> Washer Drain Filter</h4>
        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.55;">
          Clear lint debris from the front drain pump filter monthly to avoid OE standing water error codes.
        </p>
      </div>

      <div class="glass-card">
        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;"><i data-lucide="flame" style="color: var(--primary); width: 20px; height: 20px;"></i> Dryer Exhaust Vent</h4>
        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.55;">
          Inspect exterior dryer ducting annually to prevent thermal cut-off safety fuse triggers and reduce fire risks.
        </p>
      </div>

      <div class="glass-card">
        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;"><i data-lucide="printer" style="color: var(--primary); width: 20px; height: 20px;"></i> Printer Spooler Flush</h4>
        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.55;">
          Clear pending print spooler jobs and maintain static IP reservations to prevent persistent offline errors.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- 10. FAQ ACCORDION SECTION -->
<section style="padding: 5rem 0; background: var(--bg-light); border-bottom: 1px solid var(--border-light);">
  <div class="container">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 3.5rem;">
      <div style="color: var(--primary); font-weight: 700; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Help Center</div>
      <h2 style="font-size: 2.5rem; margin-bottom: 1rem;" class="text-gradient">Frequently Asked Questions</h2>
      <p style="color: var(--text-muted); font-size: 1rem;">Find quick answers to common questions about our service coverage, response times, and protection policies.</p>
    </div>

    <div class="faq-accordion">
      <div class="faq-item active">
        <div class="faq-header">
          How quickly can a technician respond to my service request?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          We offer same-day and next-day onsite appointment slots across British Columbia. For remote technical checks, our specialists connect with you within 15 minutes.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-header">
          What brands of appliances do you repair?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          We service all major kitchen and laundry brands including Samsung, LG, Whirlpool, GE, KitchenAid, Bosch, Frigidaire, Maytag, JennAir, and Kenmore.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-header">
          Do you provide post-repair service protection?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          Yes! All replacement parts and repair labor supplied by GeekSmart Appliance come backed with a 90-day comprehensive service protection policy.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-header">
          Can printer offline errors be fixed remotely?
          <i data-lucide="chevron-down" style="width: 18px; height: 18px;"></i>
        </div>
        <div class="faq-body">
          Over 90% of wireless printer offline errors, driver spooler conflicts, and network IP disconnects are resolved remotely via guided technical assistance.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 11. EMERGENCY HOTLINE BANNER CTA -->
<section style="background: linear-gradient(135deg, var(--text-main) 0%, var(--primary) 100%); color: #ffffff; padding: 4.5rem 0;">
  <div class="container text-center">
    <span class="badge badge-cyan" style="margin-bottom: 1rem;"><i data-lucide="zap" style="width: 16px; height: 16px;"></i> Urgent Technical Assistance</span>
    <h2 style="font-size: 2.35rem; font-weight: 800; margin-bottom: 1rem; color: #ffffff;">Need Urgent Appliance or Tech Support?</h2>
    <p style="font-size: 1.15rem; max-width: 680px; margin: 0 auto 2rem auto; color: rgba(255,255,255,0.85);">
      Our technical support hotline is open right now to assist you with refrigerator cooling failures, washer leaks, or printer breakdowns.
    </p>
    <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
      <a href="tel:<?php echo PHONE_RAW; ?>" class="btn btn-accent btn-lg">
        <i data-lucide="phone-call" style="width: 20px; height: 20px;"></i> Call Hotline: <?php echo PHONE_NUMBER; ?>
      </a>
      <button class="btn btn-outline-white btn-lg" data-open-modal="booking-modal">
        <i data-lucide="calendar" style="width: 20px; height: 20px;"></i> Schedule Appointment Online
      </button>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
