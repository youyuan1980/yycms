<?php
    include_once('../Dal/AdminPageBase.php');
    include_once('../Dal/ArticleClass.php');
    $articleclass=new ArticleClass($DB);
    $pid=isset($_GET["pid"])?$_GET["pid"]:"-1";
    $classid=isset($_GET["classid"])?$_GET["classid"]:"";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>无标题页</title>
    <link href="../Css/css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script type="text/javascript">
    function cl_Click () {
        var pid=$("#pid").attr("value");
        var classid=$("#classid").attr("value");
        var title=$("#title").attr("value");
        if (title=="")
        {
            alert('请输入栏目名称');
            return false;
        };
        var action='add';
        var classid=GetRequest("classid");
        if (classid!="") {action='edit'};
        $("#action").attr("value",action);
        $("#form1").submit();
    }
    </script>
</head>
<body>
    <form id="form1" method="post" action="ArticleClassSave.php">
        <div>
            <div class="PageHeader">
                <div class="PageTitle">
                    <?php
                    if ($classid!="-1") {
                        echo "编辑栏目信息";
                    }
                    else{
                        echo "添加栏目信息";
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
                            <td width="10%">父栏目</td>
                            <td>
                                <?php
                                    $parenttitle=$articleclass->GetArticleClassInfo($pid);
                                    echo $parenttitle["title"];
                                ?>
                            </td>
                        </tr>
                        <tr id="a1">
                            <td width="10%">栏目名称</td>
                            <td>
                                <input type="text" name="title" id="title" width="300" value='<?php
                                    if ($classid!="") {
                                        $parenttitle=$articleclass->GetArticleClassInfo($classid);
                                        echo $parenttitle["title"];
                                    }
                                ?>' />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" id="action" name="action" />
        <input type="hidden" id="classid" name="classid" value="<?php echo $classid; ?>" />
        <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>"/>
    </form>
</body>
</html>