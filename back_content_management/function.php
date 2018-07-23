<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/6
 * Time: 0:38
 */
include '../database.php';
include 'art_function.php';
$action=$_GET['action'];
$id=$_GET['id'];
mysqli_query($con,SET_NAME);
if($action=='through'){
    $update2="UPDATE posts SET state='through'WHERE id='{$id}'";
    $result=mysqli_query($con,$update2) or die(mysqli_error($con));
}
mysqli_close($con);