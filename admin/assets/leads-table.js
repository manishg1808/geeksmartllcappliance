/**
 * Leads table toolbar: view toggle, columns, refresh, export, dropdowns.
 */
(function () {
  var STORAGE_VIEW = 'gs_admin_leads_view';
  var STORAGE_COLS = 'gs_admin_leads_columns';

  var panel = document.getElementById('leads-panel');
  if (!panel) return;

  var tableView = document.getElementById('leads-table-view');
  var gridView = document.getElementById('leads-grid-view');
  var btnTable = document.getElementById('tb-view-table');
  var btnGrid = document.getElementById('tb-view-grid');
  var btnRefresh = document.getElementById('tb-refresh');
  var searchInput = document.getElementById('leads-search-input');
  var searchForm = document.getElementById('leads-search-form');
  var dataTable = document.getElementById('leads-data-table');

  function setView(mode) {
    var isGrid = mode === 'grid';
    if (tableView) tableView.classList.toggle('is-hidden', isGrid);
    if (gridView) gridView.classList.toggle('is-hidden', !isGrid);
    if (btnTable) btnTable.classList.toggle('is-active', !isGrid);
    if (btnGrid) btnGrid.classList.toggle('is-active', isGrid);
    try { localStorage.setItem(STORAGE_VIEW, mode); } catch (e) {}
  }

  if (btnTable) btnTable.addEventListener('click', function () { setView('table'); });
  if (btnGrid) btnGrid.addEventListener('click', function () { setView('grid'); });

  try {
    var savedView = localStorage.getItem(STORAGE_VIEW);
    if (savedView === 'grid') setView('grid');
  } catch (e) {}

  if (btnRefresh) {
    btnRefresh.addEventListener('click', function () {
      window.location.reload();
    });
  }

  // Column visibility
  var colToggles = panel.querySelectorAll('.col-toggle');
  var defaultCols = {};
  colToggles.forEach(function (cb) {
    defaultCols[cb.getAttribute('data-col')] = true;
  });

  function applyColumn(colClass, visible) {
    panel.querySelectorAll('.' + colClass).forEach(function (el) {
      el.classList.toggle('col-hidden', !visible);
    });
  }

  function saveColumns() {
    var state = {};
    colToggles.forEach(function (cb) {
      state[cb.getAttribute('data-col')] = cb.checked;
    });
    try { localStorage.setItem(STORAGE_COLS, JSON.stringify(state)); } catch (e) {}
  }

  function loadColumns() {
    try {
      var raw = localStorage.getItem(STORAGE_COLS);
      if (!raw) return;
      var state = JSON.parse(raw);
      colToggles.forEach(function (cb) {
        var col = cb.getAttribute('data-col');
        if (state.hasOwnProperty(col)) {
          cb.checked = !!state[col];
          applyColumn(col, cb.checked);
        }
      });
    } catch (e) {}
  }

  colToggles.forEach(function (cb) {
    cb.addEventListener('change', function () {
      applyColumn(cb.getAttribute('data-col'), cb.checked);
      saveColumns();
    });
  });

  loadColumns();

  var resetCols = document.getElementById('tb-reset-columns');
  if (resetCols) {
    resetCols.addEventListener('click', function () {
      colToggles.forEach(function (cb) {
        cb.checked = true;
        applyColumn(cb.getAttribute('data-col'), true);
      });
      try { localStorage.removeItem(STORAGE_COLS); } catch (e) {}
      closeAllDropdowns();
    });
  }

  // Dropdowns
  function setupDropdown(btnId, menuId) {
    var btn = document.getElementById(btnId);
    var menu = document.getElementById(menuId);
    if (!btn || !menu) return;

    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      var open = !menu.hidden;
      closeAllDropdowns();
      if (!open) {
        menu.hidden = false;
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  }

  function closeAllDropdowns() {
    panel.querySelectorAll('.tb-dropdown-menu').forEach(function (m) { m.hidden = true; });
    panel.querySelectorAll('.tb-dropdown .tb-btn[id$="-btn"]').forEach(function (b) {
      b.setAttribute('aria-expanded', 'false');
    });
  }

  setupDropdown('tb-columns-btn', 'tb-columns-menu');
  setupDropdown('tb-more-btn', 'tb-more-menu');

  document.addEventListener('click', closeAllDropdowns);

  // Export CSV
  var exportBtn = document.getElementById('tb-export-csv');
  if (exportBtn && dataTable) {
    exportBtn.addEventListener('click', function () {
      var rows = [];
      var headers = [];
      dataTable.querySelectorAll('thead th').forEach(function (th) {
        if (!th.classList.contains('col-hidden') && !th.classList.contains('col-action')) {
          headers.push(th.textContent.trim());
        }
      });
      rows.push(headers);

      dataTable.querySelectorAll('tbody tr.lead-row').forEach(function (tr) {
        var cells = [];
        tr.querySelectorAll('td').forEach(function (td) {
          if (td.classList.contains('col-action') || td.classList.contains('col-hidden')) return;
          cells.push('"' + td.textContent.replace(/\s+/g, ' ').trim().replace(/"/g, '""') + '"');
        });
        if (cells.length) rows.push(cells);
      });

      var csv = rows.map(function (r) { return r.join(','); }).join('\n');
      var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
      var a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = 'leads-export-' + new Date().toISOString().slice(0, 10) + '.csv';
      a.click();
      closeAllDropdowns();
    });
  }

  // Enter key in search
  if (searchInput && searchForm) {
    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') searchForm.submit();
    });
  }

  // Lead view popup
  var leadModal = document.getElementById('lead-view-modal');
  var leadModalBody = document.getElementById('lead-modal-body');
  var leadApiUrl = window.GS_LEAD_API || '';

  function escHtml(str) {
    return String(str || '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function hasLeadValue(value) {
    return value && value !== '—';
  }

  function fieldHtml(label, value, href) {
    if (!hasLeadValue(value)) return '';
    var val = escHtml(value);
    var inner = val;
    if (href) {
      inner = '<a href="' + escHtml(href) + '">' + val + '</a>';
    }
    return '<div class="lead-field"><span class="lead-field-label">' + escHtml(label) +
      '</span><span class="lead-field-value">' + inner + '</span></div>';
  }

  function renderLeadModal(lead) {
    var fields = '';
    fields += fieldHtml('Customer Name', lead.name);
    fields += fieldHtml('Phone', lead.phone, lead.phone_href ? 'tel:' + lead.phone_href : '');
    fields += fieldHtml('Email', lead.email, lead.email !== '—' ? 'mailto:' + lead.email : '');
    fields += fieldHtml('Service', lead.service);
    if (lead.show_booking) {
      fields += fieldHtml('Preferred Date', lead.preferred_date);
      fields += fieldHtml('Preferred Time', lead.preferred_time);
    }
    if (lead.show_printer) {
      fields += fieldHtml('Printer Model', lead.printer_model);
      fields += fieldHtml('Issue Type', lead.issue_type);
    }

    var html = '<article class="lead-view-card lead-view-card-modal">';
    html += '<header class="lead-view-header lead-view-header-modal">';
    html += '<p class="lead-view-kicker">Lead Details</p>';
    html += '<h2 class="lead-view-title" id="lead-modal-title">' + escHtml(lead.ticket_id) + '</h2>';
    html += '<p class="lead-view-sub">Received ' + escHtml(lead.created_at) + '</p>';
    if (hasLeadValue(lead.source)) {
      html += '<span class="source-badge source-badge-modal">' + escHtml(lead.source) + '</span>';
    }
    html += '</header>';

    if (fields) {
      html += '<div class="lead-view-grid lead-view-grid-modal">' + fields + '</div>';
    }

    if (hasLeadValue(lead.message)) {
      html += '<div class="lead-message-block lead-message-block-modal">';
      html += '<span class="lead-field-label">Message / Notes</span>';
      html += '<p class="lead-message-text">' + escHtml(lead.message).replace(/\n/g, '<br>') + '</p>';
      html += '</div>';
    }

    html += '</article>';
    return html;
  }

  function markLeadRowViewed(leadId) {
    panel.querySelectorAll('[data-id="' + leadId + '"]').forEach(function (row) {
      row.classList.remove('is-new-lead');
      row.classList.add('is-viewed-lead');
      row.querySelectorAll('.new-lead-badge').forEach(function (badge) {
        badge.remove();
      });
    });
    panel.querySelectorAll('.btn-view-lead[data-lead-id="' + leadId + '"]').forEach(function (btn) {
      var card = btn.closest('.lead-card');
      if (card) {
        card.classList.remove('is-new-lead');
        card.classList.add('is-viewed-lead');
        card.querySelectorAll('.new-lead-badge').forEach(function (badge) {
          badge.remove();
        });
      }
    });
  }

  function openLeadModal() {
    if (!leadModal) return;
    leadModal.hidden = false;
    leadModal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('admin-modal-open');
  }

  function closeLeadModal() {
    if (!leadModal) return;
    leadModal.hidden = true;
    leadModal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('admin-modal-open');
  }

  function openLeadView(leadId) {
    if (!leadModalBody || !leadApiUrl) return;
    leadModalBody.innerHTML = '<p class="admin-modal-loading">Loading lead…</p>';
    openLeadModal();

    fetch(leadApiUrl + '?id=' + encodeURIComponent(leadId), {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (!data || !data.success || !data.lead) {
          leadModalBody.innerHTML = '<p class="admin-modal-error">' + escHtml((data && data.message) || 'Unable to load lead.') + '</p>';
          return;
        }
        leadModalBody.innerHTML = renderLeadModal(data.lead);
        markLeadRowViewed(leadId);
      })
      .catch(function () {
        leadModalBody.innerHTML = '<p class="admin-modal-error">Unable to load lead. Please try again.</p>';
      });
  }

  panel.addEventListener('click', function (e) {
    var viewBtn = e.target.closest('.btn-view-lead');
    if (viewBtn) {
      e.preventDefault();
      var leadId = viewBtn.getAttribute('data-lead-id');
      if (leadId) openLeadView(leadId);
    }
  });

  if (leadModal) {
    leadModal.addEventListener('click', function (e) {
      if (e.target.closest('[data-close-lead-modal]')) {
        e.preventDefault();
        closeLeadModal();
      }
    });
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && leadModal && !leadModal.hidden) {
      closeLeadModal();
    }
  });
})();
