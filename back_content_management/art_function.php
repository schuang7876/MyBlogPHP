<?php
/**
 * Created by PhpStorm.
 * User: Wong
 * Date: 2018/4/7
 * Time: 19:00
 */
function post_message($status_num){
    $result=array(
        'status_num'=>$status_num
    );
    $json=json_encode($result);
    return $json;
}
function post_url($url){
    $result=array(
        'url'=>$url
    );
    $json=json_encode($result);
    return $json;
}