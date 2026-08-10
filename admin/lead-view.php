<?php
/**
 * Admin Lead detail view + print-ready document.
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

$id = (int) ($_GET['id'] ?? 0);
if ($id < 1) {
    header('Location: ' . SITE_URL . '/admin/leads.php');
    exit;
}

$lead = null;
try {
    $stmt = db()->prepare('SELECT * FROM form_submissions WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $lead = $stmt->fetch();
} catch (Throwable $e) {
    error_log('lead-view query failed: ' . $e->getMessage());
}

if (!$lead) {
    header('Location: ' . SITE_URL . '/admin/leads.php');
    exit;
}

// Opening View marks lead as seen → NEW star drops on list
if ((int) ($lead['is_viewed'] ?? 0) === 0) {
    try {
        $mark = db()->prepare('UPDATE form_submissions SET is_viewed = 1 WHERE id = :id');
        $mark->execute([':id' => $id]);
        $lead['is_viewed'] = 1;
    } catch (Throwable $e) {
        error_log('mark lead viewed failed: ' . $e->getMessage());
    }
}

$fromPage   = max(1, (int) ($_GET['from_page'] ?? 1));
$fromPer    = max(5, min(100, (int) ($_GET['per_page'] ?? 11)));
$fromSearch = trim($_GET['q'] ?? '');
$backUrl    = SITE_URL . '/admin/leads.php?page=' . $fromPage . '&per_page=' . $fromPer;
if ($fromSearch !== '') {
    $backUrl .= '&q=' . urlencode($fromSearch);
}
$source     = admin_form_label($lead['form_type'] ?? '');
// No NEW star on detail after view

// Display helpers
function lead_display(?string $value, string $empty = '—'): string
{
    $value = trim((string) $value);
    if ($value === '' || $value === 'Not Provided' || $value === 'No additional details provided.') {
        return $empty;
    }
    return $value;
}

function lead_email_display(?string $email): string
{
    $email = trim((string) $email);
    if ($email === '' || strpos($email, 'not-provided@') !== false) {
        return '—';
    }
    return $email;
}

$phoneDisplay = lead_display($lead['phone'] ?? null);
$emailDisplay = lead_email_display($lead['email'] ?? null);
$msgDisplay   = lead_display($lead['message'] ?? null);
$prefDate     = lead_display($lead['preferred_date'] ?? null);
$prefTime     = lead_display($lead['preferred_time'] ?? null);
$printerModel = lead_display($lead['printer_model'] ?? null);
$issueType    = lead_display($lead['issue_type'] ?? null);

$showBooking = ($prefDate !== '—' || $prefTime !== '—');
$showPrinter = ($printerModel !== '—' || $issueType !== '—');

$pageTitle = 'Lead ' . ($lead['ticket_id'] ?? '');
$activeNav = 'leads';
include __DIR__ . '/includes/header.php';
?>

<div class="lead-view-toolbar no-print">
  <a class="btn-back" href="<?php echo htmlspecialchars($backUrl); ?>">&larr; Back to Leads</a>
  <div class="toolbar-actions">
    <button type="button" class="btn-print" id="btn-print-lead" title="Print this lead">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <polyline points="6 9 6 2 18 2 18 9"/>
        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
        <rect x="6" y="14" width="12" height="8"/>
      </svg>
      Print
    </button>
  </div>
</div>

<article class="lead-view-card" id="lead-print-area">
  <header class="lead-view-header">
    <div>
      <p class="lead-view-kicker"><?php echo htmlspecialchars(SITE_NAME); ?> · Lead Report</p>
      <h2 class="lead-view-title">
        <?php echo htmlspecialchars($lead['ticket_id'] ?? 'Lead'); ?>
      </h2>
      <p class="lead-view-sub">Received <?php echo htmlspecialchars($lead['created_at'] ?? '—'); ?></p>
    </div>
    <div class="lead-view-source">
      <span class="source-badge"><?php echo htmlspecialchars($source); ?></span>
    </div>
  </header>

  <div class="lead-view-grid">
    <div class="lead-field">
      <span class="lead-field-label">Customer Name</span>
      <span class="lead-field-value"><?php echo htmlspecialchars(lead_display($lead['name'] ?? null)); ?></span>
    </div>
    <div class="lead-field">
      <span class="lead-field-label">Phone</span>
      <span class="lead-field-value">
        <?php if ($phoneDisplay !== '—'): ?>
          <a href="tel:<?php echo htmlspecialchars(preg_replace('/[^\d+]/', '', $phoneDisplay)); ?>"><?php echo htmlspecialchars($phoneDisplay); ?></a>
        <?php else: ?>
          —
        <?php endif; ?>
      </span>
    </div>
    <div class="lead-field">
      <span class="lead-field-label">Email</span>
      <span class="lead-field-value">
        <?php if ($emailDisplay !== '—'): ?>
          <a href="mailto:<?php echo htmlspecialchars($emailDisplay); ?>"><?php echo htmlspecialchars($emailDisplay); ?></a>
        <?php else: ?>
          —
        <?php endif; ?>
      </span>
    </div>
    <div class="lead-field">
      <span class="lead-field-label">Service</span>
      <span class="lead-field-value"><?php echo htmlspecialchars(lead_display($lead['service'] ?? null)); ?></span>
    </div>
    <div class="lead-field">
      <span class="lead-field-label">Source Form / Page</span>
      <span class="lead-field-value"><?php echo htmlspecialchars($source); ?></span>
    </div>
    <div class="lead-field">
      <span class="lead-field-label">IP Address</span>
      <span class="lead-field-value"><?php echo htmlspecialchars(lead_display($lead['ip_address'] ?? null)); ?></span>
    </div>

    <?php if ($showBooking): ?>
      <div class="lead-field">
        <span class="lead-field-label">Preferred Date</span>
        <span class="lead-field-value"><?php echo htmlspecialchars($prefDate); ?></span>
      </div>
      <div class="lead-field">
        <span class="lead-field-label">Preferred Time</span>
        <span class="lead-field-value"><?php echo htmlspecialchars($prefTime); ?></span>
      </div>
    <?php endif; ?>

    <?php if ($showPrinter): ?>
      <div class="lead-field">
        <span class="lead-field-label">Printer Model</span>
        <span class="lead-field-value"><?php echo htmlspecialchars($printerModel); ?></span>
      </div>
      <div class="lead-field">
        <span class="lead-field-label">Issue Type</span>
        <span class="lead-field-value"><?php echo htmlspecialchars($issueType); ?></span>
      </div>
    <?php endif; ?>
  </div>

  <div class="lead-message-block">
    <span class="lead-field-label">Message / Notes</span>
    <p class="lead-message-text"><?php echo nl2br(htmlspecialchars($msgDisplay)); ?></p>
  </div>

  <footer class="lead-view-footer">
    <p>Printed from <?php echo htmlspecialchars(SITE_NAME); ?> Admin · <?php echo date('Y-m-d H:i'); ?></p>
  </footer>
</article>

<script>
(function () {
  var btn = document.getElementById('btn-print-lead');
  if (!btn) return;
  btn.addEventListener('click', function () {
    window.print();
  });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
