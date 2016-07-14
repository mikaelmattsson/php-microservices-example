<?php

namespace App\Order\RabbitMQ;

use PhpAmqpLib\Message\AMQPMessage;

class Publisher
{

    /**
     * @var AbstractQueue
     */
    protected $queue;

    /**
     * @param QueueInterface $queue
     */
    public function __construct(QueueInterface $queue)
    {
        $this->queue = $queue;
    }

    public function publish(AMQPMessage $message)
    {
        $connection = new Connection();
        $channel = $connection->channel();

        $channel->queue_declare(
            $this->queue->getName(),
            $this->queue->isPassive(),
            $this->queue->isDurable(),
            $this->queue->isExclusive(),
            $this->queue->isAutoDelete()
        );


        $channel->basic_publish($message, '', $this->queue->getName());

        $channel->close();
        $connection->close();
    }
}