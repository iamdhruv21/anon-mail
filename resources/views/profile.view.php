
<?php

use \Core\DB;

if(! auth()->check()){
    header("location: /");
    exit;
}
?>

<?php require "partials/header.php"?>
<?php require 'partials/sidebar.php'?>

<div class="mail-area">
    <div class="content-wrapper">

        <div class="mail-content-wrapper">
            <div class="contact-info" style="align-items:start;flex-direction: column;font-size: 1.2rem">

                <div>User Name: <strong style="color:#4285F4"><?= $user['username']?></strong></div>
                <div>First Name: <strong style="color:#4285F4"><?= $user['firstname']?></strong></div>
                <div>Last Name: <strong style="color:#4285F4"><?= $user['lastname']?></strong></div>
                <div>Email: <strong style="color:#4285F4"><?= $user['email']?></strong></div>
            </div>
        </div>
    </div>
</div>

<?php require "partials/footer.php"?><?php
