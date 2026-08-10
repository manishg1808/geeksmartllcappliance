<?php
/**
 * Permanently delete a lead from the recycle bin.
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . SITE_URL . '/admin/recycle-bin.php');
    exit;
}

$id   = (int) ($_POST['id'] ?? 0);
$page = max(1, (int) ($_POST['page'] ?? 1));
$per  = max(5, min(100, (int) ($_POST['per_page'] ?? 11)));

if ($id > 0) {
    try {
        $stmt = db()->prepare('DELETE FROM recycled_leads WHERE id = :id');
        $stmt->execute([':id' => $id]);
    } catch (Throwable $e) {
        error_log('permanent-delete-lead failed: ' . $e->getMessage());
    }
}

header('Location: ' . SITE_URL . '/admin/recycle-bin.php?page=' . $page . '&per_page=' . $per);
exit;
