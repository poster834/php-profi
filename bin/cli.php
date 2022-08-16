<?php
require __DIR__. str_replace('/','\\','/../vendor/autoload.php');

try {
    unset($argv[0]);

    $className = '\\MyProject\\Cli\\'.array_shift($argv);
    if (!class_exists($className)) {
        throw new \MyProject\Exceptions\CliException('Class '.$className.' not found');
    }

    $params = [];
    foreach ($argv as $arg)
    {
        preg_match('/^-(.+)=(.+)$/', $arg, $matches);
        if (!empty($matches)) {
            $params[$matches[1]] = $matches[2];
        }
    }

    $reflectionClass = new \ReflectionClass($className);

    if ($reflectionClass->isSubclassOf(MyProject\Cli\AbstractCommand::class)) {
        $class = new $className($params);
        $class->execute();    
    } else {
        throw new \MyProject\Exceptions\CliException('Class '.$className.' not found');
    }
} catch (\MyProject\Exceptions\CliException $e) {
    echo 'Error '. $e->getMessage();
}
