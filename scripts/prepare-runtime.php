<?php

declare(strict_types=1);

$basePath = dirname(__DIR__);

$directories = [
    'bootstrap/cache',
    'storage/logs',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/app/public',
    'storage/app/addons',
];

foreach ($directories as $relativePath) {
    $path = $basePath.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $relativePath);

    if (is_dir($path)) {
        continue;
    }

    mkdir($path, 0755, true);
}

$envPath = $basePath.DIRECTORY_SEPARATOR.'.env';
$envExamplePath = $basePath.DIRECTORY_SEPARATOR.'.env.example';

if (!file_exists($envPath) && file_exists($envExamplePath)) {
    copy($envExamplePath, $envPath);
}
