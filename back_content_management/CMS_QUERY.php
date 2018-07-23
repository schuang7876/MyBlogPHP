<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/3
 * Time: 20:18
 */
include_once '../database.php';
@mysqli_query($con,"SET NAMES utf8");
$art_query="SELECT id,title,date_posted,state FROM posts ORDER BY date_posted DESC";
$art_list=mysqli_query($con,$art_query)
or die(mysqli_error($con));
mysqli_close($con);