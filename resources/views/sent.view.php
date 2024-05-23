
<?php

if(! auth()->check()){
    header("location: /");
}
?>

<?php require "partials/header.php"?>
<?php require 'partials/sidebar.php'?>

    <div class="mail-area">
        <div class="content-wrapper">
            <div class="profile-pic">
                <div class="profile-logo yellow">
                    <p>D</p>
                </div>
            </div>

            <form class="mail-content-wrapper" action="/send" method="post">
                <div class="contact-info">
                    <p class="contact-name">To: <input type="text" id="sendto" name="sendto" class="inbox"></p>
                    <div class="right">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M10.0667 12.75L6.93333 14.6417L7.76667 11.075L5 8.675L8.65 8.35833L10.0667 5L11.4917 8.36667L15.1417 8.68333L12.375 11.0833L13.2083 14.65L10.0667 12.75Z" fill="#909191"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3415 7.18329L18.3332 7.69996L13.7915 11.6416L15.1498 17.5L9.99984 14.3916L4.84984 17.5L6.2165 11.6416L1.6665 7.69996L7.65817 7.19163L9.99984 1.66663L12.3415 7.18329ZM6.8665 14.725L9.99984 12.8333L13.1415 14.7333L12.3082 11.1666L15.0748 8.76663L11.4248 8.44996L9.99984 5.08329L8.58317 8.44163L4.93317 8.75829L7.69984 11.1583L6.8665 14.725Z" fill="#909191"/>
                            </svg>
                        </button>
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect opacity="0.3" x="6.6665" y="7.5" width="6.66667" height="8.33333" fill="#909191"/> <path d="M12.9165 3.33333L12.0832 2.5H7.9165L7.08317 3.33333H4.1665V5H15.8332V3.33333H12.9165Z" fill="#909191"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66667 17.5C5.75 17.5 5 16.75 5 15.8334V5.83337H15V15.8334C15 16.75 14.25 17.5 13.3333 17.5H6.66667ZM13.3333 7.50004H6.66667V15.8334H13.3333V7.50004Z" fill="#909191"/> </svg>
                        </button>
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 6.53057C10.9168 6.53057 11.6668 5.79587 11.6668 4.89791C11.6668 3.99995 10.9168 3.26526 10.0002 3.26526C9.0835 3.26526 8.3335 3.99995 8.3335 4.89791C8.3335 5.79587 9.0835 6.53057 10.0002 6.53057ZM10.0002 8.16322C9.0835 8.16322 8.3335 8.89791 8.3335 9.79587C8.3335 10.6938 9.0835 11.4285 10.0002 11.4285C10.9168 11.4285 11.6668 10.6938 11.6668 9.79587C11.6668 8.89791 10.9168 8.16322 10.0002 8.16322ZM8.3335 14.6938C8.3335 13.7959 9.0835 13.0612 10.0002 13.0612C10.9168 13.0612 11.6668 13.7959 11.6668 14.6938C11.6668 15.5918 10.9168 16.3265 10.0002 16.3265C9.0835 16.3265 8.3335 15.5918 8.3335 14.6938Z" fill="#909191"/> </svg>
                        </button>
                    </div>
                </div>
                <p>from: <?= $user['email']?><br><br>

                    Title: <input class="inbox" type="text" id="sendtitle" name="sendtitle">
                    <br>
                    <br>
                    Message: <input class="inbox" type="text" id="sendmessage" name="sendmessage">
                    <br>
                    <br>
                    <br>
                    Best,
                    <br>
                    <br>                    - <?= ucfirst($user['firstname'])?></p>
                <div class="reaction-buttons">
                    <input type="submit" class="compose-button" value="S E N D">
                </div>
            </form>
        </div>
    </div>

<?php require "partials/footer.php"?>