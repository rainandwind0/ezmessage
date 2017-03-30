<?php

require_once 'klogger.php';

class DB {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $log;

    public function __construct() {
        $this->host = "us-cdbr-iron-east-03.cleardb.net";
        $this->db = "heroku_a7d29adb43deee1";
        $this->user = "b7e059cb9fca65";
        $this->pass = "a6f040a7";
        $this->log = new KLogger(__DIR__."/log.txt", KLogger::FATAL);
    }

    public function getConn() {

        $this->log->LogDebug("Trying to get a db connection...");

        try {

            $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        
        } catch(Exception $e) {

            $this->log->LogFatal($e);
            exit();
            
        }

        $this->log->LogDebug("Got a db connection!");
        return $conn;
    }

    public function log($msg, $lvl = "debug") {
        switch($lvl) {

            case "debug":
                $this->log->LogDebug($msg);
                break;

            case "info":

                $this->log->LogInfo($msg);
                break;

            case "warn":
                $this->log->LogWarn($msg);
                break;

            case "error":
                $this->log->LogError($msg);
                break;

            case "fatal":
                $this->log->LogFatal($msg);
                break;

            default:
                $this->log->LogDebug($msg);
                break;

        }
    }
}