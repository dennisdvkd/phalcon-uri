<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces([
   'app\models' => '../app/models/',
   'app\helpers' => '../app/helpers/'
]);

$loader->register();

