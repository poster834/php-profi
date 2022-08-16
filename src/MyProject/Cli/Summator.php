<?php
namespace MyProject\Cli;
use MyProject\Exceptions\CliException;
use MyProject\Cli\AbstractCommand;

class Summator extends AbstractCommand{


    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b');
    }

    public function checkParams()
    {
        $this->ensureParamExists('a');
        $this->ensureParamExists('b');
    }

   
}