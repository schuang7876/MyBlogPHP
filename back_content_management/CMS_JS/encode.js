function encode(password) {
    var len=password.length;
    var stri="";
    if(len<=1){
        return "输入过小！";
    }
    if ((len-1)%2===0){
        for(var i=0;i<(len-1)/2;i++){
            // stri+=hex_md5(password[i]+password[len-1-i]);
            stri+=(password[i]+password[len-1-i]);
        }
        stri+=password[(len-1)/2];
    }
    else {
        for(var j=0;j<(len-1)/2;j++){
            // stri+=hex_md5(password[j]+password[len-1-j]);
            stri+=(password[j]+password[len-1-j]);
        }
    }
    var pas=hex_md5(stri);
    return pas.slice(0,5)+pas.slice(7,16)+pas.slice(17);
}