var button=document.getElementsByTagName('button');
    for(var i=0;i<button.length;i++){
        button[i].onclick=(function () {
            return function () {
                var id=this.getAttribute('id');
                var clas=this.getAttribute('class');
                var xhr;
                if(window.XMLHttpRequest){
                    xhr=new XMLHttpRequest();
                }
                else {
                    xhr=new ActiveXObject('Microsoft.XMLHTTP');
                }
                xhr.onreadystatechange=function () {
                    if(xhr.readyState===4&&xhr.status>=200&&xhr.status<300||xhr.status===304){
                        var result=xhr.responseText;
                        var data=JSON.parse(result);
                        switch (data.status_num){
                            case 0:alert('删除成功！');
                                window.location.reload();
                            break;
                            case 1:alert('永久删除成功！');
                                window.location.reload();
                            break;
                        }
                    }
                };
                xhr.open('POST',"art_update.php",true);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var msg="是否删除？";
                if(confirm(msg)===true){
                    xhr.send('id='+id+'&action='+clas);
                }
            }
        })(i);
    }