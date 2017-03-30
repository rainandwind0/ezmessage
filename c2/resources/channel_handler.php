<?php

    require_once('db_handler.php');
    require_once('validation_handler.php');

    function getOwnedRooms($uid) {
        $db = new DB();
        $conn = $db->getConn();

        $db->log("Getting owned rooms...");

        $q = $conn->prepare("SELECT * FROM rooms WHERE owner_id = :owner");
        $q->bindParam(":owner", $uid);
        $q->execute();

        $db->log("Got Owned Rooms.");

        return $q->FetchAll();
    }

    function getJoinedRooms($uid) {
        $db = new DB();
        $conn = $db->getConn();

        $db->log("Getting joined rooms...");

        $q = $conn->prepare("SELECT rooms.room_topic, rooms.room_id FROM user_rooms, rooms WHERE user_rooms.room_id=rooms.room_id AND user_rooms.user_id=?;");
        $success = $q->execute(array($uid));

        $db->log(implode(" | ", $q->errorInfo()));

        $db->log("Got joined rooms.");

        return $q->FetchAll();
    }

    function createRoom($owner, $topic, $password, $passwordCheck) {
        $db = new DB();
        $msg = "";
        $success = false;
        $pwdReq = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';

        $db->log("Creating new room...");

        if($password == $passwordCheck) {
            if(preg_match($pwdReq, $password)) {
                $conn = $db->getConn();
                $q = $conn->prepare("INSERT INTO rooms (owner_id, room_topic, password) values (?, ?, ?)");
                $success = $q->execute(array($owner, $topic, $password));
                $db->log(implode(" | ",$q->errorInfo()), "error");
                if($success) {
                    $msg = "Room created succcessfully.";
                } else {
                    $msg = "DB error. Room failed to be saved.";
                }
            } else {
                $success = false;
                $msg = "password did not meet reqs. Room failed to be saved.";
            }
        } else {
            $success = false;
            $msg = "passwords did not match. Room failed to be saved.";
        }

        $db->log($msg);
        return array("msg"=>$msg, "success"=>$success);
    }

    function joinRoom($uid, $roomName, $pwd) {
        $db = new DB();
        $success = false;
        if(valid_password($pwd)) {
            $conn = $db->getConn();
            $q = $conn->prepare("SELECT * FROM rooms WHERE room_topic=?");
            $success = $q->execute(array($roomName));
            $room = $q->fetch();
            $rid = $room['room_id'];
            if($pwd == $room['password']) {
                $q = $conn->prepare("INSERT INTO user_rooms (room_id, user_id) VALUES (?, ?);");
                $success = $q->execute(array($rid, $uid));
                $db->log(implode(" | ", $q->errorInfo()));
                return array("success"=>$success, "msg"=>"room joined successfully.");
            }
        }
        return array("success"=>$success, "msg"=>"failed to join room, password incorrect.");
    }

?>