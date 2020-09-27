<?php


namespace Framework\Command;


use Framework\Command\Contract\BaseRegisterCommand;

class RegisterRouteCommand extends BaseRegisterCommand
{

    protected $routeCollection;

    public function register(): void
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}