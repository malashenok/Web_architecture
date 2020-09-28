<?php


namespace Service\Order\Contract;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

interface BasketBuilderInterface
{
    /**
     * @return Card|null
     */
    public function getBilling(): ?Card;

    /**
     * @return NullObject|null
     */
    public function getDiscount(): ?NullObject;

    /**
     * @return Email|null
     */
    public function getCommunication(): ?Email;

    /**
     * @return Security|null
     */
    public function getSecurity(): ?Security;

    /**
     * @param Card $card
     * @return $this
     */
    public function setBilling(Card $card) : self;

    /**
     * @param NullObject $discount
     * @return $this
     */
    public function setDiscount(NullObject $discount) : self;
    /**
     * @param Email $communication
     * @return $this
     */
    public function setCommunication(Email $communication) : self;
    /**
     * @param Security $security
     * @return $this
     */
    public function setSecurity(Security $security) : self;

    public function setProducts($products) : void;

    public function build(): void;
}