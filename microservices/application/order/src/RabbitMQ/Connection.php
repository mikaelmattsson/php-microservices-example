<?php

namespace App\Order\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class Connection extends AMQPStreamConnection
{

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        parent::__construct(
            getenv('RABBITMQ_URL'),
            getenv('RABBITMQ_PORT'),
            getenv('RABBITMQ_DEFAULT_USER'),
            getenv('RABBITMQ_DEFAULT_PASS')
        );
    }
}