<?php 
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/User.php");
	$flag=0;
	$u=new User($DB);
	$action=isset($_POST["action"])?$_POST["action"]:''; 
	$userid=isset($_POST["userid"])?$_POST["userid"]:''; 
	$username=isset($_POST["username"])?$_POST["username"]:''; 
	$chkroles=isset($_POST["chkroles"])?$_POST["chkroles"]:''; 
	if (!empty($action)) {
		switch ($action) {
			case 'add':
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
			default:
				echo '<script>window.alert(\'缺少参数\');location.href=\'useredit.php\'</script>';
				break;
		}
	}
	else{
		# code...
		echo '<script>window.alert(\'缺少参数\')</script>';
	}

 ?>