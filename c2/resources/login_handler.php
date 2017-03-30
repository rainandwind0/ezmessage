<?php

require_once('db_handler.php');

function isLoggedIn() {
 
    if (isset($_SESSION['loginid']) && isset($_SESSION['email'])) {
        return true; // the user is loged in
    } else {
        return false; // not logged in
    }
 
    return false;

}

function checkLogin($u, $p) {
global $seed; // global because $seed is declared in the header.php file
    
    if (!valid_email($u) || !valid_password($p) || !user_exists($u)) {
        return false;
    }



    $db = new DB();
    $conn = $db->getConn();
    $q = $conn->prepare("SELECT * FROM users WHERE email=?");
    $q->execute(array($u));
    //print_r($q->errorInfo());
    $res=$q->fetchAll()[0];
    //print_r($res);
    if($res['password'] == $p) {
        $_SESSION['loginid'] = $res['id'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['name'] = $res['name'];
        return true;
    }
    return false;

}

?>