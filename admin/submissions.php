<?php
/**
 * Admin submissions list — filtered by form_type.
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

$formTypes = admin_form_types();
$type      = $_GET['type'] ?? '';

if ($type === '' || !array_key_exists($type, $formTypes)) {
    header('Location: ' . SITE_URL . '/admin/leads.php');
    exit;
}

$label    = $formTypes[$type];
$perPage  = 20;
$page     = max(1, (int) ($_GET['page'] ?? 1));
$offset   = ($page - 1) * $perPage;
$total    = 0;
$rows     = [];

// Extra columns by form type
$showBooking = in_array($type, ['booking_page'], true);
$showPrinter = in_array($type, ['printer_quick_request'], true);

try {
    $countStmt = db()->prepare('SELECT COUNT(*) FROM form_submissions WHERE form_type = :type');
    $countStmt->execute([':type' => $type]);
    $total = (int) $countStmt->fetchColumn();

    $sql = 'SELECT * FROM form_submissions
            WHERE form_type = :type
            ORDER BY created_at DESC
            LIMIT :limit OFFSET :offset';
    $stmt = db()->prepare($sql);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log('Admin submissions query failed: ' . $e->getMessage());
}

$totalPages = max(1, (int) ceil($total / $perPage));
$pageTitle  = $label;
$activeNav  = $type;
include __DIR__ . '/includes/header.php';

// Column count for empty row
$colspan = 7 + ($showBooking ? 2 : 0) + ($showPrinter ? 2 : 0);
?>

<section class="panel">
  <div class="panel-head">
    <h2><?php echo htmlspecialchars($label); ?></h2>
    <span class="badge-count"><?php echo number_format($total); ?> record<?php echo $total === 1 ? '' : 's'; ?></span>
  </div>

  <div class="table-wrap">
    <table class="data-table">
      <thead>
        <tr>
          <th>Ticket</th>
          <th>Date</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Service</th>
          <?php if ($showBooking): ?>
            <th>Pref. Date</th>
            <th>Pref. Time</th>
          <?php endif; ?>
          <?php if ($showPrinter): ?>
            <th>Printer Model</th>
            <th>Issue Type</th>
          <?php endif; ?>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($rows)): ?>
          <tr>
            <td colspan="<?php echo $colspan; ?>" class="empty-row">No submissions for this form yet.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($rows as $row): ?>
            <tr>
              <td><code><?php echo htmlspecialchars($row['ticket_id']); ?></code></td>
              <td><?php echo htmlspecialchars($row['created_at'] ?? '—'); ?></td>
              <td><?php echo htmlspecialchars($row['name'] ?? '—'); ?></td>
              <td>
                <?php if (!empty($row['phone']) && $row['phone'] !== 'Not Provided'): ?>
                  <a href="tel:<?php echo htmlspecialchars(preg_replace('/[^\d+]/', '', $row['phone'])); ?>">
                    <?php echo htmlspecialchars($row['phone']); ?>
                  </a>
                <?php else: ?>
                  —
                <?php endif; ?>
              </td>
              <td>
                <?php
                $email = $row['email'] ?? '';
                if ($email !== '' && strpos($email, 'not-provided@') === false):
                ?>
                  <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                <?php else: ?>
                  —
                <?php endif; ?>
              </td>
              <td><?php echo htmlspecialchars($row['service'] ?? '—'); ?></td>
              <?php if ($showBooking): ?>
                <td><?php echo htmlspecialchars($row['preferred_date'] ?? '—'); ?></td>
                <td><?php echo htmlspecialchars($row['preferred_time'] ?? '—'); ?></td>
              <?php endif; ?>
              <?php if ($showPrinter): ?>
                <td><?php echo htmlspecialchars($row['printer_model'] ?? '—'); ?></td>
                <td><?php echo htmlspecialchars($row['issue_type'] ?? '—'); ?></td>
              <?php endif; ?>
              <td class="msg-cell" title="<?php echo htmlspecialchars($row['message'] ?? ''); ?>">
                <?php
                $msg = $row['message'] ?? '';
                if ($msg === '' || $msg === 'No additional details provided.') {
                    echo '—';
                } else {
                    echo htmlspecialchars(mb_strlen($msg) > 80 ? mb_substr($msg, 0, 80) . '…' : $msg);
                }
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <?php if ($totalPages > 1): ?>
    <nav class="pagination" aria-label="Pagination">
      <?php if ($page > 1): ?>
        <a class="page-btn" href="?type=<?php echo urlencode($type); ?>&amp;page=<?php echo $page - 1; ?>">&larr; Prev</a>
      <?php endif; ?>

      <span class="page-info">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>

      <?php if ($page < $totalPages): ?>
        <a class="page-btn" href="?type=<?php echo urlencode($type); ?>&amp;page=<?php echo $page + 1; ?>">Next &rarr;</a>
      <?php endif; ?>
    </nav>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
