<?php

namespace App\Order;

use App\Order\Http\Controller\CreateController;
use App\Order\Http\Controller\DefaultController;
use App\Order\Http\Controller\ListController;
use App\Order\Http\Controller\OrderController;
use App\Order\RabbitMQ\Connection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Application
{

    public function run()
    {
        if ($_SERVER['REQUEST_URI'] == '/backend-service/order/create') {
            
            (new OrderController())->create();
            return;
        }

        (new DefaultController())->index();
    }
}
