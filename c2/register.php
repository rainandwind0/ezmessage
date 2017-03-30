<?php

    require_once "views/header.php";
    require_once "views/router.php";

    if(isset($_POST['register'])) {
        if(registerNewUser($_POST['name'], $_POST['email'], $_POST['pwd'], $_POST['pwdCheck'])) {
           
            echo "Thank you for registering, an email has been sent to your inbox, Please activate your account.
		<a href='./index.php'>Click here to login.</a>";

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