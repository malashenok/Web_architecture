<?php


namespace Service\SocialNetwork\Service;


class FacebookAPI
{
    /**
     * @var
     */
    private $apiKey;

    /**
     * FacebookAPI constructor.
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