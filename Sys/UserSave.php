<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/User.php");
	$flag=0;
	$u=new User($DB);
	$action=isset($_POST["action"])?$_POST["action"]:'';
	if (!empty($action)) {
		switch ($action) {
			case 'add':
				$userid=isset($_POST["userid"])?$_POST["userid"]:'';
				$username=isset($_POST["username"])?$_POST["username"]:'';
				$chkroles=isset($_POST["chkroles"])?$_POST["chkroles"]:'';
				$flag=$u->AddUser($userid,$username,$chkroles);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'useredit.php\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'useredit.php\'</script>';
				}
				break;
			case 'edit':
				$userid=isset($_POST["userid"])?$_POST["userid"]:'';
				$username=isset($_POST["username"])?$_POST["username"]:'';
				$chkroles=isset($_POST["chkroles"])?$_POST["chkroles"]:'';
				$flag=$u->EditUser($userid,$username,$chkroles);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'useredit.php?userid='.$userid.'&username='.$username.'\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'useredit.php?userid='.$userid.'&username='.$username.'\'</script>';
				}
				break;
			case 'changpwd':
				$userid=$_SESSION["userid"];
				$oldpwd=isset($_POST["oldpwd"])?$_POST["oldpwd"]:'';
				$userpwd=isset($_POST["userpwd"])?$_POST["userpwd"]:'';
				$flag=$u->ChangePwd($userid,$oldpwd,$userpwd);
				echo '<script>window.alert(\''.$flag.'\');location.href=\'updatepassword.php\'</script>';
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