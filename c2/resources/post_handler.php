<?php

    require_once('channel_handler.php');
    require_once('message_handler.php');
    session_start();

    //print_r($_POST);
    
    if(isset($_POST['new'])) {
        $res = createRoom($_SESSION['loginid'], $_POST['name'], $_POST['pwd'], $_POST['pwdCheck']);
        $_SESSION['toast'] = $res['msg'];
        header('Location: /index.php');
    }

    if(isset($_POST['msg'])) {
        
        $res = createMessage($_SESSION['loginid'], $_SESSION['active_room'], $_POST['msg']);
        header('Content-type: application/json');
        echo json_encode($res);
        exit();
    }

    if(isset($_POST['join'])) {
        $res = joinRoom($_SESSION['loginid'], $_POST['name'], $_POST['pwd']);
        $_SESSION['toast'] = $res['msg'];
        header('Location: /index.php');
    }

    //echo "here";
    //exit();

?>