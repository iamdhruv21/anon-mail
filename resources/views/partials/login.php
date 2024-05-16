<div class="box">
    <div class="logo">
        <p class="logo-name">Anon<span>Mail</span></p>
    </div>
    <h2>Sign In with existing Account</h2>
    <form action="/" method="post">
        <div class="inputBox">
            <input type="text" name="username" id="username" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label for="username">Username</label>
            <p><?= $errors['username'] ?? '';?></p>
        </div>
        <div class="inputBox">
            <input id="password" type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
            <label for="password">Password</label>
            <p><?= $errors['password'] ?? ''?></p>
        </div>
        <div>
            <p>Not Registered? <strong><a href="/register">Register Here</a></strong></p>
        </div>
        <input type="submit" name="sign-in" value="Sign In">
    </form>
</div>