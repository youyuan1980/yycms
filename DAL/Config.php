<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-4-12
 * Time: 下午1:36
 */
include_once('mysqldb.php');
$config=array(
    "Server"=>"localhost", //连接服务器名
    "UserID"=>"yycms",     //用户名
    "UserPwd"=>"123",     //密码
    "DataBase"=>"yycms"   //数据库名
);
$DB = new MySqlDB($config);
