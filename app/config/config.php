<?php
return new \Phalcon\Config([
    'database' => [
        'dbname' => realpath(__DIR__ . '/../../data/db/storage.db')
    ],
    'view' => [
        'directory' => realpath(__DIR__ . '/../../views/'),
        'cache' => realpath(__DIR__ . '/../../cache/volt/')
    ],
    'application' => [
        'baseUri'        => '/',
        'name'           => 'uri shortener'
    ]
]);