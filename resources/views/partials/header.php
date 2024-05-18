<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap");
        html,
        body {
            font-family: "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        html {
            --selected-background-color: rgba(66, 133, 244, 0.2);
            --selected-items-color: #4285F4;
            --svg-current-color:#909191;
            overflow: hidden;
        }

        h1,
        h2 {
            margin: 0;
        }

        .section-header, .item-wrapper label, .button-wrapper, .tab-bar {
            padding-left: 20px;
            padding-right: 20px;
        }

        .mail-content-wrapper .contact-info, .subject-bar .header-buttons .header-button, .subject-bar .header-buttons, .subject-bar, .mail .mail-header, .mail, .action-bar .actions-right, .action-bar, .side-bar-bottom, .section-header, .item-info, .item-wrapper label, .compose-button, .right, .search-area, .left, .logo-wrapper, .tab-bar {
            display: flex;
            align-items: center;
        }

        .bottom-button-wrapper button:hover, .other-services button:hover, .action-bar button:hover, .right button:hover {
            opacity: 0.6;
        }

        .compose-button {
            box-shadow: 0px 3px 10px rgb(228, 232, 235);
        }

        button, label {
            cursor: pointer;
        }

        button {
            background: none;
            border: none;
            line-height: 0;
        }

        .gmail-page {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        .page-content {
            display: flex;
            flex: 1;
            height: 100%;
            overflow: hidden;
        }

        .tab-bar {
            justify-content: space-between;
            height: 64px;
            border-bottom: 1px solid #ddd;
        }

        .logo-wrapper {
            font-size: 16px;
            color: #909191;
        }

        .logo-wrapper p {
            margin-left: 4px;
        }

        .left {
            justify-content: space-between;
            width: 54%;
        }

        .search-area {
            width: 600px;
            height: 34px;
            background-color: #f7f8f9;
            border-radius: 6px;
            padding: 2px 8px;
        }
        .search-area input {
            flex: 1;
            background: none;
            border: none;
            outline: none;
        }
        .search-area input::-moz-placeholder {
            font-weight: 400;
            color: #909191;
            font-size: 14px;
        }
        .search-area input::placeholder {
            font-weight: 400;
            color: #909191;
            font-size: 14px;
        }

        .right {
            justify-content: space-between;
        }
        .right img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
        }
        .side-bar {
            width: 256px;
            border-right: 1px solid #ddd;
            color: #909191;
            font-size: 14px;
            font-weight: 600;

        }

        .button-wrapper {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .compose-button {
            justify-content: space-evenly;
            border-radius: 30px;
            width: 148px;
            height: 42px;
            color: #909191;
            font-size: 13px;
            font-weight: 600;
        }

        .item-wrapper label {
            border-left: 3px solid white;
        }
        .item-wrapper label svg {
            color: var(--svg-current-color);
        }

        .nav-item, .folder-nav-item, .bottom-nav, .bottom-logo, .mail-item {
            display: none;
        }

        .item-info {
            flex: 1;
            justify-content: space-between;
            padding-left: 16px;
            font-weight: 600;
            font-size: 14px;
        }

        .item-wrapper {
            color: #909191;
        }
        .item-wrapper label {
            position: relative;
        }

        #inbox:checked ~ .item-wrapper label[for=inbox],
        #starred:checked ~ .item-wrapper label[for=starred],
        #snoozed:checked ~ .item-wrapper label[for=snoozed],
        #sent:checked ~ .item-wrapper label[for=sent],
        #draft:checked ~ .item-wrapper label[for=draft],
        #spam:checked ~ .item-wrapper label[for=spam],
        #trash:checked ~ .item-wrapper label[for=trash] {
            background-color: var(--selected-background-color);
            border-left: 3px solid var(--selected-items-color);
            color: var(--selected-items-color);
        }
        #inbox:checked ~ .item-wrapper label[for=inbox] svg,
        #starred:checked ~ .item-wrapper label[for=starred] svg,
        #snoozed:checked ~ .item-wrapper label[for=snoozed] svg,
        #sent:checked ~ .item-wrapper label[for=sent] svg,
        #draft:checked ~ .item-wrapper label[for=draft] svg,
        #spam:checked ~ .item-wrapper label[for=spam] svg,
        #trash:checked ~ .item-wrapper label[for=trash] svg {
            color: var(--selected-items-color);
        }

        .section-break {
            width: 90%;
            opacity: 0.4;
        }

        .section-header {
            justify-content: space-between;
        }

        label .arrow {
            position: absolute;
            left: 5px;
        }
        label span {
            margin-left: auto;
        }

        .item-name {
            padding-left: 16px;
        }

        ::-webkit-scrollbar {
            width: 6px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background: none;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(216, 216, 216, 0.5);
            border-radius: 10px;
        }

        #clients:checked ~ .item-wrapper label[for=clients] p,
        #expenses:checked ~ .item-wrapper label[for=expenses] p,
        #reports:checked ~ .item-wrapper label[for=reports] p,
        #team:checked ~ .item-wrapper label[for=team] p,
        #travels:checked ~ .item-wrapper label[for=travels] p {
            color: black;
        }

        .side-bar-bottom {
            height: 50px;
            justify-content: space-between;
            border-bottom: 2px solid #fff;
            position: absolute;
            bottom: 0;
        }
        .side-bar-bottom label {
            padding: 10px 25px 6px 25px;
        }

        .logo-2 {
            width: 24px;
            height: 24px;
        }

        .logo-3 {
            width: 24px;
            height: 24px;
        }

        .side-bar-content {
            overflow: auto;
            flex: 1;
            height: calc(100% - 50px);
        }

        #logo-1:checked ~ .label-wrapper label[for=logo-1],
        #logo-2:checked ~ .label-wrapper label[for=logo-2],
        #logo-3:checked ~ .label-wrapper label[for=logo-3] {
            border-bottom: 4px solid var(--selected-items-color);
        }

        .action-bar {
            height: 60px;
            width: 100%;
            border-bottom: 1px solid #ddd;
            justify-content: space-between;
            padding: 0 16px;
        }
        .action-bar .more .circle {
            background-color: #909191;
            height: 3px;
            width: 3px;
            border-radius: 50%;
            margin: 2px;
        }

        .conversations-list {
            display: flex;
            flex-direction: column;
            border-right: 1px solid #ddd;
            width: 100%;
        }

        .mail-list {
            overflow: auto;
            flex: 1;
        }
        .mail-list label {
            border-left: 3px solid #fff;
        }

        .mail {
            width: 98%;
            padding: 16px 12px;
            color: #909191;
            font-size: 14px;
            font-weight: 400;
        }

        .mail-content a{
            text-decoration: none;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            color: #909191;
        }

        .mail-content a:hover {
            text-decoration: underline;
        }
        .mail .mail-header {
            justify-content: space-between;
        }
        .mail .contact-name {
            color: #212223;
            font-size: 13px;
            font-weight: 600;
        }

        .profile-pic img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }
        .profile-pic .profile-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }
        .profile-pic .profile-logo p {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }
        .profile-pic .blue {
            border: 1px solid #4285F4;
            background: rgba(66, 133, 244, 0.2);
        }
        .profile-pic .blue p {
            color: #4285F4;
        }
        .profile-pic .yellow {
            border: 1px solid #F4B400;
            background: rgba(244, 180, 0, 0.2);
        }
        .profile-pic .yellow p {
            color: #F4B400;
            top: -44%;
            left: 30%;
        }
        .profile-pic .green {
            border: 1px solid #0F9D58;
            background: rgba(15, 157, 88, 0.2);
        }
        .profile-pic .green p {
            color: #0F9D58;
        }

        .mail-content {
            flex: 1;
            overflow: hidden;
            padding-left: 10px;
        }
        .mail-content p {
            margin: 0;
        }

        #mail-1:checked ~ label[for=mail-1] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-2:checked ~ label[for=mail-2] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-3:checked ~ label[for=mail-3] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-4:checked ~ label[for=mail-4] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-5:checked ~ label[for=mail-5] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-6:checked ~ label[for=mail-6] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-7:checked ~ label[for=mail-7] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-8:checked ~ label[for=mail-8] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-9:checked ~ label[for=mail-9] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-10:checked ~ label[for=mail-10] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-11:checked ~ label[for=mail-11] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-12:checked ~ label[for=mail-12] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-13:checked ~ label[for=mail-13] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        #mail-14:checked ~ label[for=mail-14] {
            border-left: 3px solid var(--selected-items-color);
            background: #f7f8f9;
        }

        .conversation {
            flex: 1;
        }

        .other-services {
            width: 50px;
            border-left: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            padding: 6px;
        }
        .other-services button {
            line-height: 0;
            padding: 16px 0;
        }
        .other-services svg {
            width: 20px;
            height: 20px;
        }
        .services-top {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .services-top .section-break {
            width: 30px;
        }

        .subject-bar {
            height: 52px;
            border-bottom: 1px solid #ddd;
        }
        .subject-bar p {
            margin: 0;
            color: #212223;
            font-size: 16px;
            font-weight: 600;
        }

        .subject-bar {
            justify-content: space-between;
            padding: 4px 10px;
        }
        .subject-bar .header {
            display: flex;
            justify-content: space-between;
        }
        .subject-bar .header-buttons {
            padding-left: 20px;
        }
        .subject-bar .header-buttons .header-button {
            border-radius: 4px;
            margin-right: 6px;
            padding: 2px 4px;
        }
        .subject-bar .header-buttons .header-button button {
            padding: 0;
            position: relative;
            top: 1px;
        }
        .subject-bar .header-buttons .header-button p {
            font-size: 13px;
            line-height: 1;
        }
        .subject-bar .header-buttons .header-button.inbox {
            border: 1px solid #909191;
            background: rgba(144, 145, 145, 0.2);
        }
        .subject-bar .header-buttons .header-button.inbox svg, .subject-bar .header-buttons .header-button.inbox p {
            color: #909191;
        }
        .subject-bar .header-buttons .header-button.inbox button {
            color: #909191;
        }
        .subject-bar .header-buttons .header-button.team {
            border: 1px solid #4285F4;
            background: rgba(66, 133, 244, 0.2);
        }
        .subject-bar .header-buttons .header-button.team svg, .subject-bar .header-buttons .header-button.team p {
            color: #4285F4;
        }
        .subject-bar .header-buttons .header-button.team button {
            color: #4285F4;
        }

        .conversation {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .mail-area {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex: 1;
            overflow: auto;
            padding: 10px;
            background: #f7f8f9;
        }

        .content-wrapper {
            display: flex;
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #ffffff;
            margin: 2rem auto;
        }

        .mail-content-wrapper {
            color: #909191;
            font-size: 13px;
            font-weight: normal;
            padding: 0 10px;
            flex: 1;
        }
        .mail-content-wrapper p {
            margin: 0;
        }
        .mail-content-wrapper .contact-info {
            justify-content: space-between;
        }
        .mail-content-wrapper .contact-info .contact-name {
            color: #212223;
            font-size: 13px;
            font-weight: 600;
        }

        .name {
            color: #212223;
        }

        .reaction-buttons {
            padding-top: 20px;
        }
        .reaction-buttons input, .reaction-buttons button {
            color: #4285F4;
            border: 1px solid #E4E8EB;
            padding: 12px;
            border-radius: 3rem;
            margin-right: 10px;
        }

        .send {
            background: #4285F4;
            padding: 14px 20px;
            font-size: 12px;
            color: white;
            border-radius: 4px;
        }

        .bottom-icons svg {
            width: 16px;
            height: 16px;
        }

        .bottom-button-wrapper {
            display: flex;
            justify-content: space-between;
        }

        .mail-break {
            width: calc(100% + 58px);
            margin-left: -40px;
            opacity: 0.4;
        }/*# sourceMappingURL=style.css.map */


        /*login page code here*/

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -45%);
            width: 30rem;
            padding: 1.5rem;
            box-sizing: border-box;
            border: 1px solid #dadce0;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }

        .box h2 {
            padding: 8px 12px;
            text-align: center;
            color: #202124;
            font-size: 24px;
            font-weight: 400;
        }

        .inbox{
            padding: 4px 8px;
            outline: none;
            border: none;

        }

        .box .logo
        {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-bottom: 8px;
        }

        .box p {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 1px;
            line-height: 1.5;
            margin-bottom: 24px;
            text-align: center;
        }

        .box .inputBox {
            position: relative;
        }

        .box .inputBox input {
            width: 93%;
            padding: 12px 8px;
            font-size: 1rem;
            letter-spacing: 0.062rem;
            margin-bottom: 1.875rem;
            border: 1px solid #ccc;
            background: transparent;
            border-radius: 4px;
        }

        .box .inputBox label {
            position: absolute;
            top: 0;
            left: 10px;
            padding: 0.625rem 0;
            font-size: 1rem;
            color: gray;
            pointer-events: none;
            transition: 0.5s;
        }

        .box .inputBox input:focus ~ label,
        .box .inputBox input:valid ~ label,
        .box .inputBox input:not([value=""]) ~ label {
            top: -1.125rem;
            left: 10px;
            color: #1a73e8;
            font-size: 0.75rem;
            background-color: #fff;
            height: 10px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .box .inputBox input:focus {
            outline: none;
            border: 2px solid #1a73e8;
        }

        .box input[type="submit"] {
            border: none;
            outline: none;
            color: #fff;
            background-color: #1a73e8;
            padding: 0.625rem 1.25rem;
            cursor: pointer;
            border-radius: 0.312rem;
            font-size: 1rem;
            display: block;
            margin: 0 auto;
        }

        .box input[type="submit"]:hover {
            background-color: #287ae6;
            box-shadow: 0 1px 1px 0 rgba(66,133,244,0.45), 0 1px 3px 1px rgba(66,133,244,0.3);
        }

        p strong a {
            text-decoration: none;
            padding: 2px 4px;
            color: #287ae6;
        }
        p strong:hover {
            text-decoration: underline;
        }

        .logo .logo-name {
            font-size: 2.5rem;
            margin: 0 auto;
        }

        .logo-name{
            font-size: 1.5rem;
        }

        .logo-name span{
            color: #4285F4;
        }
    </style>
</head>
<body>
    <div class="tab-bar">
        <div class="left">
            <div class="logo-wrapper">
                <p class="logo-name">Anon<span>Mail</span></p>
            </div>
            <?php
                $login = false;

                if(isset($_SESSION['logged'])) {
                    $login = true;
                }
            ?>
            <?php if ($login) :?>
                <form method="post" action="/inbox" class="search-area">
                    <input type="text" placeholder="Search" name="search"/>
                    <button>
                        <input type="submit" value="">
                        <svg
                            width="20"
                            height="20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M12.258 11.667h.659l4.158 4.166-1.242 1.242-4.166-4.158v-.659l-.225-.233a5.393 5.393 0 0 1-3.525 1.308 5.417 5.417 0 1 1 5.416-5.416 5.393 5.393 0 0 1-1.308 3.525l.233.225zm-8.091-3.75a3.745 3.745 0 0 0 3.75 3.75 3.745 3.745 0 0 0 3.75-3.75 3.745 3.745 0 0 0-3.75-3.75 3.745 3.745 0 0 0-3.75 3.75z"
                                fill="#909191"
                                opacity=".8"
                            />
                        </svg>
                    </button>
                </form>
            <?php endif;?>
        </div>
        <div class="right">
            <button>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4H4V0H0V4ZM6 16H10V12H6V16ZM4 16H0V12H4V16ZM0 10H4V6H0V10ZM10 10H6V6H10V10ZM12 0V4H16V0H12ZM10 4H6V0H10V4ZM12 10H16V6H12V10ZM16 16H12V12H16V16Z" fill="#909191"/>
                </svg>
            </button>
            <button>
                <?php if($login) : ?>
                    <a href="/profile"> <img src="https://randomuser.me/api/portraits/men/34.jpg" alt=""></a>
                <?php else : ?>
                    <a href='/' style='text-decoration: none'>Log in</a>
                <?php endif;?>
            </button>
            <?php if($login) : ?>
                <button>
                    <a href="/destroy" style="text-decoration: none;color: inherit">Log out</a>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <div class="page-content">


