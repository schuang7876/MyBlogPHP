<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/9
 * Time: 21:36
 */
include 'art_function.php';
$name=$_FILES['myfilename']['name'];
$ftp_con=ftp_connect('syu4332740001.my3w.com') or die("连接服务器错误");
ftp_login($ftp_con,"syu4332740001","LEArn31415926535");
ftp_pasv($ftp_con,true);
ftp_chdir($ftp_con,"/htdocs/image/");
ftp_put($ftp_con,$name,$_FILES['myfilename']['tmp_name'],FTP_BINARY);
$list=ftp_nlist($ftp_con,"/htdocs/image/");
if(in_array('/htdocs/image/'.$name,$list)){
    echo post_url('../image/'.$name);
}
else{
    echo "上传错误";
}
ftp_close($ftp_con);