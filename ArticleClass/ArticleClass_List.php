<?php
    include_once('../Dal/AdminPageBase.php');
    include_once('../Dal/ArticleClass.php');
    $u=new ArticleClass($DB);
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script src="../script/gridtable.js" type="text/javascript" ></script>
    <script src="../script/ArticleClass.js" type="text/javascript"></script>
    <script type="text/javascript">
        var articleclasslist = new GridTable();
        $(document).ready(function() {
            search();
        });
        function add () {
            var pid=GetRequest("pid");
            if (pid=="") {pid="-1";}
            location.href='articleclass_edit.php?pid='+pid;
        }
    </script>
</head>
<body>
    <form id='form1' >
        <div>
            <div class="PageHeader">
                <div class="PageTitle">栏目管理 > 栏目列表</div>
            </div>
            <div class="PageToolBar">
                <img src="../Images/add.gif"><a href="#" onclick="add();">添加栏目</a>
            </div>
            <div id="PageTitle">
                <?php
                    $pid=isset($_REQUEST["pid"])?$_REQUEST["pid"]:'';
                    if ($pid==""||$pid=="-1") {
                        # code...
                        echo "上级目录：根目录";
                    }
                    else
                    {
                        $dt=$u->GetArticleClassInfo($pid);
                        echo "返回上级目录："."<a href='articleclass_list.php?pid=".$dt["pid"]."'>".$dt["title"]."</a>&nbsp;&nbsp;";
                    }
                 ?>
                <br>
                    栏目名称：
                  <input type="text" value="" id="TbTitle" width="83"/>
                    &nbsp;
                    <img src="../images/search.gif" alt="#" onclick="search();" style=" cursor: hand; "/>
                </div>
            <div id="container">
                <div id="content">
                    <table border="0" id='articleclasslist' class="GridTable">
                    </table>
                    <table id="pager"></table>
            </div>
        </div>
    </form>
</body>
</html>
