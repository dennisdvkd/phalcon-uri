<?php
ERROR_REPORTING(E_ALL);
ini_set('display_errors', 1);

$app->get('/', function() use ($app) {
    echo $app->render('index/index');
});

$app->get('/u/{short}', function($short) use ($app) {
    $shorturl = app\models\ShortUrl::findFirst("short = '".(string)$short."'");

    if ($shorturl !== false) {
        $shorturl->save();
        return $app->response->redirect($shorturl->getUri(), true, 301);
    } else {
        $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
        echo $app->render('errors/urlnotfound');
    }
});

$app->post('/', function() use ($app) {

    $returndata = function($data) {
        echo json_encode(['url' => $data]);
        die;
    };

    $returnerror = function($messages) {
        echo json_encode(['error' => $messages]);
        die;
    };

    $uri = $app->request->getPost('url');

    $url = new app\models\ShortUrl();
    $url->setUri($uri);
    $url->setDescription('');
    $url->setAdded(DATE_ATOM);
    $url->setLastAccess(DATE_ATOM);

    $shorturl = app\models\ShortUrl::findFirst("uri = '" . (string)$url->getUri() . "'");

    if ($shorturl !== false) {
        $shorturl->setLastAccess(DATE_ATOM);
        $shorturl->save();

        $returndata($shorturl->getShort());
    } else {
        $uniqueId = app\helpers\UniqueId::Generate();
        $url->setShort($uniqueId);

        if ($url->save() === true) {
            $returndata($uniqueId);
        } else {
            $returnerror($url->getMessages());
        }
    }
});

/**
 * 404 handler
 */
$app->notFound(function() use ($app) {
    $app->response->setStatusCode(404, 'Not Found')->sendHeaders();
    echo $app->render('errors/404');
});