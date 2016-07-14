<?php

namespace App\Order\Worker\Controller;

use App\Order\Queue\OrderQueue;
use App\Order\RabbitMQ\Worker;

class OrderQueueController
{

    public function work()
    {
        $worker = new Worker(new OrderQueue());

        $worker->addCallback(function ($message) {
            // Add order to database
        });

        $worker->work(function ($output) {
            echo $output . "\n";
        });
    }
}