<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("User.php");
	$action=isset($_REQUEST["action"])?$_REQUEST["action"]:'';
	if($action!="")
	{
		$u=new User($DB);
		switch($action)
		{
		 	case "list":
				$username=isset($_REQUEST["UserName"])?$_REQUEST["UserName"]:'';
				$page=isset($_REQUEST["PageIndex"])?$_REQUEST["PageIndex"]:1;
				$pagesize=isset($_REQUEST["pagesize"])?$_REQUEST["pagesize"]:5;
				$data=$u->GetUserList($username,$page,$pagesize);
				echo json_encode($data);
				break;
			case "del":
				$userid=isset($_REQUEST["userid"])?$_REQUEST["userid"]:'';
				$u->DelUser($userid);
				break;
			case "restpassword":
				$userid=isset($_REQUEST["userid"])?$_REQUEST["userid"]:'';
				$u->RestPassowrd($userid);
				break;
    		default:break;
   		}
	}
?>
