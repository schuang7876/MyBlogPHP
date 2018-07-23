<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/3/12
 * Time: 20:23
 */
@include_once 'database.php';
if(empty(@$_GET)){
    @$page=1;
}
else{
    @$page=$_GET['page'];
}
@$pageSize=5;
@mysqli_query($con,"SET NAMES utf8");
@$query="SELECT * FROM posts WHERE state<>'though' ORDER BY date_posted DESC LIMIT ".(($page-1)*$pageSize).", $pageSize";
@$num="SELECT COUNT(state) FROM posts WHERE state<>'through'";
@$result=mysqli_query($con,$query);
@$total=mysqli_fetch_array(mysqli_query($con,$num));
@mysqli_close($con);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keyword" content="羊驼君、个人博客、科技、学习、技术">
    <meta name="description" content="羊驼君，走歪的电气工程师，业余博主，分享生活，分享科技，分享游戏">
    <title>羊驼君//伪文青原创博客</title>
    <link rel="icon" href="http://www.wongyiyu.com/logo.png">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
        <div id="scroll" class="disappear">
            <i class="fa fa-arrow-up fa-2x"></i>
        </div>
<div id="main">
    <div class="con_header">
        <h1 id="main_title">
            <a href="/">羊驼君</a>
        </h1>
    </div>
<article>
            <?php
            while ($row=@mysqli_fetch_assoc($result)) {
                    ?>
                    <section>
                        <h1>
                            <a href="<?php echo $row['id'] ?>.html"><?php echo $row['title']; ?></a>
                        </h1>
                        <div class="info"><?php echo $row['date_posted']; ?></div>
                        <div class="para"><?php
                            echo remove_img(take_contents($row['contents']));
                            echo "<p>......</p>"
                            ?></div>
                        <div id="more">
                            <span class="more">
                            <a href="<?php echo $row['id'] ?>.html">阅读更多</a>
                            </span>
                        </div>
                    </section>
                    <?php
            }
                ?>
    <div id="page">
        <?php
        $total_num=ceil($total[0]/$pageSize);
        if($page>1){
            echo "<span class='page'><a href='page".($page-1)."'>上一页</a></span>";
        }
        if($page<$total_num){
            echo "<span class='page'><a href='page".($page+1)."'>下一页</a></span>";
        }
        ?>
    </div>
</article>
</div>
        <?php
        include "footer.php";
        ?>
<script src="JS/scroll.js"></script>
</body>
</html>
<?php
function take_contents($contents){
    $s="/<p>(?:(?!<\/p>)[\s\S])+<\/p>/";
    if(mb_strlen($contents,"UTF8")>=150){
        if(preg_match($s,$contents,$match)){
            if(mb_strlen($match[0],"UTF8")>=150){
                return $match[0];
            }
            else{
                return mb_substr($contents,0,150,"UTF-8");
            }
        }
        else{
            return $contents;
        }
    }
    else{
        return $contents;
    }
}
function take_first_img($img){
    $s="/<img[\s\S]*?>/";
    preg_match($s,$img,$match);
    return $match[0];
}
function remove_img($img){
    $s="/<img[\s\S]*?>/";
    return preg_replace($s,'',$img);
}