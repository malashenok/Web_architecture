<?php


namespace Service\SocialNetwork\Contract;


interface SociableInterface
{
    /**
     * @return string
     */
    public function getTwitterID(): string;

    /**
     * @return string
     */
    public function getFacebookID(): string;

}