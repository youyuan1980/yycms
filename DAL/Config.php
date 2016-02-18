<?php
include_once('mysqldb.php');
$config=array(
    "Server"=>"localhost", //连接服务器名
    "UserID"=>"root",     //用户名
    "UserPwd"=>"123456",     //密码
    "DataBase"=>"yycms"   //数据库名
);
$DB = new MySqlDB($config);
