<?php
    include_once('../Dal/AdminPageBase.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script src="../script/gridtable.js" type="text/javascript" ></script>
    <script src="../script/user.js" type="text/javascript"></script>
    <script type="text/javascript">
        var userlist = new GridTable();
        $(document).ready(function() {
            search();
        });
    </script>
</head>
<body>
    <form action="userlist.php" id='form1' >
        <div>
            <div class="PageHeader">
                <div class="PageTitle">用户管理 > 用户列表</div>
            </div>
            <div class="PageToolBar">
                <img src="../Images/add.gif"><a href="useredit.php">添加用户</a>
            </div>
            <div id="PageTitle">
                    用户ID或用户姓名：
                  <input type="text" value="" id="TbUserID" width="83"/>
                    &nbsp;
                    <img src="../images/search.gif" alt="#" onclick="search();" style=" cursor: hand; "/>
                </div>
            <div id="container">
                <div id="content">
                    <table border="0" id='userlist' class="GridTable">
                    </table>
                    <table id="pager"></table>
            </div>
        </div>
    </form>
</body>
</html>
