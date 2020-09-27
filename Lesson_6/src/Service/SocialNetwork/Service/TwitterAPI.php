<?php


namespace Service\SocialNetwork\Service;


class TwitterAPI
{

    /**
     * @var
     */
    private $apiKey;


    /**
     * TwitterAPI constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function auth($userId): void
    {
        echo "Подключаемся к сети с помощью userId и apiKey";
    }

    public function sendMessage(string $message): void
    {
        echo "Отправляем сообщение";
    }

}