<div class="box">
    <div class="logo">
        <p class="logo-name">Anon<span>Mail</span></p>
    </div>
    <h2>Register a New Account</h2>
    <form action="/register" method="post">
        <div class="inputBox">
            <input type="text" name="username" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label>Username</label>
        </div>

        <div class="inputBox">
            <input type="text" name="firstName" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label>First Name</label>
        </div>

        <div class="inputBox">
            <input type="text" name="lastName" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label>Last Name</label>
        </div>

        <div class="inputBox">
            <input style="margin-bottom: 0.3rem" type="password" name="password" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label>Password</label>
            <p style="font-size: small;text-align: left;margin: 0 0 0.5rem 0; padding: 4px 12px;color: red;"><?= $error ?? ''?></p>
        </div>

        <div class="inputBox">
            <input type="password" name="cpassword" required onkeyup="this.setAttribute('value', this.value);" value="">
            <label>Confirm Password</label>
        </div>
        <div>
            <p>Already Registered? <strong><a href="/">Login Here</a></strong></p>
        </div>
        <input type="submit" name="sign-in" value="Register">
    </form>
</div>