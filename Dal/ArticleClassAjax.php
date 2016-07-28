<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("ArticleClass.php");
	$action=isset($_REQUEST["action"])?$_REQUEST["action"]:'';
	if($action!="")
	{
		$u=new ArticleClass($DB);
		switch($action)
		{
		 	case "list":
				$title=isset($_REQUEST["title"])?$_REQUEST["title"]:'';
				$pid=isset($_REQUEST["pid"])?$_REQUEST["pid"]:'-1';
				$page=isset($_REQUEST["PageIndex"])?$_REQUEST["PageIndex"]:1;
				$pagesize=isset($_REQUEST["pagesize"])?$_REQUEST["pagesize"]:5;
				$data=$u->GetChildArticleClassListByPage($pid,$title,$page,$pagesize);
				echo json_encode($data);
				break;
			case "del":
				$classid=isset($_REQUEST["id"])?$_REQUEST["id"]:'';
				$u->DelArticleClass($classid);
				break;
    		default:break;
   		}
	}
?>
