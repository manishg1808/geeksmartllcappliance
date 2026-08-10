<?php
/**
 * Admin logout
 */
require_once __DIR__ . '/includes/auth.php';

admin_logout();
header('Location: ' . SITE_URL . '/admin/login.php');
exit;
