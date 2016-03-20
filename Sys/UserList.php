<?php 
    include_once('../Dal/AdminPageBase.php');
    include_once('../Dal/User.php');
    include_once('../Dal/PageView.php');
    $username=isset($_GET["TbUserID"])?$_GET["TbUserID"]:''; 
    $page=isset($_GET["page"])?$_GET["page"]:1; 
    $pagesize=20;   
    $url='UserList.php?';
    $u=new User($DB);
    $data=$u->GetUserList($username,$page,$pagesize);
    $rowcount=$data["rowcount"];
    $datalist=$data["items"];
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script type="text/javascript">        
        var ErrMsg = "请先选择所需操作的信息！";
        var DelConfirmMsg = "您确认要删除选择的信息吗？";
        function DoAction(actionUrl) {
            if (!CheckSelectIsValid()) { return false; }
            location.href = actionUrl + "?userid=" + $("#userid").attr("value");
        }
        function DelAction() {
            if (!CheckSelectIsValid()) { return false; }
            return confirm(DelConfirmMsg);
        }
        function Add() {
            location.href = 'UserEdit.php';
        }
        function CheckSelectIsValid() {
            var SelectedDataKeyValue = $("#userid").attr("value");
            if (SelectedDataKeyValue == "-1"||SelectedDataKeyValue == "") {
                alert(ErrMsg);
                return false;
            }
            return true;
        }
        function search () {
             form1.submit(); 
        }
        </script>
</head>
<body>
    <form action="UserList.php" id='form1' method="get">
        <div class="PageHeader">
            <div class="PageTitle">用户管理 > 用户列表</div>
        </div>
        <div class="PageToolBar">
            <img src="../Images/AddUser.gif"><a href="useredit.php">添加用户</a>
            <img src="../Images/EditUser.gif"><a href="#" onclick="javascript:DoAction('UserEdit.php');">编辑用户</a>
            <img src="../Images/DelUser.gif"><a href="#" onclick="">删除用户</a>
            <img src="../Images/ResetPwd.gif"><a href="#" onclick="">重置密码</a>
        </div>
        <div id="container">
            <div id="ContentPanel">
                用户ID或用户姓名：
                <input type="text" value="<?php echo $username; ?>" name="TbUserID" width="83"/>
                &nbsp;
                <img src="../images/search.gif" alt="#" onclick="search();" style=" cursor: hand; "/>
            </div>
            <div id="content">
                <table border="0" id='userlist' class="GridTable">
                    <tr><th>用户ID</th><th>用户名</th></tr>
                    <?php 
                        foreach ($datalist as $row) {
                            echo '<tr onclick="select(this,\'userlist\',\'userid\',\''.$row["userid"].'\');"><td>'.$row["userid"].'</td><td>'.$row["username"].'</td></tr>';
                        }
                     ?>
                </table>
                <?php 
                    echo PageView::getPageHtml($page, $rowcount,$pagesize,$url);
                    ?></div>
            <input type="hidden" id="userid" value="-1" />
        </div>
    </form>
</body>
</html>
