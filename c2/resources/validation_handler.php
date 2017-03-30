<?php

function valid_email($email) {

    // Split it into sections
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);

    /*if(user_exists($email)) {
        return false;
    }*/

    return true;
}

function valid_password($pass, $minlength = 6, $maxlength = 20) {

    $pass = trim($pass);
 
    if (empty($pass)) {
        return false;
    }
 
    if (strlen($pass) < $minlength) {
        return false;
    }
 
    if (strlen($pass) > $maxlength) {
        return false;
    }
 
    $result = preg_match("^[A-Za-z0-9_\-]+$^", $pass);
 
    if ($result) {
        return true;
    } else {
        return false;
    }
 
    return false;
 
}

?>