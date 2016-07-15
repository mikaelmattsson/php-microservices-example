<?php

namespace App\Order;

use App\Order\Http\Controller\DefaultController;
use App\Order\Http\Controller\OrderController;
use App\Order\Worker\OrderQueue\OrderQueueController;

class Application
{
    public function run()
    {
        if ($_SERVER['REQUEST_URI'] == '/backend-service/order/create') {
            (new OrderController())->create();

            return;
        }

        if (isset($GLOBALS['argv'])
            && in_array('--worker-order-queue', $GLOBALS['argv'])
        ) {
            (new OrderQueueController())->work();
        }

        (new DefaultController())->index();
    }
}
