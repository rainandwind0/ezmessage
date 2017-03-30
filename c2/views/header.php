<?php
    //error_reporting(0);
    session_start();
    if(isset($_SESSION['active_room'])) {
        unset($_SESSION['active_room']);
    }
    require_once("resources/db_handler.php");// include the database connection
    require_once("resources/inc_handler.php"); // include all the functions
    $file = basename($_SERVER['PHP_SELF']);
    $free = array("index.php", "register.php");
    if(!isLoggedIn() && !in_array($file, $free)) {
        header('Location: index.php');
    }
    $title = "ezmessage";
?>

<html>
    <head>
        <title><?php echo $title ?></title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>