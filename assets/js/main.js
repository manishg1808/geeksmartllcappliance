/**
 * GeekSmart LLC Appliance - Main JavaScript & Lucide Icons Engine
 */

document.addEventListener('DOMContentLoaded', () => {
  // Initialize Lucide Icons
  if (window.lucide) {
    lucide.createIcons();
  }

  // Mobile Drawer Navigation
  const mobileToggle = document.getElementById('mobile-toggle');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const drawerOverlay = document.getElementById('drawer-overlay');
  const drawerClose = document.getElementById('drawer-close');

  function openDrawer() {
    if (mobileDrawer) mobileDrawer.classList.add('open');
    if (drawerOverlay) drawerOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    if (mobileDrawer) mobileDrawer.classList.remove('open');
    if (drawerOverlay) drawerOverlay.classList.remove('open');
    document.body.style.overflow = 'auto';
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

  const scrollTopBtn = document.getElementById('scroll-top-btn');
  if (scrollTopBtn) {
    const toggleScrollTop = () => {
      scrollTopBtn.classList.toggle('is-visible', window.scrollY > 280);
    };
    window.addEventListener('scroll', toggleScrollTop, { passive: true });
    toggleScrollTop();
    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Booking Modal Logic
  const bookingModals = document.querySelectorAll('.booking-modal');
  const modalTriggers = document.querySelectorAll('[data-open-modal]');
  const modalCloses = document.querySelectorAll('[data-close-modal]');

  modalTriggers.forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const modalId = trigger.getAttribute('data-open-modal') || 'booking-modal';
      const serviceName = trigger.getAttribute('data-service-title') || '';
      const targetModal = document.getElementById(modalId);
      if (targetModal) {
        if (serviceName) {
          const serviceSelect = targetModal.querySelector('select[name="service"]');
          if (serviceSelect) {
            for (let i = 0; i < serviceSelect.options.length; i++) {
              if (serviceSelect.options[i].value.toLowerCase().includes(serviceName.toLowerCase()) || 
                  serviceName.toLowerCase().includes(serviceSelect.options[i].value.toLowerCase())) {
                serviceSelect.selectedIndex = i;
                break;
              }
            }
          }
        }
        targetModal.classList.add('open');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  modalCloses.forEach(btn => {
    btn.addEventListener('click', () => {
      bookingModals.forEach(m => m.classList.remove('open'));
      document.body.style.overflow = 'auto';
    });
  });

  bookingModals.forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target.classList.contains('modal-backdrop')) {
        modal.classList.remove('open');
        document.body.style.overflow = 'auto';
      }
    });
  });

  // Category Filter Tabs
  const filterTabs = document.querySelectorAll('.filter-tab');
  const serviceCards = document.querySelectorAll('.service-catalog-item');

  filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      filterTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const cat = tab.getAttribute('data-category');
      serviceCards.forEach(card => {
        if (cat === 'all' || card.getAttribute('data-category') === cat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // RIGHT SIDE HERO ANIMATED SERVICE SHOWCASE CAROUSEL ("RUK RUK KE ANIMATION")
  const showcaseSlides = document.querySelectorAll('.showcase-service-slide');
  const showcaseDotsContainer = document.getElementById('showcase-dots-container');
  const showcaseCard = document.getElementById('hero-animated-showcase-card');
  let currentSlideIndex = 0;
  let showcaseInterval = null;

  if (showcaseSlides.length > 0) {
    if (showcaseDotsContainer) {
      showcaseDotsContainer.innerHTML = '';
      showcaseSlides.forEach((_, idx) => {
        const dot = document.createElement('div');
        dot.className = `showcase-dot ${idx === 0 ? 'active' : ''}`;
        dot.addEventListener('click', () => goToSlide(idx));
        showcaseDotsContainer.appendChild(dot);
      });
    }

    function goToSlide(index) {
      showcaseSlides.forEach(slide => slide.classList.remove('active'));
      const dots = document.querySelectorAll('.showcase-dot');
      dots.forEach(d => d.classList.remove('active'));

      currentSlideIndex = index;
      if (currentSlideIndex >= showcaseSlides.length) currentSlideIndex = 0;
      if (currentSlideIndex < 0) currentSlideIndex = showcaseSlides.length - 1;

      showcaseSlides[currentSlideIndex].classList.add('active');
      if (dots[currentSlideIndex]) dots[currentSlideIndex].classList.add('active');

      if (window.lucide) lucide.createIcons();
    }

    function startAutoRotation() {
      // Auto-rotation disabled per user preference
      stopAutoRotation();
    }

    function stopAutoRotation() {
      if (showcaseInterval) {
        clearInterval(showcaseInterval);
        showcaseInterval = null;
      }
    }

    if (showcaseCard) {
      showcaseCard.addEventListener('mouseenter', stopAutoRotation);
      showcaseCard.addEventListener('mouseleave', startAutoRotation);
    }

    startAutoRotation();
  }

  // Interactive Problem Finder Widget
  const finderAppliance = document.getElementById('finder-appliance');
  const finderSymptom = document.getElementById('finder-symptom');
  const resultTitle = document.getElementById('finder-result-title');
  const resultDesc = document.getElementById('finder-result-desc');

  const diagnosticDatabase = {
    'refrigerator-cooling': {
      title: 'Recommended Solution: Refrigerator Defrost Thermistor & Relay Check',
      desc: 'Cooling failures are typically caused by a faulty defrost thermistor, ice-clogged evaporator coils, or a worn compressor relay switch. Our technicians carry original OEM sensors for same-day resolution.'
    },
    'washer-drain': {
      title: 'Recommended Solution: Washer Drain Pump Unclogging & Lid Switch Check',
      desc: 'Standing water pools occur when the drain pump motor is jammed by lint debris or when the drain solenoid fails. We clear pump lines and test water level pressure switches.'
    },
    'printer-offline': {
      title: 'Recommended Solution: Wireless Printer Network & Driver Spooler Reset',
      desc: 'Printer offline status is caused by IP network address changes or corrupted print spooler drivers. We reconfigure wireless print servers remotely.'
    }
  };

  function updateFinder() {
    if (!finderAppliance || !finderSymptom || !resultTitle || !resultDesc) return;
    const key = `${finderAppliance.value}-${finderSymptom.value}`;
    const defaultData = {
      title: `Recommended Solution: ${finderAppliance.options[finderAppliance.selectedIndex].text} Inspection`,
      desc: `Our technicians inspect electronic control panels, mechanical assemblies, and power supplies to resolve ${finderSymptom.options[finderSymptom.selectedIndex].text.toLowerCase()} quickly.`
    };

    const solution = diagnosticDatabase[key] || defaultData;
    resultTitle.textContent = solution.title;
    resultDesc.textContent = solution.desc;
  }

  if (finderAppliance && finderSymptom) {
    finderAppliance.addEventListener('change', updateFinder);
    finderSymptom.addEventListener('change', updateFinder);
  }

  // Accordion FAQs Logic
  const faqHeaders = document.querySelectorAll('.faq-header');
  faqHeaders.forEach(header => {
    header.addEventListener('click', () => {
      const parentItem = header.parentElement;
      const isActive = parentItem.classList.contains('active');

      document.querySelectorAll('.faq-item').forEach(item => item.classList.remove('active'));

      if (!isActive) {
        parentItem.classList.add('active');
      }
    });
  });

  // AJAX form submissions (service pages, booking, contact, modal)
  document.querySelectorAll('form.ajax-form').forEach(form => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const submitBtn = form.querySelector('[type="submit"]');
      const originalLabel = submitBtn ? submitBtn.innerHTML : '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending...';
      }

      try {
        const res = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const data = await res.json();
        if (data && data.success) {
          if (data.redirect) {
            window.location.href = data.redirect;
            return;
          }
          alert(data.message || 'Request submitted successfully.');
          form.reset();
        } else {
          alert((data && data.message) || 'Something went wrong. Please try again or call us.');
        }
      } catch (err) {
        alert('Unable to submit right now. Please call our hotline or try again.');
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalLabel;
          if (window.lucide) lucide.createIcons();
        }
      }
    });
  });
});
