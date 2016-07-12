<?php

namespace App\Order;

use App\Order\RabbitMQ\Connection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Application
{

    public function run()
    {
        if ($_SERVER['REQUEST_URI'] == '/backend-service/order/create') {

            $this->createOrder();

            echo json_encode([
                'status'   => 'created',
                'hostname' => getenv('HOSTNAME'),
            ], JSON_PRETTY_PRINT);

            return;
        }

        echo json_encode([
            'hostname' => getenv('HOSTNAME'),
        ], JSON_PRETTY_PRINT);
    }

    public function createOrder()
    {

        $connection = new Connection();
        $channel = $connection->channel();

        $channel->queue_declare(
            'order_queue',  #queue - Queue names may be up to 255 bytes of UTF-8 characters
            false,          #passive - can use this to check whether an exchange exists without modifying the server state
            true,           #durable - the queue will survive a broker restart
            false,          #exclusive - used by only one connection and the queue will be deleted when that connection closes
            false           #auto delete - queue is deleted when last consumer unsubscribes
        );

        $msg = new AMQPMessage(time());
        $channel->basic_publish($msg, '', 'order_queue');

        $channel->close();
        $connection->close();
    }
}
