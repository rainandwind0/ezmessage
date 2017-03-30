<div class="login-container">
    <div class="card">
        <header>
            <h1 class="title">EZMessage Login</h1>
        </header>
        <form action="index.php" method="POST">
            <div class="input-wrapper">
                <label>Email</label>
                <input class="input full" name="email" type="text" placeholder="johndoe@gmail.com" autofocus />
            </div>
            <div class="input-wrapper">
                <label>Password</label>
                <input class="input full" name="pwd" type="password" placeholder="password" />
            </div>
            <div class="button-group">
                <div class="input-wrapper button right ripple">
                    <input class="input-button primary" name="cmdlogin" type="submit" value="LOGIN" />
                </div>
                <div class="input-wrapper shift-r button right ripple">
                    <input class="input-button" type="button" value="FORGOT PASSWORD" />
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once "views/footer.php"; ?>
