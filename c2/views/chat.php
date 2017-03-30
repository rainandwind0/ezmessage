<?php
    include('dialog_new.php');
    include('dialog_active.php');
    include('dialog_settings.php');
?>
<div class="dash-container">
    <?php include 'channel_list.php'; ?>
    <header>
        <div class="left">
            <div id="menu-toggle" class="icon ripple">menu</div>
            <h1 class="title title-button main-title" id="room-topic"></h1>
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
                <div class="user icon ripple settings-open" id="room-settings">settings</div>
                
            </div>
        </div>
    </header>
    <div id="room">
        <div id="chat-window">
        <?php include 'room.php'; ?>
        </div>
        <form id="chat-input-wrapper">
            <textarea type="text" name="msg" id="chat-input" autofocus></textarea>
            <input type="submit" id="chat-button" class="icon primary" value="send" name="send" />
        </form>
    </div>
</div>

<?php if(isset($_SESSION['toast'])) {
    echo '<div id="toast">';
    echo '<span class="msg">'.$_SESSION['toast'].'</span>';
    echo '<i class="icon">close</i>';
    echo '</div>';
    unset($_SESSION['toast']);
} ?>

<script src="js/scroll.js"></script>
<script src="js/dialog.js"></script>
<script src="js/menu.js"></script>
<script src="js/rooms.js"></script>
<script src="js/message.js"></script>
<script src="js/main.js"></script>