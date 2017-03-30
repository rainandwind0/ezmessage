<div class="dialog add" id="add">
    <form class="container" method="POST" action="resources/post_handler.php">
        <div class="card">
            <h2>Create A New Room</h2>
            <p>
                Please fill out the following information to create a new channel.
            </p>
            <div class="card-body">
                <div class="input-wrapper">
                    <label>Channel Name</label>
                    <input class="input full add-default" name="name" type="text" placeholder="myRoom1" />
                </div>
                <div class="input-wrapper">
                    <label>Channel Password</label>
                    <input class="input full" type="password" name="pwd" placeholder="password" />
                </div>
                <div class="input-wrapper">
                    <label>Repeat Channel Password</label>
                    <input class="input full" type="password" name="pwdCheck" placeholder="password" />
                </div>
            </div>
            <div class="button-group">
                <div class="input-wrapper button right">
                    <input type="submit" name="new" value="Create" class="input-button primary" />
                </div>
                <div class="input-wrapper shift-r button right">
                    <input type="button" value="Cancel" class="input-button add-open" />
                </div>
            </div>
        </div>
    </form>
    <div class="dialog-hook" id="add-hook">
    </div>
</div>