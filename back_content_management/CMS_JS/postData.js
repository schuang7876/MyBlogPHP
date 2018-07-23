var E = window.wangEditor;
var editor = new E('#div1');
editor.customConfig.uploadImgServer = '../back_content_management/upload.php';
editor.customConfig.uploadFileName='myfilename';
editor.customConfig.uploadImgHooks={
    customInsert: function (insertImg, result, editor) {
        var url = result.url;
        insertImg(url);
    }
};
editor.create();
var submit=document.getElementById('submit');
submit.onclick=function () {
    var article=editor.txt.html();
    var post=document.getElementById('post');
        post.setAttribute('value',article);
    };