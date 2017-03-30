<?php

    require_once('db_handler.php');
    require_once('klogger.php');
    $log = new KLogger(__DIR__."/log.txt", KLogger::DEBUG);

    function registerNewUser($name, $email, $pwd, $pwdCheck) {
    $db = new DB();
    $conn = $db->getConn();
    $success = false;

        if(valid_password($pwd) && valid_password($pwdCheck) && valid_email($email)) {
            
            $q = $conn->prepare("INSERT INTO users (email, password, failed_attempts, name) VALUES (?, ?, ? , ?);");
            $success = $q->execute(array($email, $pwd, 0, $name));

        }
        
        return $success;
    }

    function user_exists($email) {
        $db = new DB();
        $conn = $db->getConn();
        $q = $conn->prepare('SELECT * FROM users WHERE email=?');
        $q->execute(array($email));
        if(sizeof($q->fetchAll()) > 0) {
            return true;
        } else {
            return false;
        }
    }

?>