<?php

    require_once('db_handler.php');
    require_once('klogger.php');
    $log = new KLogger(__DIR__."/log.txt", KLogger::DEBUG);

    function registerNewUser($name, $email, $pwd, $pwdCheck) {
    $db = new DB();
    $conn = $db->getConn();
        //echo "password valid? ".valid_password($pwd);
        //echo "passwordCheck valid? ".valid_password($pwdCheck);
        //echo "email valid? ".valid_email($email);
        if(valid_password($pwd) && valid_password($pwdCheck) && valid_email($email)) {
            
            $q = $conn->prepare("INSERT INTO users (email, password, failed_attempts, name) VALUES (?, ?, ? , ?);");
            $success = $q->execute(array($email, $pwd, 0, $name));
            echo $success;
            print_r($q->errorInfo());
        }
        
        return false;
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