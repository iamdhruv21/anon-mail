<?php

use Core\Database;

if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
    header("location: /");
    exit;
}


?>

<?php require "partials/header.php" ?>

<?php require "partials/sidebar.php"?>

    <div class="conversations-list">
        <div class="action-bar">
            <div class="actions-left">
                Welcome, <span style="color: #4285F4;"><?= strtoupper($_SESSION['firstname']) ?? 'Guest'?></span>
            </div>
            <div class="actions-right">
                <button>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M15.8332 15.8333H4.1665V6.66663H15.8332V15.8333ZM8.7915 8.33329V10.8333H6.6665L9.99984 14.1666L13.3332 10.8333H11.2165V8.33329H8.7915Z" fill="#909191"/>
                        <path d="M13.3332 10.8334H11.2082V8.33337H8.7915V10.8334H6.6665L9.99984 14.1667L13.3332 10.8334Z" fill="#909191"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1167 4.35833L15.9583 2.95833C15.7333 2.675 15.3917 2.5 15 2.5H5C4.60833 2.5 4.26667 2.675 4.03333 2.95833L2.88333 4.35833C2.64167 4.64167 2.5 5.01667 2.5 5.41667V15.8333C2.5 16.75 3.25 17.5 4.16667 17.5H15.8333C16.75 17.5 17.5 16.75 17.5 15.8333V5.41667C17.5 5.01667 17.3583 4.64167 17.1167 4.35833ZM5.2 4.16667H14.8L15.475 4.975H4.53333L5.2 4.16667ZM4.16667 15.8333H15.8333V6.66667H4.16667V15.8333Z" fill="#909191"/>
                    </svg>
                </button>
                <button>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="6.6665" y="7.5" width="6.66667" height="8.33333" fill="#909191"/>
                        <path d="M12.9165 3.33333L12.0832 2.5H7.9165L7.08317 3.33333H4.1665V5H15.8332V3.33333H12.9165Z" fill="#909191"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66667 17.5C5.75 17.5 5 16.75 5 15.8334V5.83337H15V15.8334C15 16.75 14.25 17.5 13.3333 17.5H6.66667ZM13.3333 7.50004H6.66667V15.8334H13.3333V7.50004Z" fill="#909191"/>
                    </svg>
                </button>
                <button>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M9.99967 12.8L3.33301 8.6167V15H16.6663L16.658 8.6417L9.99967 12.8Z" fill="#909191"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3248 6.66671C18.3248 6.06671 18.0165 5.54171 17.5415 5.25004L9.99984 0.833374L2.45817 5.25004C1.98317 5.54171 1.6665 6.06671 1.6665 6.66671V15C1.6665 15.9167 2.4165 16.6667 3.33317 16.6667H16.6665C17.5832 16.6667 18.3332 15.9167 18.3332 15L18.3248 6.66671ZM9.99984 2.76671L16.6582 6.66671V6.67504L9.99984 10.8334L3.33317 6.66671L9.99984 2.76671ZM3.33317 8.61671V15H16.6665L16.6582 8.64171L9.99984 12.8L3.33317 8.61671Z" fill="#909191"/>
                    </svg>
                </button>
                <button>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M3.77783 10.0001C3.77783 6.56894 6.56894 3.77783 10.0001 3.77783C13.4312 3.77783 16.2223 6.56894 16.2223 10.0001C16.2223 13.4312 13.4312 16.2223 10.0001 16.2223C6.56894 16.2223 3.77783 13.4312 3.77783 10.0001ZM9.11117 10.8889L13.3334 13.4223L14.0001 12.3289L10.4445 10.2223V5.55561H9.11117V10.8889Z" fill="#909191"/>
                        <path d="M10.4447 5.55554H9.11133V10.8889L13.3336 13.4222L14.0002 12.3289L10.4447 10.2222V5.55554Z" fill="#909191"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 10C2 5.58222 5.58222 2 10 2C14.4178 2 18 5.58222 18 10C18 14.4178 14.4178 18 10 18C5.58222 18 2 14.4178 2 10ZM3.77778 10C3.77778 13.4311 6.56889 16.2222 10 16.2222C13.4311 16.2222 16.2222 13.4311 16.2222 10C16.2222 6.56889 13.4311 3.77778 10 3.77778C6.56889 3.77778 3.77778 6.56889 3.77778 10Z" fill="#909191"/>
                    </svg>
                </button>
                <button class="more">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </button>
            </div>
        </div>
        <div class="mail-list">
            <?php foreach ($result as $item) : ?>
                <?php if ($item['sender'] == $_SESSION['email']) : ?>
                    <input
                        class="mail-item"
                        name="mail-item"
                        type="radio"
                        id="mail-<?= $item['id']?>"
                        checked
                    />
                    <label for="mail-<?= $item['id']?>" class="mail">

                            <div class="profile-pic">
                                <div class="profile-logo <?php $a = [1=>'blue', 2 => 'yellow', 3 => 'green']; echo $a[(rand(1, 3))]?>">
                                    <p><?= strtoupper(substr($item['receiver'], 0, 1))?></p>
                                </div>
                            </div>
                            <div class="mail-content">
                                <div class="mail-header">
                                    <?php
                                    $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

                                    $db->query('select * from users where email = :email', [
                                        'email' => $item['receiver']
                                    ]);

                                    $result = $db->fetch();?>
                                    <p class="contact-name"><?= $result['firstname'].' '.$result['lastname'];?></p>
                                    <p class="mail-time"><?= $item['send_time']?></p>
                                </div>
                                <a href="/mail?id=<?=$item['id']?>">
                                    <p class="mail-text"><?= $item['message']?></p>
                                </a>
                            </div>
                    </label>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>


<?php require "partials/footer.php"?>