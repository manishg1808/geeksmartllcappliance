<?php
/**
 * Admin layout header (sidebar + top bar). Expects auth already required.
 * Optional: $pageTitle, $activeNav (leads|recycle-bin)
 */
if (!isset($pageTitle)) {
    $pageTitle = 'Admin';
}
if (!isset($activeNav)) {
    $activeNav = 'leads';
}

$adminUsername = $_SESSION['admin_username'] ?? 'Admin';
$adminBase     = SITE_URL . '/admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title><?php echo htmlspecialchars($pageTitle); ?> | <?php echo htmlspecialchars(SITE_NAME); ?> Admin</title>
  <link rel="icon" type="image/svg+xml" href="<?php echo SITE_URL; ?>/assets/images/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin/assets/admin.css">
</head>
<body class="admin-body">
  <div class="admin-shell">
    <aside class="admin-sidebar" id="admin-sidebar">
      <div class="sidebar-brand">
        <img class="brand-mark" src="<?php echo SITE_URL; ?>/assets/images/favicon.svg" alt="" width="36" height="36">
        <div>
          <strong><?php echo htmlspecialchars(SITE_NAME); ?></strong>
          <span>Admin Panel</span>
        </div>
      </div>

      <nav class="sidebar-nav">
        <a href="<?php echo $adminBase; ?>/leads.php" class="nav-item<?php echo $activeNav === 'leads' ? ' is-active' : ''; ?>">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Leads
        </a>

        <a href="<?php echo $adminBase; ?>/recycle-bin.php" class="nav-item<?php echo $activeNav === 'recycle-bin' ? ' is-active' : ''; ?>">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <polyline points="3 6 5 6 21 6"/>
            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
            <path d="M10 11v6M14 11v6"/>
            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
          </svg>
          Recycle Bin
        </a>
      </nav>

      <div class="sidebar-footer">
        <a href="<?php echo SITE_URL; ?>/" class="nav-item" target="_blank" rel="noopener">View Website</a>
        <a href="<?php echo $adminBase; ?>/logout.php" class="nav-item nav-logout">Logout</a>
      </div>
    </aside>

    <div class="admin-main">
      <header class="admin-topbar">
        <button type="button" class="sidebar-toggle" id="sidebar-toggle" aria-label="Toggle menu">
          <span></span><span></span><span></span>
        </button>
        <div class="topbar-title">
          <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
        </div>
        <div class="topbar-user">
          <span class="user-avatar"><?php echo strtoupper(substr($adminUsername, 0, 1)); ?></span>
          <span class="user-name"><?php echo htmlspecialchars($adminUsername); ?></span>
        </div>
      </header>
      <main class="admin-content">
