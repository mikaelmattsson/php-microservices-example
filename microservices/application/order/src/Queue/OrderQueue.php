<?php

namespace App\Order\Queue;

use App\Order\RabbitMQ\AbstractQueue;

class OrderQueue extends AbstractQueue
{

    /**
     * Queue names may be up to 255 bytes of UTF-8 characters.
     *
     * @var string
     */
    protected $name = 'order_queue';
}