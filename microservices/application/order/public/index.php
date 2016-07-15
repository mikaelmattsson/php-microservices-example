<?php

if (getenv('ENVIRONMENT') === 'develop') {
    ini_set('opcache.enable', false);
}

require_once __DIR__.'/../vendor/autoload.php';

$app = new \App\Order\Application();

$app->run();
