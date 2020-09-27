<?php


namespace Service\SocialNetwork\Entity;


class User
{

    /**
     * @var
     */
    private $twitterID;

    /**
     * @var
     */
    private $facebookID;

    /**
     * User constructor.
     * @param $twitterID
     * @param $facebookID
     */
    public function __construct($twitterID, $facebookID)
    {
        $this->twitterID = $twitterID;
        $this->facebookID = $facebookID;
    }

    /**
     * @return mixed
     */
    public function getTwitterID()
    {
        return $this->twitterID;
    }

    /**
     * @return mixed
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }
}