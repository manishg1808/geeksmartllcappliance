<?php
/**
 * GeekSmart Appliance - Unified Form & Lead Submission Processor
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/db.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

/**
 * Read and trim a POST string field.
 */
function form_post_string(string $key, string $default = ''): string
{
    $value = $_POST[$key] ?? $default;
    if (!is_string($value)) {
        return $default;
    }
    return trim($value);
}

/**
 * Read and validate an optional email field.
 */
function form_post_email(string $key, string $default = 'not-provided@geeksmartappliance.com'): string
{
    $value = form_post_string($key);
    if ($value === '') {
        return $default;
    }
    $validated = filter_var($value, FILTER_VALIDATE_EMAIL);
    return $validated !== false ? $validated : $default;
}

$name          = form_post_string('name', 'Valued Customer');
$phone         = form_post_string('phone', 'Not Provided');
$email         = form_post_email('email');
$service       = form_post_string('service', 'General Appliance Service');
$message       = form_post_string('message', 'No additional details provided.');
$formType      = form_post_string('form_type', 'Inquiry');
$preferredDate = form_post_string('preferred_date');
$preferredTime = form_post_string('preferred_time');
$printerModel  = form_post_string('printer_model');
$issueType     = form_post_string('issue_type');

$preferredDate = $preferredDate !== '' ? $preferredDate : null;
$preferredTime = $preferredTime !== '' ? $preferredTime : null;
$printerModel  = $printerModel  !== '' ? $printerModel  : null;
$issueType     = $issueType     !== '' ? $issueType     : null;

if ($name === '' || $phone === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Name and phone are required.']);
    exit;
}

$submissionTime = date('Y-m-d H:i:s');
$clientIp       = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
$ticketId       = 'GS-' . time() . '-' . random_int(100, 999);

$logEntry = [
    'id'             => $ticketId,
    'date'           => $submissionTime,
    'form_type'      => $formType,
    'name'           => $name,
    'phone'          => $phone,
    'email'          => $email,
    'service'        => $service,
    'message'        => $message,
    'preferred_date' => $preferredDate,
    'preferred_time' => $preferredTime,
    'printer_model'  => $printerModel,
    'issue_type'     => $issueType,
    'ip'             => $clientIp,
];

$savedToDb = false;

try {
    $stmt = db()->prepare(
        'INSERT INTO form_submissions
            (ticket_id, form_type, name, phone, email, service, message,
             preferred_date, preferred_time, printer_model, issue_type, ip_address, created_at)
         VALUES
            (:ticket_id, :form_type, :name, :phone, :email, :service, :message,
             :preferred_date, :preferred_time, :printer_model, :issue_type, :ip_address, :created_at)'
    );
    $stmt->execute([
        ':ticket_id'      => $ticketId,
        ':form_type'      => $formType,
        ':name'           => $name,
        ':phone'          => $phone,
        ':email'          => $email,
        ':service'        => $service,
        ':message'        => $message,
        ':preferred_date' => $preferredDate,
        ':preferred_time' => $preferredTime,
        ':printer_model'  => $printerModel,
        ':issue_type'     => $issueType,
        ':ip_address'     => $clientIp,
        ':created_at'     => $submissionTime,
    ]);
    $savedToDb = true;
} catch (Throwable $e) {
    error_log('form_submissions INSERT failed: ' . $e->getMessage());
}

$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}
$logFile = $dataDir . '/submissions.json';
$existingLogs = file_exists($logFile) ? json_decode((string) file_get_contents($logFile), true) : [];
if (!is_array($existingLogs)) {
    $existingLogs = [];
}
array_unshift($existingLogs, $logEntry);
@file_put_contents($logFile, json_encode($existingLogs, JSON_PRETTY_PRINT));

if (!$savedToDb) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'We could not save your request right now. Please call us at ' . PHONE_NUMBER . '.',
    ]);
    exit;
}

echo json_encode([
    'success'   => true,
    'message'   => 'Thank you! Your request has been received. Our certified technician will contact you at ' . htmlspecialchars($phone) . ' shortly.',
    'ticket_id' => $ticketId,
    'redirect'  => SITE_URL . '/thank-you.php?ticket=' . urlencode($ticketId),
]);
exit;
