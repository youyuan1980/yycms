<?php
ini_set('display_errors','On');
session_start();
if(!isset($_SESSION["userid"]))
{
	//$_SESSION["userid"]='admin';
	echo "<script>alert('请重新登陆');location.href='login.php'</script>";
}
include_once('Config.php');
?>
