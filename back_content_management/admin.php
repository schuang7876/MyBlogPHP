<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/5/5
 * Time: 14:12
 */
include "../database.php";
session_start();
if(!$_SESSION){
    if(isset($_COOKIE['username'])&&isset($_COOKIE['uid'])){
        $_SESSION['username']=$_COOKIE['username'];
        $_SESSION['uid']=$_COOKIE['uid'];
    }
    else{
        header('Location:login.php');
    }
}