# Logging
Soms kan het handig zijn logs bij te houden van hetgeen in je code gebeurd.

In dit voorbeeld zijn er 2 logs, een action log en een error log. Beide
worden gevuld mbv de Logger class.

Maak in de folder ErrorLogger een subfolder "logs" om dit voorbeeld
uit te testen.

````
    class Logger
    {
        const ERROR_LOG = __DIR__ . '/logs/error.log';
        const ACTION_LOG= __DIR__ . '/logs/action.log';
    
        public static function logMessage($log, $message)
        {
            $timeStamp = new DateTime();
            $fileHandler = fopen($log, 'a');
            fwrite(
                $fileHandler, 
                sprintf(
                    '%s => %s', 
                    $timeStamp->format('Y-m-d H:i:s'), 
                    $message) . "\n"
                );
            fclose($fileHandler);
        }
    }
