<?php
/**
 * GeekSmart Appliance - Clean HTML Header Include with Lucide Icons
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

$pageTitle = $pageTitle ?? DEFAULT_META_TITLE;
$pageDesc  = $pageDesc  ?? DEFAULT_META_DESC;
$pageKeys  = $pageKeys  ?? DEFAULT_META_KEYWORDS;
$ogImage   = $ogImage   ?? DEFAULT_OG_IMAGE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($pageKeys); ?>">
  
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($pageDesc); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars(SITE_URL); ?>">
  <meta property="og:type" content="website">

  <link rel="icon" type="image/svg+xml" href="<?php echo SITE_URL; ?>/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="128x128" href="<?php echo SITE_URL; ?>/assets/images/favicon.png">
  <link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>/assets/images/favicon.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

  <!-- Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/styles.css">

  <?php if (file_exists(__DIR__ . '/schema.php')) include_once __DIR__ . '/schema.php'; ?>
</head>
<body>
