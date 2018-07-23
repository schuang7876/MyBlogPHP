var button=document.getElementById('submit');
var xhr;
var user=document.getElementById('username');
var pass=document.getElementById('password');
button.onclick=login;
document.onkeydown=function(ev){
    switch (ev.key){
        case "Enter":
            login();
            break;
    }
};
function login() {
    var username=user.value;
    var pass_num=pass.value;
    var password=encode(pass_num);
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }
    else {
        xhr=new ActiveXObject('Microsoft.XMLHTTP');
    }
    xhr.open('POST','session.php',true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send('username='+username+'&password='+password);
    xhr.onreadystatechange=function () {
        if(xhr.readyState===4&&xhr.status>=200&&xhr.status<300||xhr.status===304){
            var result=xhr.responseText;
            var data=JSON.parse(result);
            switch (data.status_num){
                case 0:alert('登录成功！');
                    window.location.href='art_main.php';
                    break;
                case 1:
                    alert("账号或密码错误");
                    break;
                case 2:
                    alert("数据库连接错误！");
                    break;
                case 3:
                    window.location.href="art_main.php";
            }
        }
    };
}
function insertAfter(newEl, targetEl)
{
    var parentEl = targetEl.parentNode;

    if(parentEl.lastChild == targetEl)
    {
        parentEl.appendChild(newEl);
    }else
    {
        parentEl.insertBefore(newEl,targetEl.nextSibling);
    }
}