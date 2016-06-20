<?php 
    include_once('../Dal/AdminPageBase.php');
    // include_once('../Dal/User.php');
    // include_once('../Dal/PageView.php');
    // $username=isset($_GET["TbUserID"])?$_GET["TbUserID"]:''; 
    // $page=isset($_GET["page"])?$_GET["page"]:1; 
    // $pagesize=20;   
    // $url='UserList.php?';
    // $u=new User($DB);
    // $data=$u->GetUserList($username,$page,$pagesize);
    // $rowcount=$data["rowcount"];
    // $datalist=$data["items"];
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css"/>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script src="../script/gridtable.js" type="text/javascript" ></script>
    <script type="text/javascript"> 
    var userlist = new GridTable();
    $(document).ready(function() {
        //$("#userlist").css("background","red");
        search();
    });       

    function search()
    {            
            userlist.KeyColumnName = "userid";
            userlist.CaptionColumnString = "用户ID,用户姓名";
            userlist.ColumnString = "userid,username";
            userlist.TableId = "userlist";
            userlist.PagerId = "pager";
            userlist.PageSize = 10;
            userlist.ObjectName='userlist';
            userlist.url = "../Dal/userajax.php?action=list&UserName="+escape($("#TbUserID").attr("value"));
            userlist.PageIndex = 1;
            userlist.IsShowPager=true;
            userlist.CaptionColumnString_Custom="操作";
            userlist.ColumnString_Custom="<a href=\"useredit.php?userid={userid}\">编辑</a>&nbsp;";
            userlist.Show();
    }
        // var ErrMsg = "请先选择所需操作的信息！";
        // var DelConfirmMsg = "您确认要删除选择的信息吗？";
        // function DoAction(actionUrl) {
        //     if (!CheckSelectIsValid()) { return false; }
        //     location.href = actionUrl + "?userid=" + $("#userid").attr("value");
        // }
        // function DelAction() {
        //     if (!CheckSelectIsValid()) { return false; }
        //     return confirm(DelConfirmMsg);
        // }
        // function Add() {
        //     location.href = 'UserEdit.php';
        // }
        // function CheckSelectIsValid() {
        //     var SelectedDataKeyValue = $("#userid").attr("value");
        //     if (SelectedDataKeyValue == "-1"||SelectedDataKeyValue == "") {
        //         alert(ErrMsg);
        //         return false;
        //     }
        //     return true;
        // }
        // function search () {
        //      form1.submit(); 
        // }
//         var userlist = new GridTable();
//         function search()
//         {
//             //     var ObjectTypeId = $("#ObjectTypeId",Tab).attr("value");
// //     if (ObjectTypeId == "-1") {
// //         alertMsg.warn('请选择收费对象类型');
// //         return false;
// //     }
// //     //显示
// //     gridtable_chrsqlist.KeyColumnName = "OBJECTID";
// //     gridtable_chrsqlist.CaptionColumnString = "收费对象名称,收费对象编码,收费总金额(元)";
// //     gridtable_chrsqlist.ColumnString = "OBJECTNAME,KEYCODE,CHRVALUE";
// //     gridtable_chrsqlist.IsShowPager = true;
// //     gridtable_chrsqlist.TableId = "ChrObjectTable";
// //     gridtable_chrsqlist.PagerId = "pager_chrsqlist";
// //     gridtable_chrsqlist.PageSize = 20;
// //     gridtable_chrsqlist.ObjectName = "gridtable_chrsqlist";
// //     gridtable_chrsqlist.SelectID = "ObjectId_chrsqlist";
// //     gridtable_chrsqlist.url = chrsq_url + "?action=loadchrobjectlist&ObjectTypeId=" + $("#ObjectTypeId", Tab).attr("value") + "&OBJECTNAME=" + URLencode($("#s_ObjectName", Tab).attr("value")) + "&KEYCODE=" + URLencode($("#s_KeyCode", Tab).attr("value"));
// //     gridtable_chrsqlist.PageIndex = 1;
// //     gridtable_chrsqlist.Show();
//         }
        
        </script>
</head>
<body>
    <form action="" id='form1' >
        <div>
        <div class="PageHeader">
            <div class="PageTitle">用户管理 > 用户列表</div>
        </div>
        <div class="PageToolBar">
            <img src="../Images/add.gif"><a href="useredit.php">添加用户111</a>
            <img src="../Images/edit.gif"><a href="#" onclick="javascript:DoAction('UserEdit.php');">编辑用户</a>
            <img src="../Images/delete.gif"><a href="#" onclick="">删除用户</a>
            <img src="../Images/ResetPwd.gif"><a href="#" onclick="">重置密码</a>
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
        <p>adfsafdsf</p>
    </form>
</body>
</html>
