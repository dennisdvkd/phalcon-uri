<?php
use Phalcon\Mvc\View,
    Phalcon\DI\FactoryDefault,
    Phalcon\Db\Adapter\Pdo\Sqlite as DBAdapter,
    Phalcon\Mvc\View\Engine\Volt;

$di = new FactoryDefault();

$di->set('db', function() use ($config) {
    return new DBAdapter([
        'dbname' => $config->database->dbname
    ]);
});

$di->set('view', function() use ($config) {
    $view = new View();
    $view->setViewsDir($config->view->directory);
    $view->registerEngines([
        '.volt' => function($view, $di) use ($config) {
                $volt = new Volt($view, $di);
                $volt->setOptions([
                        'compiledPath'      => $config->view->cache,
                        'compiledExtension' => '.php',
                        'compiledSeparator' => '_',
                        'compileAlways'     => false
                ]);
                return $volt;
            }
    ]);

    return $view;
});