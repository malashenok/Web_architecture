<?php


namespace Service\SocialNetwork\Communication;


use Service\SocialNetwork\Contract\SociableInterface;
use Service\SocialNetwork\Service\TwitterAPI;

class TwitterCommunicator  implements CommunicationInterface
{

    /**
     * @var TwitterAPI
     */
    private $twitterApi;

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
     * TwitterCommunicator constructor.
     * @param $twitterApi
     * @param $sociable
     * @param $title
     * @param $message
     */
    public function __construct(
        TwitterAPI $twitterApi,
        SociableInterface $sociable,
        string $title,
        string $message)
    {
        $this->twitterApi = $twitterApi;
        $this->sociable = $sociable;
        $this->title = $title;
        $this->message = $message;
    }


    public function sendMessage(): void
    {
        $message = $this->title . " " . strip_tags($this->message);
        $this->twitterApi->auth($this->sociable->getTwitterID());
        $this->twitterApi->sendMessage($message);
    }
}