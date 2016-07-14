<?php
    include_once('../Dal/AdminPageBase.php');
    include_once('../Dal/articleclass.php');
    $u=new ArticleClass($DB);
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script src="../script/gridtable.js" type="text/javascript" ></script>
    <script src="../script/Article.js" type="text/javascript"></script>
    <script type="text/javascript">
        var articlelist = new GridTable();
        $(document).ready(function() {
            search();
        });
        function add () {
            var classid=GetRequest("classid");
            if (classid=="") {pid="-1";}
            location.href='ArticleEdit.php?classid='+classid;
        }
    </script>
</head>
<body>
    <form id='form1' >
        <div>
            <div class="PageHeader">
                <div class="PageTitle">信息管理 > 信息列表</div>
            </div>
            <div class="PageToolBar">
                <img src="../Images/add.gif"><a href="#" onclick="add();">添加信息</a>
            </div>
            <div id="PageTitle">
                  <?php
                    $classid=isset($_REQUEST["classid"])?$_REQUEST["classid"]:'';
                    $curclasstitle='';
                    $childclassurl='';
                    if ($classid=="-1"||$classid=="") {
                        $dt=$u->GetChildArticleClassList("-1");
                        foreach ($dt as $row) {
                            # code...
                            $classid=$row["id"];
                            break;
                        }
                        $dt=$u->GetArticleClassInfo($classid);
                        $curclasstitle=$dt["title"]."(根目录)";
                        $dt1=$u->GetChildArticleClassList($dt["pid"]);
                        foreach ($dt1 as $row) {
                            $childclassurl=$childclassurl."<a href='articlelist.php?classid=".$row["id"]."'>".$row["title"]."</a>&nbsp;&nbsp;";
                        }
                    }
                    else
                    {
                        $dt=$u->GetArticleClassInfo($classid);
                        $curclasstitle=$dt["title"];
                        $childclassurl="<a href='articlelist.php?classid=".$dt["pid"]."'>上级目录</a>&nbsp;&nbsp;";
                        $dt1=$u->GetChildArticleClassList($classid);
                        foreach ($dt1 as $row) {
                            $childclassurl=$childclassurl."<a href='articlelist.php?classid=".$row["id"]."'>".$row["title"]."</a>&nbsp;&nbsp;";
                        }

                    }
                    echo "栏目：".$curclasstitle.'<br>请点击选择栏目：'.$childclassurl;
                   ?>
                    <br>标题：
                  <input type="text" value="" id="TbTitle" width="83"/>
                    &nbsp;
                    <img src="../images/search.gif" alt="#" onclick="search();" style=" cursor: hand; "/>
                </div>
            <div id="container">
                <div id="content">
                    <table border="0" id='articlelist' class="GridTable">
                    </table>
                    <table id="pager"></table>
            </div>
        </div>
    </form>
</body>
</html>
