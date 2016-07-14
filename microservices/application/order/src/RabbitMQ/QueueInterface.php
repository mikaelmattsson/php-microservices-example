<?php

namespace App\Order\RabbitMQ;

interface QueueInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return boolean
     */
    public function isPassive() : bool;

    /**
     * @return boolean
     */
    public function isDurable() : bool;

    /**
     * @return boolean
     */
    public function isExclusive() : bool;

    /**
     * @return boolean
     */
    public function isAutoDelete() : bool;
}