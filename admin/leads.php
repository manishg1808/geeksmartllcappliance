<?php
/**
 * Admin Leads — toolbar (search, grid, refresh, columns, more) + viewed leads last.
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

$allowedPer = [5, 10, 11, 25, 50];
$perPage    = (int) ($_GET['per_page'] ?? 11);
if (!in_array($perPage, $allowedPer, true)) {
    $perPage = 11;
}

$page   = max(1, (int) ($_GET['page'] ?? 1));
$search = trim($_GET['q'] ?? '');
$offset = ($page - 1) * $perPage;
$total  = 0;
$rows   = [];

$whereSql  = '';
$bindSearch = [];
if ($search !== '') {
    $whereSql = ' WHERE (
        ticket_id LIKE :q OR name LIKE :q OR phone LIKE :q OR email LIKE :q
        OR service LIKE :q OR message LIKE :q OR form_type LIKE :q
    )';
    $bindSearch[':q'] = '%' . $search . '%';
}

// Unviewed first, viewed move to bottom; newest within each group
$orderSql = ' ORDER BY is_viewed ASC, created_at DESC, id DESC';

try {
    $countStmt = db()->prepare('SELECT COUNT(*) FROM form_submissions' . $whereSql);
    $countStmt->execute($bindSearch);
    $total = (int) $countStmt->fetchColumn();

    $stmt = db()->prepare(
        'SELECT * FROM form_submissions' . $whereSql . $orderSql . ' LIMIT :limit OFFSET :offset'
    );
    foreach ($bindSearch as $k => $v) {
        $stmt->bindValue($k, $v, PDO::PARAM_STR);
    }
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log('Admin leads query failed: ' . $e->getMessage());
}

$totalPages = max(1, (int) ceil($total / max(1, $perPage)));
if ($page > $totalPages) {
    $page   = $totalPages;
    $offset = ($page - 1) * $perPage;
    if ($total > 0) {
        try {
            $stmt = db()->prepare(
                'SELECT * FROM form_submissions' . $whereSql . $orderSql . ' LIMIT :limit OFFSET :offset'
            );
            foreach ($bindSearch as $k => $v) {
                $stmt->bindValue($k, $v, PDO::PARAM_STR);
            }
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();
        } catch (Throwable $e) {
            // ignore
        }
    }
}

function leads_page_window(int $current, int $totalPages, int $radius = 2): array
{
    // Show every page number when count is small (1, 2, 3, 4…)
    if ($totalPages <= 20) {
        $pages = [];
        for ($i = 1; $i <= $totalPages; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }

    $start = max(1, $current - $radius);
    $end   = min($totalPages, $current + $radius);
    $pages = [];
    for ($i = $start; $i <= $end; $i++) {
        $pages[] = $i;
    }
    return $pages;
}

/** Compact ticket label e.g. GS-1786385700-212 → GS-212 */
function leads_ticket_label(string $ticket): string
{
    $ticket = trim($ticket);
    if ($ticket === '') {
        return '—';
    }
    $pos = strrpos($ticket, '-');
    if ($pos !== false && $pos < strlen($ticket) - 1) {
        return 'GS-' . substr($ticket, $pos + 1);
    }
    return $ticket;
}

function leads_page_url(int $page, int $perPage, string $search = ''): string
{
    $url = '?page=' . $page . '&per_page=' . $perPage;
    if ($search !== '') {
        $url .= '&q=' . urlencode($search);
    }
    return $url;
}

function leads_render_message(?string $msg): string
{
    $msg = $msg ?? '';
    if ($msg === '' || $msg === 'No additional details provided.') {
        return '—';
    }
    return htmlspecialchars(mb_strlen($msg) > 80 ? mb_substr($msg, 0, 80) . '…' : $msg);
}

$pageWindow = leads_page_window($page, $totalPages);
$fromRow    = $total === 0 ? 0 : $offset + 1;
$toRow      = min($offset + $perPage, $total);
$baseQuery  = leads_page_url(1, $perPage, $search);

$pageTitle = 'Leads';
$activeNav = 'leads';
include __DIR__ . '/includes/header.php';
?>

<section class="panel leads-panel" id="leads-panel">
  <div class="panel-head panel-head-leads">
    <div class="panel-head-left">
      <h2>All Leads</h2>
      <span class="badge-count"><?php echo number_format($total); ?> lead<?php echo $total === 1 ? '' : 's'; ?></span>
    </div>
    <form class="rows-per-page-form" method="get" action="">
      <?php if ($search !== ''): ?>
        <input type="hidden" name="q" value="<?php echo htmlspecialchars($search); ?>">
      <?php endif; ?>
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

  <div class="leads-toolbar">
    <form class="leads-search-form" method="get" action="" id="leads-search-form">
      <div class="search-input-wrap">
        <svg class="search-icon" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
        </svg>
        <input type="search" name="q" id="leads-search-input" class="leads-search-input"
               placeholder="Search ticket, name, phone, email, service…"
               value="<?php echo htmlspecialchars($search); ?>" autocomplete="off">
        <?php if ($search !== ''): ?>
          <a href="<?php echo leads_page_url(1, $perPage, ''); ?>" class="search-clear" title="Clear search">&times;</a>
        <?php endif; ?>
      </div>
      <input type="hidden" name="per_page" value="<?php echo $perPage; ?>">
      <input type="hidden" name="page" value="1">
      <button type="submit" class="tb-btn tb-btn-primary" title="Search">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <span>Search</span>
      </button>
    </form>

    <div class="toolbar-actions">
      <div class="tb-view-toggle" role="group" aria-label="View mode">
        <button type="button" class="tb-btn tb-view-btn is-active" id="tb-view-table" title="Table view">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </button>
        <button type="button" class="tb-btn tb-view-btn" id="tb-view-grid" title="Grid view">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
        </button>
      </div>

      <button type="button" class="tb-btn" id="tb-refresh" title="Refresh">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
        <span>Refresh</span>
      </button>

      <div class="tb-dropdown" id="tb-columns-wrap">
        <button type="button" class="tb-btn" id="tb-columns-btn" aria-expanded="false">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="18"/><rect x="14" y="3" width="7" height="18"/></svg>
          <span>Columns</span>
        </button>
        <div class="tb-dropdown-menu" id="tb-columns-menu" hidden>
          <p class="tb-dropdown-title">Show columns</p>
          <label><input type="checkbox" class="col-toggle" data-col="col-info" checked> Lead Info</label>
          <label><input type="checkbox" class="col-toggle" data-col="col-name" checked> Name</label>
          <label><input type="checkbox" class="col-toggle" data-col="col-phone" checked> Phone</label>
          <label><input type="checkbox" class="col-toggle" data-col="col-email" checked> Email</label>
          <label><input type="checkbox" class="col-toggle" data-col="col-service" checked> Service</label>
          <label><input type="checkbox" class="col-toggle" data-col="col-message" checked> Message</label>
        </div>
      </div>

      <div class="tb-dropdown" id="tb-more-wrap">
        <button type="button" class="tb-btn" id="tb-more-btn" aria-expanded="false">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg>
          <span>More</span>
        </button>
        <div class="tb-dropdown-menu tb-dropdown-menu-right" id="tb-more-menu" hidden>
          <button type="button" class="tb-menu-item" id="tb-export-csv">Export CSV (this page)</button>
          <button type="button" class="tb-menu-item" id="tb-reset-columns">Reset columns</button>
          <a class="tb-menu-item" href="<?php echo SITE_URL; ?>/admin/recycle-bin.php">Open Recycle Bin</a>
          <?php if ($search !== ''): ?>
            <a class="tb-menu-item" href="<?php echo leads_page_url(1, $perPage, ''); ?>">Clear search</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php if ($search !== ''): ?>
    <p class="search-result-hint">Results for <strong><?php echo htmlspecialchars($search); ?></strong></p>
  <?php endif; ?>

  <div class="leads-table-view" id="leads-table-view">
    <div class="table-wrap">
      <table class="data-table leads-table" id="leads-data-table">
        <thead>
          <tr>
            <th class="col-info">Lead Info</th>
            <th class="col-name">Name</th>
            <th class="col-phone">Phone</th>
            <th class="col-email">Email</th>
            <th class="col-service">Service</th>
            <th class="col-message">Message</th>
            <th class="col-action th-action">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($rows)): ?>
            <tr>
              <td colspan="7" class="empty-row">
                <?php echo $search !== '' ? 'No leads match your search.' : 'No leads yet. Form data will appear here after visitors submit a form.'; ?>
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($rows as $row): ?>
              <?php
              $formType    = $row['form_type'] ?? '';
              $sourceLabel = admin_form_label($formType);
              $isNew       = (int) ($row['is_viewed'] ?? 0) === 0;
              $rowId       = (int) ($row['id'] ?? 0);
              $viewUrl     = SITE_URL . '/admin/lead-view.php?id=' . $rowId . '&from_page=' . $page . '&per_page=' . $perPage;
              if ($search !== '') {
                  $viewUrl .= '&q=' . urlencode($search);
              }
              ?>
              <tr class="lead-row<?php echo $isNew ? ' is-new-lead' : ' is-viewed-lead'; ?>"
                  data-id="<?php echo $rowId; ?>"
                  data-search="<?php echo htmlspecialchars(strtolower(implode(' ', [
                      $row['ticket_id'] ?? '', $row['name'] ?? '', $row['phone'] ?? '',
                      $row['email'] ?? '', $row['service'] ?? '', $sourceLabel, $row['message'] ?? ''
                  ]))); ?>">
                <td class="lead-meta-cell col-info">
                  <div class="lead-meta">
                    <div class="lead-meta-top">
                      <code class="lead-meta-ticket" title="<?php echo htmlspecialchars($row['ticket_id']); ?>">
                        <?php echo htmlspecialchars(leads_ticket_label($row['ticket_id'])); ?>
                      </code>
                      <?php if ($isNew): ?>
                        <span class="new-lead-badge" title="New lead">
                          <svg class="star-icon" viewBox="0 0 24 24" width="10" height="10" aria-hidden="true">
                            <path fill="currentColor" d="M12 2l2.9 6.3 6.9.9-5.1 4.7 1.4 6.8L12 17.8 5.9 20.7l1.4-6.8L2.2 9.2l6.9-.9L12 2z"/>
                          </svg>
                          NEW
                        </span>
                      <?php endif; ?>
                    </div>
                    <span class="lead-meta-date"><?php echo htmlspecialchars($row['created_at'] ?? '—'); ?></span>
                    <span class="lead-meta-source"><?php echo htmlspecialchars($sourceLabel); ?></span>
                  </div>
                </td>
                <td class="col-name"><?php echo htmlspecialchars($row['name'] ?? '—'); ?></td>
                <td class="col-phone">
                  <?php if (!empty($row['phone']) && $row['phone'] !== 'Not Provided'): ?>
                    <a href="tel:<?php echo htmlspecialchars(preg_replace('/[^\d+]/', '', $row['phone'])); ?>">
                      <?php echo htmlspecialchars($row['phone']); ?>
                    </a>
                  <?php else: ?>—<?php endif; ?>
                </td>
                <td class="col-email">
                  <?php
                  $email = $row['email'] ?? '';
                  if ($email !== '' && strpos($email, 'not-provided@') === false): ?>
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                  <?php else: ?>—<?php endif; ?>
                </td>
                <td class="col-service"><?php echo htmlspecialchars($row['service'] ?? '—'); ?></td>
                <td class="col-message msg-cell" title="<?php echo htmlspecialchars($row['message'] ?? ''); ?>">
                  <?php echo leads_render_message($row['message'] ?? null); ?>
                </td>
                <td class="action-cell col-action">
                  <div class="action-btns">
                    <a class="btn-action btn-view" href="<?php echo htmlspecialchars($viewUrl); ?>" title="View lead">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                      <span>View</span>
                    </a>
                    <form class="delete-lead-form" method="post" action="<?php echo SITE_URL; ?>/admin/delete-lead.php"
                          onsubmit="return confirm('Move this lead to Recycle Bin?');">
                      <input type="hidden" name="id" value="<?php echo $rowId; ?>">
                      <input type="hidden" name="page" value="<?php echo $page; ?>">
                      <input type="hidden" name="per_page" value="<?php echo $perPage; ?>">
                      <button type="submit" class="btn-action btn-remove" title="Remove lead">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                        <span>Remove</span>
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
  </div>

  <div class="leads-grid-view is-hidden" id="leads-grid-view">
    <?php if (empty($rows)): ?>
      <p class="empty-row"><?php echo $search !== '' ? 'No leads match your search.' : 'No leads yet.'; ?></p>
    <?php else: ?>
      <div class="leads-grid">
        <?php foreach ($rows as $row): ?>
          <?php
          $formType    = $row['form_type'] ?? '';
          $sourceLabel = admin_form_label($formType);
          $isNew       = (int) ($row['is_viewed'] ?? 0) === 0;
          $rowId       = (int) ($row['id'] ?? 0);
          $viewUrl     = SITE_URL . '/admin/lead-view.php?id=' . $rowId . '&from_page=' . $page . '&per_page=' . $perPage;
          if ($search !== '') {
              $viewUrl .= '&q=' . urlencode($search);
          }
          ?>
          <article class="lead-card<?php echo $isNew ? ' is-new-lead' : ' is-viewed-lead'; ?>">
            <div class="lead-card-head">
              <code class="lead-meta-ticket" title="<?php echo htmlspecialchars($row['ticket_id']); ?>">
                <?php echo htmlspecialchars(leads_ticket_label($row['ticket_id'])); ?>
              </code>
              <?php if ($isNew): ?><span class="new-lead-badge">NEW</span><?php endif; ?>
            </div>
            <p class="lead-card-date"><?php echo htmlspecialchars($row['created_at'] ?? '—'); ?></p>
            <span class="lead-meta-source"><?php echo htmlspecialchars($sourceLabel); ?></span>
            <dl class="lead-card-dl">
              <dt>Name</dt><dd><?php echo htmlspecialchars($row['name'] ?? '—'); ?></dd>
              <dt>Phone</dt><dd><?php echo htmlspecialchars($row['phone'] ?? '—'); ?></dd>
              <dt>Service</dt><dd><?php echo htmlspecialchars($row['service'] ?? '—'); ?></dd>
            </dl>
            <div class="lead-card-actions action-btns">
              <a class="btn-action btn-view" href="<?php echo htmlspecialchars($viewUrl); ?>" title="View"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg><span>View</span></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($totalPages > 1): ?>
    <nav class="pagination pagination-nav" aria-label="Leads pagination">
      <span class="page-info page-range">Showing <?php echo $fromRow; ?>–<?php echo $toRow; ?> of <?php echo number_format($total); ?></span>
      <div class="pagination-pages">
        <?php if ($page > 1): ?>
          <a class="page-btn page-btn-sm" href="<?php echo leads_page_url($page - 1, $perPage, $search); ?>">&larr;</a>
        <?php endif; ?>
        <?php foreach ($pageWindow as $p): ?>
          <?php if ($p === $page): ?>
            <span class="page-num page-num-sm is-current"><?php echo $p; ?></span>
          <?php else: ?>
            <a class="page-num page-num-sm" href="<?php echo leads_page_url($p, $perPage, $search); ?>"><?php echo $p; ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php if ($page < $totalPages): ?>
          <a class="page-btn page-btn-sm" href="<?php echo leads_page_url($page + 1, $perPage, $search); ?>">&rarr;</a>
        <?php endif; ?>
      </div>
    </nav>
  <?php endif; ?>
</section>

<script src="<?php echo SITE_URL; ?>/admin/assets/leads-table.js"></script>

<?php include __DIR__ . '/includes/footer.php'; ?>
