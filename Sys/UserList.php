
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/common.js"></script>
    <script type="text/javascript" src="../script/gridtable.js"></script>
    <script type="text/javascript">
    var userlist = new GridTable();
    $(function(){        
        userlist.url="../ajax/ajaxlist.php?action=userlist&username=";
        userlist.KeyColumnName="userid";
        userlist.CaptionColumnString="用户ID,用户姓名";
        userlist.ColumnString="userid,username";
        userlist.TableId = "table_userlist";
        userlist.PagerId = "pager";
        userlist.ObjectName = "userlist";
        userlist.SelectID = "userid";
        userlist.IsShowPager = true;
        userlist.IsShowCheckBox=false;
        userlist.Show();
    });
    var ErrMsg = "请先选择所需操作的信息！";
    var DelConfirmMsg = "您确认要删除选择的信息吗？";
    function DoAction(actionUrl) {
        if (!CheckSelectIsValid()) { return false; }
        location.href = actionUrl + "?USER_ID=" + $("#userid").attr("value");
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
    </script>
</head>
<body>
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
        <input type="text" name="TbUserID" width="83"/>
        &nbsp;<img src="../images/search.gif" alt="#" onclick="" style=" cursor: hand; "/>
    </div>
    <div id="content">
        <table border="0" id='table_userlist' class="GridTable">
        </table>
        <table id='pager' class="pager"></table>        
    </div>
    <input type="hidden" id="userid" value="-1" />
</div>
</body>
</html>
