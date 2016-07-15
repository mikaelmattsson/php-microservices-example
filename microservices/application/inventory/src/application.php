<?php

echo json_encode([
    'stock' => 100,
    'hostname' => getenv('HOSTNAME'),
], JSON_PRETTY_PRINT);
