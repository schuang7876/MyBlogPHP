<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/12
 * Time: 21:08
 */
include_once 'art_function.php';
include_once '../database.php';
@mysqli_query($con,"SET NAMES utf8");
$username=addslashes($_POST['username']);
$password=$_POST['password'];
@$user="SELECT * FROM userinfo WHERE m_username='{$username}'";
@$result=mysqli_query($con,$user);
mysqli_close($con);
@$row=mysqli_fetch_assoc($result);
        if(!isset($username)||!isset($password)){
            echo post_message(2);
            exit();
            }
        else{
            if($password&&$row['m_password']&&encode($password)==$row['m_password']){
                session_start();
                $_SESSION['username']=$username;
                setcookie('uid',$row['id'],time()+(60*60*1));
                setcookie('username',$row['m_username'],time()+(60*60*1));
                echo post_message(0);
            }
            else{
                echo post_message(1);
                exit();
            }
            }
function encode($pas){
    $new_str=md5($pas);
    $new_str=str_replace($new_str[2],'',$new_str);
    $new_str=str_replace($new_str[15],'',$new_str);
    return str_replace($new_str[2],'',$new_str);
}



