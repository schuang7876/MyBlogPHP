<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/1
 * Time: 11:06
 */
require_once 'admin.php';
include_once 'CMS_QUERY.php';
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
    <a href="#">羊驼君</a>
</div>
<div id="aside">
    <div class="aside">
        <div>
            <div class="aside_button">页面</div>
            <ul class="pre_menu in">
                <li><a href="editor.php">写文章</a> </li>
                <li>回收站</li>
                <li>修改</li>
            </ul>
        </div>
        <div>
            <div class="aside_button">编辑</div>
            <ul class="pre_menu in">
                <li>写文章</li>
                <li>回收站</li>
                <li>修改</li>
            </ul>
        </div>
    </div>
</div>
<div id="main">
    <div id="content">
        <table class="art_table" border="1" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>内容</th>
                <th>日期</th>
            </tr>
            <?php

            while ($art_row=mysqli_fetch_array($art_list)){
                $id=$art_row['id'];
                ?>
                <tr>
                    <td><?php echo $id?></td>
                    <td><a href="art_overView.php?id=<?php echo $id; ?>"><?php echo $art_row[1]?></a></td>
                    <td><?php echo $art_row[2]?></td>
                    <td><a href="art_reviser.php?id=<?php echo $id?>">编辑</a>
                        <?php if($art_row['state']!='through'){ ?>
                    <button id="<?php echo $id;?>" class="through">删除</button>
                        <?php }
                        else{
                            ?><button id="<?php echo $id;?>" class="delete">永久删除</button>
                    </td>
                </tr>
            <?php }}
            mysqli_close($con);
            ?>
        </table>
    </div>
</div>
<script src="CMS_JS/cms_art_ajax.js"></script>
<script src="CMS_JS/aside_button.js"></script>
</body>
</html>