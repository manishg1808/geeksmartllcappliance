<?php
/**
 * GeekSmart Appliance - Dynamic Service Detail Page
 * Usage: service-detail.php?service=washer-repair
 */
require_once __DIR__ . '/config.php';

$serviceSlug = filter_input(INPUT_GET, 'service', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'refrigerator-repair';
if (!isset($servicesList[$serviceSlug])) {
    $serviceSlug = 'refrigerator-repair';
}

require_once __DIR__ . '/includes/service-page-content.php';
