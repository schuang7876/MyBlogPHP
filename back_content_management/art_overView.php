<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/2
 * Time: 20:52
 */
include_once '../database.php';
@$id=$_GET['id'];
@mysqli_query($con,"SET NAMES utf8");
$get_art="SELECT title,contents,date_posted FROM posts WHERE id='{$id}'";
$result=mysqli_query($con,$get_art);
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
</div>
<div id="main">
    <div id="article">
            <article>
                <?php if(isset($id)){
                    $art_row=mysqli_fetch_array($result);
                    echo "<h1>".$art_row[0]."</h1>";
                    echo " <div class=\"info\">
                <span class=\"info-time\">".$art_row[2]."</span></div>";
                    echo "<p>".$art_row[1]."</p>"; }
                else{
                    echo "提交失败";
                }
                mysqli_close($con);
                ?>
            </article>
    </div>
</div>
</body>
</html>