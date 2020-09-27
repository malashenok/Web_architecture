<?php


namespace Framework\Command\Contract;


interface CommandInterface
{
    /**
     * Выполнение команды.
     * @param BaseRegisterCommand $command
     */
    public function execute(BaseRegisterCommand $command): void;

}