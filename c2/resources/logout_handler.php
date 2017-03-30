<?php

    session_start();
    if(isset($_SESSION['loginid']) &&  isset($_SESSION['email']) && isset($_SESSION['name'])) {
        unset($_SESSION['loginid']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        session_destroy();
        header('Location: /c2/index.php');
    } else {
        session_destroy();
        header('Location: /c2/index.php');
    }

?>