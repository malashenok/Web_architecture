<?php

namespace Service\Order\Facade;

use Service\Order\Builder\BasketBuilder;
use Service\Order\Director\CheckOutProcess;

class BasketManager
{
    /**
     * @var CheckOutProcess
     */
    private $checkOutProcess;

    /**
     * @var BasketBuilder
     */
    private $basketBuilder;

    /**
     * BasketManager constructor.
     * @param $checkOutProcess
     * @param $basketBuilder
     */
    public function __construct(
        CheckOutProcess $checkOutProcess,
        BasketBuilder $basketBuilder
    ) {
        $this->checkOutProcess = $checkOutProcess;
        $this->basketBuilder = $basketBuilder;
    }

    public function checkBasket($session, $products) : void {
        $this->checkOutProcess->constructBasket($this->basketBuilder, $session, $products);
        $this->basketBuilder->build();
    }
}