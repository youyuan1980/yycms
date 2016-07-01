<?php 
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/User.php");
	$u=new User($DB);
	$action=isset($_POST["action"])?$_POST["action"]:''; 
	$userid=isset($_POST["userid"])?$_POST["userid"]:''; 
	$username=isset($_POST["username"])?$_POST["username"]:''; 
	$chkroles=isset($_POST["chkroles"])?$_POST["chkroles"]:''; 
	if (!empty($action)) {
		switch ($action) {
			case 'add':
				echo $u->AddUser($userid,$username,$chkroles);
				break;
			case 'edit':
				break;
			default:
				echo '<script>window.alert(\'缺少参数\')</script>';
				break;
		}
	}
	else{
		# code...
		echo '<script>window.alert(\'缺少参数\')</script>';
	}

 ?>