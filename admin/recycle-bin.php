<?php
/**
 * Admin Recycle Bin — deleted leads (recycled_leads table).
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

$allowedPer = [5, 10, 11, 25, 50];
$perPage    = (int) ($_GET['per_page'] ?? 11);
if (!in_array($perPage, $allowedPer, true)) {
    $perPage = 11;
}

$page   = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$total  = 0;
$rows   = [];

try {
    $total = (int) db()->query('SELECT COUNT(*) FROM recycled_leads')->fetchColumn();

    $stmt = db()->prepare(
        'SELECT * FROM recycled_leads
         ORDER BY deleted_at DESC, id DESC
         LIMIT :limit OFFSET :offset'
    );
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log('Admin recycle-bin query failed: ' . $e->getMessage());
}

$totalPages = max(1, (int) ceil($total / max(1, $perPage)));
if ($page > $totalPages) {
    $page   = $totalPages;
    $offset = ($page - 1) * $perPage;
}

function recycle_page_window(int $current, int $totalPages, int $radius = 2): array
{
    $start = max(1, $current - $radius);
    $end   = min($totalPages, $current + $radius);
    $pages = [];
    for ($i = $start; $i <= $end; $i++) {
        $pages[] = $i;
    }
    return $pages;
}

function recycle_page_url(int $page, int $perPage): string
{
    return '?page=' . $page . '&per_page=' . $perPage;
}

$pageWindow = recycle_page_window($page, $totalPages);
$fromRow    = $total === 0 ? 0 : $offset + 1;
$toRow      = min($offset + $perPage, $total);

$pageTitle = 'Recycle Bin';
$activeNav = 'recycle-bin';
include __DIR__ . '/includes/header.php';
?>

<section class="panel">
  <div class="panel-head panel-head-leads">
    <div class="panel-head-left">
      <h2>Recycle Bin</h2>
      <span class="badge-count"><?php echo number_format($total); ?> deleted</span>
    </div>
    <form class="rows-per-page-form" method="get" action="">
      <label for="per_page">Rows</label>
      <select name="per_page" id="per_page" onchange="this.form.submit()">
        <?php foreach ($allowedPer as $opt): ?>
          <option value="<?php echo $opt; ?>"<?php echo $perPage === $opt ? ' selected' : ''; ?>>
            <?php echo $opt; ?>
          </option>
        <?php endforeach; ?>
      </select>
      <input type="hidden" name="page" value="1">
    </form>
  </div>

  <div class="table-wrap">
    <table class="data-table leads-table">
      <thead>
        <tr>
          <th>Lead Info</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Service</th>
          <th>Deleted By</th>
          <th class="th-action">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($rows)): ?>
          <tr>
            <td colspan="7" class="empty-row">Recycle bin is empty. Deleted leads will appear here.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($rows as $row): ?>
            <?php
            $rowId       = (int) ($row['id'] ?? 0);
            $sourceLabel = admin_form_label($row['form_type'] ?? '');
            ?>
            <tr class="lead-row" data-id="<?php echo $rowId; ?>">
              <td class="lead-meta-cell">
                <div class="lead-meta">
                  <code class="lead-meta-ticket"><?php echo htmlspecialchars($row['ticket_id'] ?? '—'); ?></code>
                  <span class="lead-meta-date"><?php echo htmlspecialchars($row['deleted_at'] ?? '—'); ?></span>
                  <span class="lead-meta-source"><?php echo htmlspecialchars($sourceLabel); ?></span>
                </div>
              </td>
              <td><?php echo htmlspecialchars($row['name'] ?? '—'); ?></td>
              <td><?php echo htmlspecialchars($row['phone'] ?? '—'); ?></td>
              <td><?php echo htmlspecialchars($row['email'] ?? '—'); ?></td>
              <td><?php echo htmlspecialchars($row['service'] ?? '—'); ?></td>
              <td><?php echo htmlspecialchars($row['deleted_by'] ?? '—'); ?></td>
              <td class="action-cell">
                <div class="action-btns">
                  <form class="delete-lead-form" method="post" action="<?php echo SITE_URL; ?>/admin/restore-lead.php"
                        onsubmit="return confirm('Restore this lead to Leads list?');">
                    <input type="hidden" name="id" value="<?php echo $rowId; ?>">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <input type="hidden" name="per_page" value="<?php echo $perPage; ?>">
                    <button type="submit" class="btn-action btn-view" title="Restore lead">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <polyline points="1 4 1 10 7 10"/>
                        <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/>
                      </svg>
                      <span>Restore</span>
                    </button>
                  </form>
                  <form class="delete-lead-form" method="post" action="<?php echo SITE_URL; ?>/admin/permanent-delete-lead.php"
                        onsubmit="return confirm('Permanently delete this lead? This cannot be undone.');">
                    <input type="hidden" name="id" value="<?php echo $rowId; ?>">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <input type="hidden" name="per_page" value="<?php echo $perPage; ?>">
                    <button type="submit" class="btn-action btn-remove" title="Delete forever">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                        <path d="M10 11v6M14 11v6"/>
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                      </svg>
                      <span>Delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <?php if ($total > 0): ?>
    <nav class="pagination pagination-nav" aria-label="Recycle bin pagination">
      <span class="page-info page-range">
        Showing <?php echo $fromRow; ?>–<?php echo $toRow; ?> of <?php echo number_format($total); ?>
      </span>

      <div class="pagination-pages">
        <?php if ($page > 1): ?>
          <a class="page-btn" href="<?php echo recycle_page_url($page - 1, $perPage); ?>">&larr; Prev</a>
        <?php else: ?>
          <span class="page-btn is-disabled">&larr; Prev</span>
        <?php endif; ?>

        <?php foreach ($pageWindow as $p): ?>
          <?php if ($p === $page): ?>
            <span class="page-num is-current" aria-current="page"><?php echo $p; ?></span>
          <?php else: ?>
            <a class="page-num" href="<?php echo recycle_page_url($p, $perPage); ?>"><?php echo $p; ?></a>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($page < $totalPages): ?>
          <a class="page-btn" href="<?php echo recycle_page_url($page + 1, $perPage); ?>">Next &rarr;</a>
        <?php else: ?>
          <span class="page-btn is-disabled">Next &rarr;</span>
        <?php endif; ?>
      </div>

      <span class="page-info">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>
    </nav>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
