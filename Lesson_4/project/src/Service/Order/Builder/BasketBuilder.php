<?php


namespace Service\Order\Builder;



use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\Order\Contract\BasketBuilderInterface;
use Service\User\Security;

class BasketBuilder implements BasketBuilderInterface
{
    private $billing;
    private $discount;
    private $communication;
    private $security;
    private $products;

    /**
     * @return mixed
     */
    public function getBilling(): ?Card
    {
        return $this->billing;
    }

    /**
     * @param Card $billing
     * @return BasketBuilderInterface
     */
    public function setBilling(Card $billing): BasketBuilderInterface
    {
        $this->billing = $billing;
    }

    /**
     * @return mixed
     */
    public function getDiscount(): ?NullObject
    {
        return $this->discount;
    }

    /**
     * @param NullObject $discount
     * @return BasketBuilderInterface
     */
    public function setDiscount(NullObject $discount): BasketBuilderInterface
    {
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getCommunication(): ?Email
    {
        return $this->communication;
    }

    /**
     * @param Email $communication
     * @return BasketBuilderInterface
     */
    public function setCommunication(Email $communication): BasketBuilderInterface
    {
        $this->communication = $communication;
    }

    /**
     * @return mixed
     */
    public function getSecurity(): ?Security
    {
        return $this->security;
    }

    /**
     * @param Security $security
     * @return BasketBuilderInterface
     */
    public function setSecurity(Security $security): BasketBuilderInterface
    {
        $this->security = $security;
    }


    public function setProducts($products): void {
        $this->products = $products;
    }

    public function build(): void
    {
        $totalPrice = 0;

        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }

        $totalPrice = $totalPrice - $totalPrice / 100 * $this->discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}