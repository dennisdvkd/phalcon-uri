<?php

$app->get('/', function () use ($app) {
    echo $app->render('index/index');
});


$app->get('/u/{short}', function($short) use ($app) {
    var_dump($short);
});

/**
 * 404 handler..
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
    $app->getService('view')->title = '404..';
    echo $app->render('errors/404');
});