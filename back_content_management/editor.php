<?php
require_once 'admin.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="CMS_CSS/editor.css">
    <title>羊驼君</title>
</head>
<body>
<div class="editor">
<form action="post.php" method="post">
    <input id="title" name="title" autocomplete="off">
    <div id="div1"></div>
    <input type="hidden" id="post" name="post">
    <button type="submit" id="submit">提交</button>
    </form>
</div>
<script src="../wangEditor-master/release/wangEditor.js"></script>
<script src="CMS_JS/postData.js"></script>
</body>
</html>