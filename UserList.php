<?php
include_once('DAL/AdminPageBase.php');
include_once("DAL/User.php");
$u = new User($DB);
$userlist = $u->GetUserList();
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
</head>
<body>
<div class="PageHeader">
    <div class="PageTitle">用户管理 > 用户列表</div>
</div>
<div class="PageToolBar">
    <img src="Images/AddUser.gif">
    <a href="useredit.aspx">添加用户</a>
    <img src="Images/EditUser.gif"><a href="#" onclick="javascript:DoAction('UserEdit.aspx');">编辑用户</a>
    <img src="Images/DelUser.gif">
    <a href="#" onclick="">删除用户</a>
    <img src="Images/ResetPwd.gif"><a href="#" onclick="">重置密码</a>
</div>
<div id="container">
    <div id="ContentPanel">
        用户ID或用户姓名：
        <input type="text" name="TbUserID" width="83"/>
        &nbsp;<img src="images/search.gif" alt="#" onclick="" style=" cursor: hand; "/>

    </div>
    <div id="content">
        <table border="0" class="GridTable">
            <tr>
                <th width="200">用户ID</th>
                <th>用户姓名</th>
            </tr>
            <?php
            foreach ($userlist as &$user) {
                echo '<tr><td>' . $user["userid"] . '</td><td>' . $user["username"] . '</td></tr>';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
