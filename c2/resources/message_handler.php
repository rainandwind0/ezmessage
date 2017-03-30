<?php

    require_once('db_handler.php');

    function createMessage($uid, $rid, $msg) {

        $db = new DB();
        $conn = $db->getConn();

        $db->log("creating message...");

        $q = $conn->prepare("INSERT INTO messages (user_id, room_id, message_body) VALUES (?, ?, ?);");
        $success = $q->execute(array($uid, $rid, $msg));
        $ret = array('success'=>$success, 'msg'=>$msg);
        $db->log("message errInfo: ".implode(" | ", $q->errorInfo()));
        $db->log("message creation: ".implode(" | ", $ret));
        return $ret;


    }

    function getRoomMessages($rid) {
         $db = new DB();
        $conn = $db->getConn();

        $db->log("getting messages...");

        $q = $conn->prepare("SELECT messages.message_body, users.name, users.id FROM messages, users WHERE messages.user_id=users.id AND messages.room_id=? ORDER BY messages.message_id DESC LIMIT 50");
        $success = $q->execute(array($rid));
        
        $db->log("message errInfo: ".implode(" | ", $q->errorInfo()));
        $db->log("got messages.");
        return $q->fetchAll();
    }

?>