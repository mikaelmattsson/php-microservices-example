<?php

namespace App\Order\Http\Controller;

use App\Order\Queue\OrderQueue;
use App\Order\RabbitMQ\Publisher;
use PhpAmqpLib\Message\AMQPMessage;

class OrderController
{
    public function create()
    {
        $publisher = new Publisher(new OrderQueue());
        $publisher->publish(new AMQPMessage(time()));

        echo json_encode([
            'status' => 'created',
            'hostname' => getenv('HOSTNAME'),
        ], JSON_PRETTY_PRINT);
    }

    public function show()
    {
        echo json_encode([
            'hostname' => getenv('HOSTNAME'),
        ], JSON_PRETTY_PRINT);
    }
}
