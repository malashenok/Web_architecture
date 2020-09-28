<?php


namespace Framework\Command\Contract;


abstract class BaseRegisterCommand
{
    protected $containerBuilder;


    /**
     * Register constructor.
     * @param $containerBuilder
     */
    public function __construct($containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    abstract public function register();
}