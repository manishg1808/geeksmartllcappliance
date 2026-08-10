<?php
/**
 * Move lead to recycle bin, then remove from form_submissions.
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . SITE_URL . '/admin/leads.php');
    exit;
}

$id   = (int) ($_POST['id'] ?? 0);
$page = max(1, (int) ($_POST['page'] ?? 1));
$per  = max(5, min(100, (int) ($_POST['per_page'] ?? 11)));

if ($id > 0) {
    try {
        $pdo = db();
        $pdo->beginTransaction();

        $stmt = $pdo->prepare('SELECT * FROM form_submissions WHERE id = :id LIMIT 1 FOR UPDATE');
        $stmt->execute([':id' => $id]);
        $lead = $stmt->fetch();

        if ($lead) {
            $ins = $pdo->prepare(
                'INSERT INTO recycled_leads
                    (original_id, ticket_id, form_type, name, phone, email, service, message,
                     preferred_date, preferred_time, printer_model, issue_type, ip_address,
                     is_active, is_viewed, submitted_at, deleted_at, deleted_by)
                 VALUES
                    (:original_id, :ticket_id, :form_type, :name, :phone, :email, :service, :message,
                     :preferred_date, :preferred_time, :printer_model, :issue_type, :ip_address,
                     :is_active, :is_viewed, :submitted_at, NOW(), :deleted_by)'
            );
            $ins->execute([
                ':original_id'    => (int) $lead['id'],
                ':ticket_id'      => $lead['ticket_id'],
                ':form_type'      => $lead['form_type'],
                ':name'           => $lead['name'],
                ':phone'          => $lead['phone'],
                ':email'          => $lead['email'],
                ':service'        => $lead['service'],
                ':message'        => $lead['message'],
                ':preferred_date' => $lead['preferred_date'],
                ':preferred_time' => $lead['preferred_time'],
                ':printer_model'  => $lead['printer_model'],
                ':issue_type'     => $lead['issue_type'],
                ':ip_address'     => $lead['ip_address'],
                ':is_active'      => (int) ($lead['is_active'] ?? 1),
                ':is_viewed'      => (int) ($lead['is_viewed'] ?? 0),
                ':submitted_at'   => $lead['created_at'],
                ':deleted_by'     => $_SESSION['admin_username'] ?? 'admin',
            ]);

            $del = $pdo->prepare('DELETE FROM form_submissions WHERE id = :id');
            $del->execute([':id' => $id]);
        }

        $pdo->commit();
    } catch (Throwable $e) {
        if (isset($pdo) && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log('delete-lead / recycle failed: ' . $e->getMessage());
    }
}

header('Location: ' . SITE_URL . '/admin/leads.php?page=' . $page . '&per_page=' . $per);
exit;
