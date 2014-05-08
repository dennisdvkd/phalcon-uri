<?php
error_reporting(E_ALL);

try {
    $config = include __DIR__ . '/../app/config/config.php';

    include __DIR__ . '/../app/config/di.php';
    include __DIR__ . '/../app/config/UriApp.php';

    $app = new UriApp($di);

    include __DIR__ . '/../app/index.php';

    $app->handle();

} catch (\Exception $e) {
    echo $e->getMessage();
}