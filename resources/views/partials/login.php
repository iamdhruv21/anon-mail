
<div class="box">
    <div class="logo">
        <p class="logo-name">Anon<span>Mail</span></p>
    </div>
    <h2 style="margin: 0 0 1rem 0;">Sign In with existing Account</h2>
    <form action="/" method="post">
        <div class="inputBox">
            <input type="text" name="username" id="username" required onkeyup="this.setAttribute('value', this.value);"  value="">
            <label for="username">Username</label>
        </div>
        <div class="inputBox">
            <input style="margin-bottom: 0.3rem" id="password" type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
            <label for="password">Password</label>
            <p style="font-size: small;text-align: left;margin: 0 0 0.8rem 0;padding: 4px 12px;color: red;"><?= $error ?? ''?></p>
        </div>
        <div>
            <p>Not Registered? <strong><a href="/register">Register Here</a></strong></p>
        </div>
        <input type="submit" name="sign-in" value="Sign In">
    </form>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        Toastify({
            text: "This is a toast",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){} // Callback after click
        }).showToast();
    </script>
</div>