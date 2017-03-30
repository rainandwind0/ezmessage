<?php 
    require_once('views/header.php');
?>
<div class="page-container">
    <header>
        <div class="left">
            <h1 class="title">My Account</h1>
        </div>
        <div class="right">
            <div>
                <input type="checkbox" id="user-menu">
                <label for="user-menu" class="user icon ripple">account_circle</label>
                <div class="card" id="user-info">
                    <a href="account.php">Account</a>
                    <a href="resources/logout_handler.php">Logout</a>
                    <div class="handle"></div>
                </div>
            </div>
            <div>
                <a href="index.php" class="user icon ripple">home</a>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="block">
            <h4>Name</h4>
            <h2><?php echo $_SESSION['name'] ?></h2>
        </div>
        <div class="block">
            <h4>Email</h4>
            <h2><?php echo $_SESSION['email'] ?></h2>
        </div>
    </div>
    <footer class="dash">
        <a href="resources/logout_handler.php">Logout</a> | Copyright 2017 &copy; ezmessage
    </footer>
    <script type="text/javascript" src="js/menu.js"></script>
</div>