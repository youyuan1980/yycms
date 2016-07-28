<?php
	include_once('../Dal/AdminPageBase.php');
	include_once("../Dal/ArticleClass.php");
	$flag=0;
	$u=new ArticleClass($DB);
	$action=isset($_POST["action"])?$_POST["action"]:'';
	$classid=isset($_POST["classid"])?$_POST["classid"]:'';
	$title=isset($_POST["title"])?$_POST["title"]:'';
	$pid=isset($_POST["pid"])?$_POST["pid"]:'-1';
	if (!empty($action)) {
		switch ($action) {
			case 'add':
				$flag=$u->AddArticleClass($title,$pid);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'ArticleClass_edit.php?pid='.$pid.'\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'ArticleClass_edit.php?pid='.$pid.'\'</script>';
				}
				break;
			case 'edit':
				$flag=$u->EditArticleClass($title,$classid);
				if ($flag==0) {
					# code...
					echo '<script>window.alert(\'保存成功\');location.href=\'ArticleClass_edit.php?pid='.$pid.'&classid='.$classid.'\'</script>';
				}
				else
				{
					echo '<script>window.alert(\'保存失败\');location.href=\'ArticleClass_edit.php?pid='.$pid.'&classid='.$classid.'\'</script>';
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