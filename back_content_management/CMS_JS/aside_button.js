(
    function () {
        var aside_button=document.getElementsByClassName('aside_button');
        for(var i=0;i<aside_button.length;i++) {
            aside_button[i].onclick=(function () {
                return function () {
                    var pre_menu=this.parentElement.getElementsByTagName('ul');
                    var state=pre_menu[0].getAttribute('class');
                    switch (state){
                        case 'pre_menu out':
                            pre_menu[0].setAttribute('class','pre_menu in');
                            break;
                        case 'pre_menu in':
                            pre_menu[0].setAttribute('class','pre_menu out');
                            break;
                    }
                }
                }
            )(i)
        }
    }
)();