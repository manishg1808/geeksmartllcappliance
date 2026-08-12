<?php
/**
 * GeekSmart Appliance - Unified Form & Lead Submission Processor
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/db.php';

header('Content-Type: application/json');

// Ensure Request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize Inputs
$name           = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'Valued Customer';
$phone          = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'Not Provided';
$email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? 'not-provided@geeksmartappliance.com';
$service        = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'General Appliance Service';
$message        = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'No additional details provided.';
$formType       = filter_input(INPUT_POST, 'form_type', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'Inquiry';
$preferredDate  = filter_input(INPUT_POST, 'preferred_date', FILTER_SANITIZE_SPECIAL_CHARS);
$preferredTime  = filter_input(INPUT_POST, 'preferred_time', FILTER_SANITIZE_SPECIAL_CHARS);
$printerModel   = filter_input(INPUT_POST, 'printer_model', FILTER_SANITIZE_SPECIAL_CHARS);
$issueType      = filter_input(INPUT_POST, 'issue_type', FILTER_SANITIZE_SPECIAL_CHARS);

// Normalize empty optional fields to null
$preferredDate = ($preferredDate !== null && $preferredDate !== '') ? $preferredDate : null;
$preferredTime = ($preferredTime !== null && $preferredTime !== '') ? $preferredTime : null;
$printerModel  = ($printerModel !== null && $printerModel !== '') ? $printerModel : null;
$issueType     = ($issueType !== null && $issueType !== '') ? $issueType : null;

$submissionTime = date('Y-m-d H:i:s');
$clientIp       = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
$ticketId       = 'GS-' . time() . '-' . rand(100, 999);

// Prepare Log Entry
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
    'ip'             => $clientIp
];

// Persist to MySQL
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
} catch (Throwable $e) {
    // Fail silently for DB so lead still gets JSON backup + email response;
    // log error locally for debugging without exposing details to the client.
    error_log('form_submissions INSERT failed: ' . $e->getMessage());
}

// Local JSON Backup Logging
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}
$logFile = $dataDir . '/submissions.json';
$existingLogs = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : [];
if (!is_array($existingLogs)) $existingLogs = [];
array_unshift($existingLogs, $logEntry);
@file_put_contents($logFile, json_encode($existingLogs, JSON_PRETTY_PRINT));

// Mail Delivery
$to = NOTIFICATION_EMAIL;
$subject = "New " . SITE_NAME . " Lead: " . $service . " (" . $name . ")";
$emailBody = "
--------------------------------------------------
NEW APPLIANCE / TECH LEAD SUBMISSION
--------------------------------------------------
Ticket ID: {$ticketId}
Date/Time: {$submissionTime}
Form Type: {$formType}

Customer Name: {$name}
Phone Number : {$phone}
Email Address: {$email}
Requested Svc: {$service}
Preferred Date: " . ($preferredDate ?? 'N/A') . "
Preferred Time: " . ($preferredTime ?? 'N/A') . "
Printer Model : " . ($printerModel ?? 'N/A') . "
Issue Type    : " . ($issueType ?? 'N/A') . "

Problem Notes:
{$message}

Client IP    : {$clientIp}
--------------------------------------------------
";

$headers = [];
$headers[] = "From: " . SITE_NAME . " <" . EMAIL_ADDRESS . ">";
$headers[] = "Reply-To: " . $email;
$headers[] = "X-Mailer: PHP/" . phpversion();

$mailSent = @mail($to, $subject, $emailBody, implode("\r\n", $headers));

// AJAX Response
echo json_encode([
    'success' => true,
    'message' => 'Thank you! Your request has been received. Our certified technician will contact you at ' . htmlspecialchars($phone) . ' shortly.',
    'ticket_id' => $ticketId,
    'redirect' => SITE_URL . '/thank-you.php?ticket=' . urlencode($ticketId)
]);
exit;
