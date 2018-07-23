<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/3/13
 * Time: 22:24
 */
include_once 'database.php';
$id=$_GET['id'];
$set_name="SET NAMES UTF8";
@mysqli_query($con,"SET NAMES utf8");
$get_art="SELECT * FROM posts WHERE id='{$id}'";
$art=mysqli_query($con,$get_art);
mysqli_close($con);
$art_row=mysqli_fetch_array($art);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keyword" content="羊驼君、个人博客、科技、学习、技术">
    <meta name="description" content="羊驼君，走歪的电气工程师，业余博主，分享生活，分享科技，分享游戏">
    <link rel="icon" href="http://www.wongyiyu.com/logo.png">
    <link rel="icon" href="http://www.wongyiyu.com/logo.png">
    <title>羊驼君//伪文青原创博客</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
</head>
<body>
<div id="header">
    <aside id="aside" class="nav_activate">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="">Article</a></li>
            <li><a href="about.html">About Me</a> </li>
        </ul>
    </aside>
</div>
<div class="head_con">
    <div id="main_title"><a href="/">羊驼君</a></div>
</div>
<div id="main">
    <div id="back_img"></div>
    <div id="main_art">
            <article>
            <?php if($id){
            echo "<div id='art_title'> <h1>".$art_row['title']."</h1><div class=\"info\">
                <span class=\"info-time\">".$art_row['date_posted']."</span></div></div>";
            echo "<div class='para'>".$art_row['contents']."</div>"; }
            else{
                header('Location:fault.html');
            }
            ?>
            </article>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>