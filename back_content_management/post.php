<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/3/27
 * Time: 21:53
 */
include_once '../database.php';
include_once 'art_function.php';
@mysqli_query($con,"SET NAMES utf8");
$post=$_POST['post'];
$title=$_POST['title'];
/*$re="/(?!=<img[\w\W]*?)src(?==\"[\s\S]*?>)/";*/
//$post=preg_replace($re,"data-src",$n_post);
date_default_timezone_set('PRC');
$time=date("Y-m-d H:i:s");
$new_title=htmlspecialchars(addslashes($title));
$new_post=str_replace(array("'","#"),array("''","\#"),$post);
$state=1;
$submit="INSERT INTO posts (title,contents,date_posted,state) VALUES ('$new_title','$new_post','$time','1')";
$result=mysqli_query($con,$submit)
OR die(mysqli_error($con));
if(isset($result)&&$result){
    header('Location:art_main.php');
}
else{
    echo post_message(1);
}
mysqli_close($con);