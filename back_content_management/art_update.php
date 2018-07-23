<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/4
 * Time: 20:25
 */
include_once '../database.php';
include 'art_function.php';
@mysqli_query($con,"SET NAMES utf8");
@$action=$_POST['action'];
$id=$_POST['id'];
if($action=='reviser'){
    $title=$_POST['title'];
    $contents=$_POST['post'];
    $new_title=htmlspecialchars(addslashes($title));
    $new_contents=addslashes($contents);
    $update1="UPDATE posts SET title='{$new_title}',contents='{$new_contents}' WHERE id='{$id}'";
    $result=mysqli_query($con,$update1) or die(mysqli_error($con));
    header('Location:art_main.php');
}
else if($action=='delete'){
    $update3="DELETE FROM posts WHERE id='{$id}'";
    $result=mysqli_query($con,$update3) or die($con);
    if($result&isset($result)){
        echo post_message(1);
    }
}
else if($action=="through"){
    $update2="UPDATE posts SET state='through'WHERE id='{$id}'";
    $result=mysqli_query($con,$update2) or die(mysqli_error($con));
    if($result&isset($result)){
       echo post_message(0);
    }
}
mysqli_close($con);