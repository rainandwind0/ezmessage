
<?php

if(!isset($_SESSION)) {
    session_start();
    require_once('../resources/message_handler.php');
}  

if(isset($_SESSION['active_room'])) {
    $room = getRoomMessages($_SESSION['active_room']);
} else {
    $room = [];
}

foreach(array_reverse($room) as $message) {
    if($message['id'] == $_SESSION['loginid']) { ?>
        <div class="message me">
            <h3>
                <?php
                    echo $message['name'];
                ?>
            </h3>
            <span class="arrow-right">&#9658</span>
            <div class="user icon">
                account_circle
            </div>
            <p class="me">
                <?php
                    echo $message['message_body'];
                ?>
            </p>
        </div>
    <?php 
    } else { 
    ?>
        <div class="message them">
            <h3>
                <?php
                    echo $message['name'];
                ?>
            </h3>
            <div class="user icon">
                account_circle
            </div>
            <span class="arrow-left">&#9668</span>
            <p class="them">
                <?php
                    echo $message['message_body'];
                ?>
            </p>
            
        </div>  
<?php 
    }
} 
?>
