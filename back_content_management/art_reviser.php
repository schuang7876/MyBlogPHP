<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/1
 * Time: 11:06
 */
require 'admin.php';
include_once '../database.php';
@$get=$_GET['id'];
@mysqli_query($con,"SET NAMES utf8");
$art_query="SELECT title,contents FROM posts WHERE id='{$get}'";
$art_list=mysqli_query($con,$art_query) or die(mysqli_error($con));
$row=mysqli_fetch_assoc($art_list);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Blog</title>
    <link type="text/css" rel="stylesheet" href="CMS_CSS/cms_common.css">
</head>
<body>
<div class="head_con">
    <a href="art_main.php">羊驼君</a>
</div>
<div id="main">
    <form name="article" action="art_update.php" method="post">
        <input name="title" value="<?php echo $row['title'] ?>">
        <div id="div1">
            <p><?php echo $row['contents'] ?></p>
        </div>
        <input type="hidden" name="id" value="<?php echo $get; ?>">
        <input type="hidden" name="action" value="reviser">
        <input type="hidden" id="post" name="post">
        <button id="submit" type="submit">提交</button>
    </form>
</div>
<script src="../wangEditor-master/release/wangEditor.js"></script>
<script src="CMS_JS/postData.js"></script>
</body>
</html>