<?php

if (getenv('ENVIRONMENT') === 'develop') {
    ini_set('opcache.enable', false);
}

require_once '../src/application.php';
