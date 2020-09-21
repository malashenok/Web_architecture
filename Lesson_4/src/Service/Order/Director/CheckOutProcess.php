<?php


namespace Service\Order\Director;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\Order\Contract\BasketBuilderInterface;
use Service\User\Security;

class CheckOutProcess
{
    public function constructBasket(BasketBuilderInterface $builder, $session, $products) : void {

        $builder->setBilling(new Card())
                ->setDiscount(new NullObject())
                ->setCommunication(new Email())
                ->setSecurity(new Security($session))
                ->setProducts($products);
    }
}