<?php

namespace App\Order\Worker\OrderQueue;

use App\Order\Queue\OrderQueue;
use App\Order\RabbitMQ\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

class OrderQueueController
{
    public function work()
    {
        $consumer = new Consumer(new OrderQueue());

        $consumer->addCallback(function (AMQPMessage $message) {
            echo var_dump(get_class($message));
        });

        $consumer->work(function (string $output) {
            echo $output."\n";
        });
    }
}
