<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/Article.php");
	$action=isset($_REQUEST["action"])?$_REQUEST["action"]:'';
	if($action!="")
	{
		$u=new Article($DB);
		switch($action)
		{
		 	case "list":
				$title=isset($_REQUEST["title"])?$_REQUEST["title"]:'';
				$classid=isset($_REQUEST["classid"])?$_REQUEST["classid"]:'';
				$page=isset($_REQUEST["PageIndex"])?$_REQUEST["PageIndex"]:1;
				$pagesize=isset($_REQUEST["pagesize"])?$_REQUEST["pagesize"]:5;
				$data=$u->GetArticleList($title,$classid,$page,$pagesize);
				echo json_encode($data);
				break;
			case "del":
				$id=isset($_REQUEST["id"])?$_REQUEST["id"]:'';
				$u->DelArticle($id);
				break;
    		default:break;
   		}
	}
 ?>