<?php 
    require_once('resources/channel_handler.php');

    $myChannels = getOwnedRooms($_SESSION['loginid']);
    $activeChannels = getJoinedRooms($_SESSION['loginid']);

?>
<div class="menu" id="menu">
    <h1 id="branding" class="title"><a href="#">EZMessage</a></h1>
    <ul>
        <li>
            <input type="checkbox" id="my-channels" checked>
            <label for="my-channels" class="toggle fabutton ripple">My Channels</label>
            <div class="icon right add-open">add</div>
            <ul>
                <?php
                    foreach($myChannels as $channel) { 
                ?>
                    <li class="chat-tag">
                        <?php
                            echo '<div class="button roomHandle ripple" ';
                            echo 'id="';
                            echo $channel['room_id'];
                            echo '">';
                            echo $channel['room_topic'];
                        ?>
                        </div>
                        <div class="badge">
                            <?php
                                
                            ?>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </li>
        <li>
            <input type="checkbox" id="active-channels" checked>
            <label for="active-channels" class="toggle fabutton ripple">Joined Channels</label>
            <div class="icon right active-open">add</div>
            <ul>
                <?php
                    foreach($activeChannels as $channel) { 
                ?>
                    <li class="chat-tag">
                        <?php
                            echo '<div class="button roomHandle joined ripple" ';
                            echo 'id="';
                            echo $channel['room_id'];
                            echo '">';
                            echo $channel['room_topic'];
                        ?>
                        </div>
                        <div class="badge">
                            <?php
                                
                            ?>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </li>
    </ul>
    <footer class="dash">
        <a href="resources/logout_handler.php">Logout</a> | Copyright 2017 &copy; ezmessage
    </footer>
</div>