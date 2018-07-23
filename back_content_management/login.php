<?php
session_start();
if (isset($_COOKIE['username']) && isset($_COOKIE['uid'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['uid'] = $_COOKIE['uid'];
    header('Location:art_main.php');
}
    else {
        ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <link rel="stylesheet" href="CMS_CSS/login.css">
            <title>羊驼君——登录</title>
        </head>
        <body>
        <div class="pre_part">
            <div class="main_part">
                <p>用户名：</p>
                <input id="username" type="text">
                <p>密码：</p>
                <input id="password" type="password">
                <div id="submit">登录</div>
            </div>
        </div>
        <script type="text/javascript" src="CMS_JS/md5.js"></script>
        <script type="text/javascript" src="CMS_JS/encode.js"></script>
        <script type="text/javascript" src="CMS_JS/login.js"></script>
        </body>
        </html>
        <?php
    }
    ?>