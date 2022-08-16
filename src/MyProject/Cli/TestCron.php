<?php
namespace MyProject\Cli;


class TestCron extends AbstractCommand
{
    public function checkParams()
    {
        $this->ensureParamExists('x');
        $this->ensureParamExists('y');
    }

    public function execute()
    {
        file_put_contents('d:\\OpenServer\\domains\\PHP-PROFI\\1.log', date(DATE_ISO8601) . PHP_EOL, FILE_APPEND);
    }
}
