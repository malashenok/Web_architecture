<?php


namespace Service\SocialNetwork\Communication;


use Service\SocialNetwork\Contract\SociableInterface;
use Service\SocialNetwork\Service\FacebookAPI;

class FacebookCommunicator implements CommunicationInterface
{
    /**
     * @var facebookAPI
     */
    private $facebookApi;

    /**
     * @var SociableInterface
     */
    private $sociable;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * facebookCommunicator constructor.
     * @param $facebookApi
     * @param $sociable
     * @param $title
     * @param $message
     */
    public function __construct(
        FacebookAPI $facebookApi,
        SociableInterface $sociable,
        string $title,
        string $message)
    {
        $this->facebookApi = $facebookApi;
        $this->sociable = $sociable;
        $this->title = $title;
        $this->message = $message;
    }


    public function sendMessage(): void
    {
        $message = $this->title . " " . strip_tags($this->message);
        $this->facebookApi->auth($this->sociable->getFacebookID());
        $this->facebookApi->sendMessage($message);
    }

}