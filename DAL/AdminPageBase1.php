<?php
header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors','On');
session_start();
if(!isset($_SESSION["userid"]))
{
	$_SESSION["userid"]='admin';
	$_SESSION["username"]='超级管理员';
	echo "<script>alert('请重新登陆');location.href='login.php'</script>";
}
?>