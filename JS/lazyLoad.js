var imgs=document.getElementsByTagName('img');
var viewHeight = document.documentElement.clientHeight;
function lazyLoad() {
    for (var i=0;i<imgs.length;i++) {
        if(!imgs[i].getAttribute('data-src')){
            return;
        }
        var x=viewHeight-imgs[i].getBoundingClientRect().top;
        if (x>0&&imgs[i].getBoundingClientRect().bottom>0) {
            imgs[i].src=imgs[i].getAttribute('data-src');
            imgs[i].removeAttribute('class');
            imgs[i].removeAttribute('data-src');
        }
    }
}
lazyLoad();
document.addEventListener('scroll', lazyLoad);