<?php
    include_once('../Dal/AdminPageBase.php');
    include_once('../Dal/ArticleClass.php');
    include_once('../Dal/Article.php');
    $articleclass=new ArticleClass($DB);
    $article=new Article($DB);
    $classid=isset($_GET["classid"])?$_GET["classid"]:"";
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $title="";
    $keyword="";
    $linkurl="";
    $source="";
    $author="";
    $titleimage="";
    $isimgnews="0";
    $istop="0";
    $ishot="0";
    $content="";
    if (strlen($id)>0) {
        $dt=$article->GetArticle($id);
        foreach ($dt as $row) {
            $title=$row["TITLE"];
            $keyword=$row["KEYWORD"];
            $linkurl=$row["LINKURL"];
            $source=$row["SOURCE"];
            $author=$row["AUTHOR"];
            $titleimage=$row["TITLEIMAGE"];
            $isimgnews=$row["ISIMGNEWS"];
            $istop=$row["ISTOP"];
            $ishot=$row["ISHOT"];
            $content=$row["CONTENT"];
            breka;
        }
    }

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>无标题页</title>
    <link href="../Css/css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        // $(document).ready(function() {
        //     var userid=GetRequest("userid");
        //     if(userid.length>0)
        //     {
        //         $('input[name=userid]').attr("readonly","readonly");
        //     }
        // });
		function cl_Click () {
        var title=$("#title").attr("value");
        if (title=="")
        {
            alert('请输入标题');
            return false;
        };
        var action='add';
        var id=GetRequest("id");
        if (id.length>0) {action='edit';$("#id").attr("value",id);};
        $("#action").attr("value",action);
        $("#form1").submit();
    	}
    </script>
    <style>
        .inputclass{width:600px;}
    </style>
</head>
<body>
    <form id="form1" method="post" action="ArticleSave.php">
        <div>
            <div class="PageHeader">
                <div class="PageTitle">
                <?php
                    if (strlen($id)>0) {
                        echo "编辑信息";

                    }
                    else{
                        echo "添加信息";
                    }
                 ?>
                </div>
            </div>
            <div class="PageToolBar" id="PageToolBar">
                <img src="../Images/add.gif" /><a id="c1" href="#" onclick="cl_Click();">保存</a>
            </div>
            <div id="container">
                <div id="content">
                    <table style="width: 100%" cellspacing="0" border="0" align="left" class="ContentTable"
                    id="LoginInfo">
                        <tr>
                            <td width="10%">标题</td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title; ?>" id="title" class="inputclass"/>
                            </td>
                        </tr>
                        <tr id="a1">
                            <td width="10%">栏目</td>
                            <td>
                                <?php
                                    $articleclassobj=$articleclass->GetArticleClassInfo($classid);
                                    echo $articleclassobj["title"];
                                 ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">关键字</td>
                            <td>
                                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword; ?>"  class="inputclass"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">超链接</td>
                            <td>
                                <input type="text" name="linkurl" id="linkurl"  value="<?php echo $linkurl; ?>"  class="inputclass"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">来源</td>
                            <td>
                                <input type="text" name="source" id="source"  value="<?php echo $source; ?>"   class="inputclass"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">作者</td>
                            <td>
                                <input type="text" name="author" id="author" value="<?php echo $author; ?>"   class="inputclass"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">首张图片</td>
                            <td>
                                <input type="text" name="titleimage" id="titleimage" value="<?php echo $titleimage; ?>"   class="inputclass"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">信息状态</td>
                            <td>
                                <input type="checkbox" name="isimgnews" <?php if ($isimgnews=="1")  {
                                    echo "checked=checked";
                                } ?> >&nbsp;是否图片新闻&nbsp;
                                <input type="checkbox" name="istop" <?php if ($istop=="1")  {
                                    echo "checked=checked";
                                } ?>>&nbsp;是否置顶&nbsp;
                                <input type="checkbox" name="ishot" <?php if ($ishot=="1")  {
                                    echo "checked=checked";
                                } ?>>&nbsp;是否热点&nbsp;
                            </td>
                        </tr>
						<tr>
							<td>信息</td>
							<td>
								<textarea id="editor" name="editor" type="text/plain" style="width:600px;height:300px;" ><?php echo html_entity_decode($content); ?></textarea>
							</td>
						</tr>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" id="action" name="action" />
        <input type="hidden" id="id" name="id" />
        <input type="hidden" id="classid" name="classid" value="<?php echo $classid; ?>" />
    </form>
</body>
</html>
<script>
	var ue = UE.getEditor('editor');
</script>