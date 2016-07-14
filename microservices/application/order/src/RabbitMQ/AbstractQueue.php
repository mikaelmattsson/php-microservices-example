<?php

namespace App\Order\RabbitMQ;

abstract class AbstractQueue implements QueueInterface
{

    /**
     * Queue names may be up to 255 bytes of UTF-8 characters.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Can use this to check whether an exchange exists without modifying the
     * server state.
     *
     * @var bool
     */
    protected $passive = false;

    /**
     * The queue will survive a broker restart.
     *
     * @var bool
     */
    protected $durable = true;

    /**
     * Used by only one connection and the queue will be deleted when that
     * connection closes.
     *
     * @var bool
     */
    protected $exclusive = false;

    /**
     * Queue is deleted when last consumer unsubscribes.
     *
     * @var bool
     */
    protected $autoDelete = false;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function isPassive() : bool
    {
        return $this->passive;
    }

    /**
     * @return boolean
     */
    public function isDurable() : bool
    {
        return $this->durable;
    }

    /**
     * @return boolean
     */
    public function isExclusive() : bool
    {
        return $this->exclusive;
    }

    /**
     * @return boolean
     */
    public function isAutoDelete() : bool
    {
        return $this->autoDelete;
    }
}