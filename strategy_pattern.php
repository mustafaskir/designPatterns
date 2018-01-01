<?php

/**
 * LogToFile, LogToDatabase, LogToXWebServices all implements from logger interface
 * all do number of methods ,and don't care about what method do
 * LogToFile have log method which can log files open,update,delete or something like that
 * LogToDatabs have log for any connection or insert,update,delete or something like that
 * and also XWebService
 * we use a helper class just take a Logger to specify which should handle and process
 */

interface Logger{
    public function log($data);
}

class LogToFile implements Logger{
    public function log($data){
        var_dump('Log Data To File');
    }
}

class LogToDatabase implements Logger{
    public function log($data){
        var_dump('Log Data To DB');
    }
}

class LogToXWebService implements Logger{
    public function log($data){
        var_dump('Log Data To XWebService');
    }
}

class App{
    public function log($data,Logger $logger = null){
        $logger = $logger ?: new LogToFile();
        $logger->log($data);
    }
}


$app = new App();

$app->log('Some info');
