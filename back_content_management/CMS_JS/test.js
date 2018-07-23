var test1=document.getElementById('test');
var button1=document.getElementById('test1');
button1.onclick=function () {
    var input1=document.getElementById('text').value.toString();
    var enco=encode(input1);
    test1.innerHTML=enco;
    alert(enco);
}

