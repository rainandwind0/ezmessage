<?php

require_once("views/router.php");

if (!isLoggedIn()) {
    
    // user is not logged in.
    if (isset($_POST['cmdlogin'])) {
        if (checkLogin($_POST['email'], $_POST['pwd'])) {
            show_chat();
        } else {
            echo '<div  class="card error"><i class="icon">close</i><p class="err">';
            echo "Login failed. Please try again.";
            echo '</p></div>';
            show_login();
        }
    } else {
        show_login();
    }

} else {
    show_chat();
}
?>