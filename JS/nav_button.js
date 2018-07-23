var button=document.getElementById('nav_button');
var nav=document.getElementById('aside');
button.onclick=function () {
    var state=nav.getAttribute('class');
    switch (state){
        case 'nav_deactivate':
            nav.setAttribute('class','nav_activate');
            break;
        case 'nav_activate':
            nav.setAttribute('class','nav_deactivate');
            break;
    }
};