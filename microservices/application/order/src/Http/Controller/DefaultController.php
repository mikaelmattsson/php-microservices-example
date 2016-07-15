<?php

namespace App\Order\Http\Controller;

class DefaultController
{
    public function index()
    {
        echo json_encode([
            'hostname' => getenv('HOSTNAME'),
        ], JSON_PRETTY_PRINT);
    }
}
