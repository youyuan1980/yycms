<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/Article.php");
	$u=new Article($DB);
	$action=isset($_POST["action"])?$_POST["action"]:'';
	$classid=isset($_POST["classid"])?$_POST["classid"]:'';
	$id=isset($_POST["id"])?$_POST["id"]:'';
	$title=isset($_POST["title"])?$_POST["title"]:'';
	$keyword=isset($_POST["keyword"])?$_POST["keyword"]:'';
	$linkurl=isset($_POST["linkurl"])?$_POST["linkurl"]:'';
	$source=isset($_POST["source"])?$_POST["source"]:'';
	$author=isset($_POST["author"])?$_POST["author"]:'';
	$titleimage=isset($_POST["titleimage"])?$_POST["titleimage"]:'';
	$isimgnews=isset($_POST["isimgnews"])?$_POST["isimgnews"]:'0';
	if ($isimgnews=="on") {
		$isimgnews=1;
	}
	$istop=isset($_POST["istop"])?$_POST["istop"]:'0';
	if ($istop=="on") {
		$istop=1;
	}
	$ishot=isset($_POST["ishot"])?$_POST["ishot"]:'0';
	if ($ishot=="on") {
		$ishot=1;
	}
	$content=isset($_POST["editor"])?$_POST["editor"]:'';
	$userid=$_SESSION["userid"];
	if (!empty($action)) {
		switch ($action) {
			case 'add':
				$flag=$u->AddArticle($title,$classid,$keyword,$linkurl,$source,$author,$titleimage,$isimgnews,$istop,$ishot,$content,$userid);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'Articleedit.php?classid='.$classid.'\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'Articleedit.php?classid='.$classid.'\'</script>';
				}
				break;
			case 'edit':
				$flag=$u->EditArticle($id,$title,$keyword,$linkurl,$source,$author,$titleimage,$isimgnews,$istop,$ishot,$content,$userid);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'Articleedit.php?classid='.$classid.'&id='.$id.'\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'Articleedit.php?classid='.$classid.'&id='.$id.'\'</script>';
				}
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