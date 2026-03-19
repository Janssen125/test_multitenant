<?php

// Ensure Vercel's /tmp directory has the necessary folders for Laravel to write to
$compiled = '/tmp/storage/framework/views';
if (!is_dir($compiled)) {
    @mkdir($compiled, 0755, true);
}
putenv("VIEW_COMPILED_PATH=$compiled");
$_SERVER['VIEW_COMPILED_PATH'] = $compiled;
$_ENV['VIEW_COMPILED_PATH'] = $compiled;

// Fix read-only filesystem errors by pointing Laravel's caches to /tmp
$caches = [
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
];
foreach ($caches as $key => $path) {
    putenv("$key=$path");
    $_SERVER[$key] = $path;
    $_ENV[$key] = $path;
}

// Forward all requests to the normal Laravel bootstrap logic.
require __DIR__ . '/../public/index.php';
