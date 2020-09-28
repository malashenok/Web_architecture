<?php


namespace Framework;

use Framework\Command\Contract\BaseRegisterCommand;
use Framework\Command\Contract\CommandInterface;

class RegisterKernelHandler implements CommandInterface
{
    public function execute(BaseRegisterCommand $command): void
    {
        $command->register();
    }
}