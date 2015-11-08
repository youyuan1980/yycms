<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-4-25
 * Time: 下午1:26
 */
session_start();
if(!isset($_SESSION["userid"]))
{
    echo "<script>alert('请重新登陆');location.href='login.php'</script>";
}
include_once('dal/config.php');
