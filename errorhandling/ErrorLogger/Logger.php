<?php

class Logger
{
    const ERROR_LOG = __DIR__ . '/logs/error.log';
    const ACTION_LOG= __DIR__ . '/logs/action.log';

    public static function logMessage($log, $message)
    {
        $timeStamp = new DateTime();
        $fileHandler = fopen($log, 'a');
        fwrite($fileHandler, sprintf('%s => %s', $timeStamp->format('Y-m-d H:i:s'), $message) . "\n");
        fclose($fileHandler);
    }
}
