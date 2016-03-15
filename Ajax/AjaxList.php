<?php 
include_once('../DAL/AdminPageBase.php');
$action = $_GET["action"];
$pageindex = $_GET["pageindex"]-1;
$pagesize = $_GET["pagesize"];
if (isset($action)&&isset($pagesize)&&isset($pageindex)) {
	switch ($action) {
		case 'userlist':
			include_once("../DAL/User.php");
			$u = new User($DB);
			$userlist = $u->GetUserList('',$pageindex,$pagesize);
			echo json_encode($userlist,JSON_UNESCAPED_UNICODE);
			break;
		
		default:
			# code...
			break;
	}
}
else
{
	echo 'error';
}
?>