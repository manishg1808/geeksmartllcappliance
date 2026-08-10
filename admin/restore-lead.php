<?php
/**
 * Restore a lead from recycle bin back to form_submissions.
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
        $pdo = db();
        $pdo->beginTransaction();

        $stmt = $pdo->prepare('SELECT * FROM recycled_leads WHERE id = :id LIMIT 1 FOR UPDATE');
        $stmt->execute([':id' => $id]);
        $lead = $stmt->fetch();

        if ($lead) {
            // Avoid ticket_id unique conflict if a new lead reused the same ticket (unlikely)
            $ticketId = $lead['ticket_id'];
            $check = $pdo->prepare('SELECT id FROM form_submissions WHERE ticket_id = :tid LIMIT 1');
            $check->execute([':tid' => $ticketId]);
            if ($check->fetch()) {
                $ticketId = $ticketId . '-R' . time();
            }

            $ins = $pdo->prepare(
                'INSERT INTO form_submissions
                    (ticket_id, form_type, name, phone, email, service, message,
                     preferred_date, preferred_time, printer_model, issue_type, ip_address,
                     is_active, is_viewed, created_at)
                 VALUES
                    (:ticket_id, :form_type, :name, :phone, :email, :service, :message,
                     :preferred_date, :preferred_time, :printer_model, :issue_type, :ip_address,
                     :is_active, :is_viewed, :created_at)'
            );
            $ins->execute([
                ':ticket_id'      => $ticketId,
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
                ':is_viewed'      => (int) ($lead['is_viewed'] ?? 1),
                ':created_at'     => $lead['submitted_at'] ?? date('Y-m-d H:i:s'),
            ]);

            $del = $pdo->prepare('DELETE FROM recycled_leads WHERE id = :id');
            $del->execute([':id' => $id]);
        }

        $pdo->commit();
    } catch (Throwable $e) {
        if (isset($pdo) && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
        error_log('restore-lead failed: ' . $e->getMessage());
    }
}

header('Location: ' . SITE_URL . '/admin/recycle-bin.php?page=' . $page . '&per_page=' . $per);
exit;
