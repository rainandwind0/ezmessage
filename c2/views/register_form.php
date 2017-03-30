<div class="login-container">
    <div class="card">
        <header>
            <h1 class="title">EZMessage Sign Up</h1>
        </header>
        <form action="register.php" method="POST">
            <div class="input-wrapper">
                <label>Full Name</label>
                <input class="input full" type="text" name="name" placeholder="John Doe" autofocus />
            </div>
            <div class="input-wrapper">
                <label>Email</label>
                <input class="input full" type="text" name="email" placeholder="johndoe@gmail.com" />
            </div>
            <div class="input-wrapper">
                <label>Password</label>
                <input class="input full" type="password" name="pwd" placeholder="password" />
            </div>
            <div class="input-wrapper">
                <label>Repeat Password</label>
                <input class="input full" type="password" name="pwdCheck" placeholder="repeat password" />
            </div>
            <div class="button-group">
                <div class="input-wrapper button right ripple">
                    <input class="input-button primary" name="register" type="submit" value="Sign Up" />
                </div>
            </div>
        </form>
    </div>
</div>