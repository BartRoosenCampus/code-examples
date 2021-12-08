<?php
// index.php
declare(strict_types=1);

require_once 'ErrorLogger/Logger.php';

class ErrorHandling
{
    public function evokeError($parameter)
    {
        try {
            Logger::logMessage(Logger::ACTION_LOG, 'We zitten in de try...');
            // deze if dient alleen maar om een fout uit te lokken
            if (1 === $parameter) {
                Logger::logMessage(Logger::ACTION_LOG, 'Er gaat iets mis een error wordt ge-throw-d');
                throw new Exception('In dit geval geef ik een custom boodschap aan de exception');
            }
        } catch (Exception $e) {
            // hier kan je een specifieke error message in de error log wegschrijven
            Logger::logMessage(Logger::ACTION_LOG, 'Het loopt mis dus een error message moet gelogd worden');
            Logger::logMessage(Logger::ERROR_LOG, sprintf('Het loopt mis met %s', $this::class));
            echo $e->getMessage();
        } finally {
            Logger::logMessage(Logger::ACTION_LOG, 'Nu zitten we in het finally gedeelte');
            echo '<p>Deze code wordt zowiezo uitgevoerd fout of niet</p>';
        }
    }
}

$error = new ErrorHandling();

// om een fout uit te lokken, geef 1 mee als parameter
$error->evokeError(1);
