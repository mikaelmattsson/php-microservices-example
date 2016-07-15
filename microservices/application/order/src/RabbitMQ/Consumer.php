<?php

namespace App\Order\RabbitMQ;

class Consumer
{
    /**
     * @var AbstractQueue
     */
    protected $queue;

    /**
     * @var array
     */
    protected $callbacks = [];

    /**
     * @param QueueInterface $queue
     */
    public function __construct(QueueInterface $queue)
    {
        $this->queue = $queue;
    }

    public function addCallback($callable)
    {
        $this->callbacks[] = $callable;
    }

    public function work(callable $stream)
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

        $stream('[*] Waiting for messages. To exit press CTRL+C');

        foreach ($this->callbacks as $callback) {
            $channel->basic_consume(
                $this->queue->getName(),
                '',
                false,
                true,
                false,
                false,
                $callback
            );
        }

        while (count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
