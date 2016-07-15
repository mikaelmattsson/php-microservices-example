<?php

namespace App\Order\RabbitMQ;

interface QueueInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return bool
     */
    public function isPassive() : bool;

    /**
     * @return bool
     */
    public function isDurable() : bool;

    /**
     * @return bool
     */
    public function isExclusive() : bool;

    /**
     * @return bool
     */
    public function isAutoDelete() : bool;
}
