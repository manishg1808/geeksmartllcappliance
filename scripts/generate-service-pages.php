<?php
/**
 * Generate thin service page loaders for every catalog slug.
 */
$root = dirname(__DIR__);
require $root . '/config.php';

$dir = $root . '/services';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

foreach (array_keys($servicesList) as $slug) {
    // printer uses root printer-service.php
    if ($slug === 'printer-service') {
        continue;
    }
    $path = $dir . '/' . $slug . '.php';
    $code = "<?php\n/**\n * Service page: {$slug}\n */\n\$serviceSlug = '{$slug}';\nrequire_once __DIR__ . '/../includes/service-page-content.php';\n";
    file_put_contents($path, $code);
    echo "Wrote {$path}\n";
}

echo "Done.\n";
