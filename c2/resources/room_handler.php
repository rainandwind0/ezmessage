<?php

    require_once 'db_handler.php';
    session_start();
    $db = new DB();
    $conn = $db->getConn();
     $q = $conn->prepare("SELECT * FROM rooms WHERE room_id = ?");
    $q->execute(array($_GET['rid']));
    $room = $q->fetch();
    $_SESSION['active_room'] = $room['room_id'];

    $db->log("roomid: ".$room['room_id']);
 
    header('Content-type: application/json');
    echo json_encode($room);

?>