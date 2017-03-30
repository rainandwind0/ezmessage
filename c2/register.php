<?php

    require_once "views/header.php";
    require_once "views/router.php";

    if(isset($_POST['register'])) {
        if(registerNewUser($_POST['name'], $_POST['email'], $_POST['pwd'], $_POST['pwdCheck'])) {
           
            header("Location: index.php");
            exit();

        } else {

            echo '<div  class="card error"><i class="icon">close</i><p class="err">';
            echo "Registration failed. Please try again.";
            echo '</p></div>';
            show_register();

        }
    } else {

        show_register();

    }
    require_once "views/footer.php";
?>