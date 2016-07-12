<?php

$hostname = getenv('HOSTNAME');
$orderBackendUrl = 'http://'.getenv('SERVICE_URL_ORDER_BACKEND');
$inventoryBackendUrl = 'http://'.getenv('SERVICE_URL_INVENTORY_BACKEND');

$requests = [];

if (isset($_POST['createorder'])) {
    $requests[] = [
        'title'   => 'Response from order service (create)',
        'content' => file_get_contents($orderBackendUrl.'create'),
    ];
}

$requests[] = [
    'title'   => 'Response from order service',
    'content' => file_get_contents($orderBackendUrl),
];

$requests[] = [
    'title'   => 'Response from inventory service',
    'content' => file_get_contents($inventoryBackendUrl),
];

require_once "../resources/views/home.php";
