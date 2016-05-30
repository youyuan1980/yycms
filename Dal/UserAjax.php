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
					$page=isset($_REQUEST["page"])?$_REQUEST["page"]:1; 
					$pagesize=20;     							
					$data=$u->GetUserList($username,$page,$pagesize);
					echo json_encode($data);
					break;
    		default:break;
   		}
	}
?>
