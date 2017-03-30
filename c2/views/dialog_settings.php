<div class="dialog settings" id="settings">
    <form class="container" id="settings-form">
        <div class="card">
            <h2>Settings for room: <span class="main-title"></span></h2>
            <p>
                The following information is the settings of the channel, it may be edited and saved.
            </p>
            <div class="card-body">
                <div class="input-wrapper">
                    <label>Channel Name</label>
                    <input class="input full settings-default" type="text" placeholder="myRoom1" name="name" />
                </div>
                <div class="input-wrapper">
                    <label>Current Channel Password</label>
                    <input class="input full" type="password" placeholder="password" name="pwd"  />
                </div>
                <div class="input-wrapper">
                    <label>New Channel Password</label>
                    <input class="input full" type="password" placeholder="password" name="newPwd" />
                </div>
            </div>
            <div class="button-group">
                <div class="input-wrapper button right">
                    <input type="button" value="Save" class="input-button primary" />
                </div>
                <div class="input-wrapper shift-r button right">
                    <input type="button" value="Cancel" class="input-button settings-open" />
                </div>
            </div>
        </div>
    </form>
    <div class="dialog-hook" id="settings-hook">
    </div>
</div>