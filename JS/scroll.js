window.onscroll=function () {
    var scorll1=document.getElementById('scroll');
    if(document.body.scrollTop>500){
        scorll1.setAttribute('class','appear');
    }
    else {
        scorll1.setAttribute('class','disappear');
    }
    scorll1.onclick=function () {
        document.body.scrollTop=0;
    }
};