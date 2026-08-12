<?php
/**
 * Admin lead detail JSON API (for View popup on leads list).
 */
require_once __DIR__ . '/includes/auth.php';
admin_require_auth();

header('Content-Type: application/json; charset=utf-8');

$id = (int) ($_GET['id'] ?? 0);
if ($id < 1) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid lead ID.']);
    exit;
}

function lead_api_display(?string $value, string $empty = '—'): string
{
    $value = trim((string) $value);
    if ($value === '' || $value === 'Not Provided' || $value === 'No additional details provided.') {
        return $empty;
    }
    if (stripos($value, 'submitted from homepage horizontal form') !== false) {
        return $empty;
    }
    return $value;
}

function lead_api_email(?string $email): string
{
    $email = trim((string) $email);
    if ($email === '' || strpos($email, 'not-provided@') !== false) {
        return '—';
    }
    return $email;
}

try {
    $stmt = db()->prepare('SELECT * FROM form_submissions WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $lead = $stmt->fetch();
} catch (Throwable $e) {
    error_log('lead-api query failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Unable to load lead.']);
    exit;
}

if (!$lead) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Lead not found.']);
    exit;
}

if ((int) ($lead['is_viewed'] ?? 0) === 0) {
    try {
        $mark = db()->prepare('UPDATE form_submissions SET is_viewed = 1 WHERE id = :id');
        $mark->execute([':id' => $id]);
    } catch (Throwable $e) {
        error_log('lead-api mark viewed failed: ' . $e->getMessage());
    }
}

$phoneDisplay = lead_api_display($lead['phone'] ?? null);
$emailDisplay = lead_api_email($lead['email'] ?? null);
$msgDisplay   = lead_api_display($lead['message'] ?? null);
$prefDate     = lead_api_display($lead['preferred_date'] ?? null);
$prefTime     = lead_api_display($lead['preferred_time'] ?? null);
$printerModel = lead_api_display($lead['printer_model'] ?? null);
$issueType    = lead_api_display($lead['issue_type'] ?? null);

echo json_encode([
    'success' => true,
    'lead'    => [
        'id'             => (int) $lead['id'],
        'ticket_id'      => $lead['ticket_id'] ?? '',
        'created_at'     => $lead['created_at'] ?? '—',
        'source'         => admin_form_label($lead['form_type'] ?? ''),
        'name'           => lead_api_display($lead['name'] ?? null),
        'phone'          => $phoneDisplay,
        'phone_href'     => $phoneDisplay !== '—' ? preg_replace('/[^\d+]/', '', $phoneDisplay) : '',
        'email'          => $emailDisplay,
        'service'        => lead_api_display($lead['service'] ?? null),
        'message'        => $msgDisplay,
        'ip_address'     => lead_api_display($lead['ip_address'] ?? null),
        'preferred_date' => $prefDate,
        'preferred_time' => $prefTime,
        'printer_model'  => $printerModel,
        'issue_type'     => $issueType,
        'show_booking'   => ($prefDate !== '—' || $prefTime !== '—'),
        'show_printer'   => ($printerModel !== '—' || $issueType !== '—'),
    ],
]);
