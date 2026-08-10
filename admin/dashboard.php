<?php
/**
 * Dashboard removed — redirect to Leads.
 */
require_once __DIR__ . '/includes/auth.php';

if (admin_is_logged_in()) {
    header('Location: ' . SITE_URL . '/admin/leads.php');
} else {
    header('Location: ' . SITE_URL . '/admin/login.php');
}
exit;
