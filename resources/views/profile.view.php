
<?php

use \Core\Database;

if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
    header("location: /");
    exit;
}
?>

<?php require "partials/header.php"?>
<?php require 'partials/sidebar.php'?>

<div class="mail-area">
    <div class="content-wrapper">

        <div class="mail-content-wrapper">
            <div class="contact-info" style="flex-direction: column">

                <div>User Name: <strong><?= $_SESSION['username']?></strong></div>
                <div>First Name: <strong><?= $_SESSION['firstname']?></strong></div>
                <div>Last Name: <strong><?= $_SESSION['lastname']?></strong></div>
                <div>Email: <strong><?= $_SESSION['email']?></strong></div>
<!--                <div>password: --><strong><?php //= $_SESSION['username']?></strong></div>
            </div>
        </div>
    </div>
</div>

<?php require "partials/footer.php"?><?php
