<div class="dialog active" id="active">
    <form class="container" method="POST" action="resources/post_handler.php">
        <div class="card">
            <h2>Join A Room</h2>
            <p>
                Please fill out the following information to join a channel.
            </p>
            <div class="card-body">
                <div class="input-wrapper">
                    <label>Channel Name</label>
                    <input class="input full active-default" name="name" type="text" placeholder="#room1" />
                </div>
                <div class="input-wrapper">
                    <label>Channel Password</label>
                    <input class="input full" type="password" name="pwd" placeholder="password" />
                </div>
            </div>
            <div class="button-group">
                <div class="input-wrapper button right">
                    <input type="Submit" value="Join" name="join" class="input-button primary" />
                </div>
                <div class="input-wrapper shift-r button right">
                    <input type="button" value="Cancel" class="input-button active-open" />
                </div>
            </div>
        </div>
    </form>
    <div class="dialog-hook" id="active-hook">
    </div>
</div>