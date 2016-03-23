<?php 
    include_once('../Dal/AdminPageBase.php');
    $userid=isset($_GET["userid"])?$_GET["userid"]:"";
    $username=isset($_GET["username"])?$_GET["username"]:"";
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
         var action='add';
         var userid=GetRequest("userid");
         if (userid.length>0) {action='edit'};
         $("#action").attr("value",action);
         $("#form1").submit();
    }
    </script>
</head>
<body>
    <form id="form1" method="get" action="UserSave.php">
        <div>
            <div class="PageHeader">
                <div class="PageTitle">
                    <?php 
                    if (!empty($userid)) {
                        echo "编辑用户信息";
                        $sql="select username,userid,userpassword from users where userid='".$userid."'";
                        $u=$DB->GetDataTable($sql);
                        foreach ($u as $row) {
                            $userid=$row["userid"];
                            $username=$row["username"];
                        }
                    }
                    else{
                        echo "添加用户信息";
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
                            <td width="10%">用户ID</td>
                            <td>
                                <input type="text" name="userid" id="userid" width="300" value='<?php echo $userid;?>
                                ' />
                                <asp:RequiredFieldValidator
                                ID="RequiredFieldValidatorEx4" runat="server" ControlToValidate="USERID" Display="Dynamic"
                                ErrorMessage="请输入用户ID"></asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr id="a1">
                            <td width="10%">用户名称</td>
                            <td>
                                <input type="text" name="username" id="username" width="300" value='<?php echo $username;?>
                                '/>
                                <asp:TextBox runat="server" ID="USERNAME" Width="300"></asp:TextBox>
                                <asp:RequiredFieldValidator
                                ID="RequiredFieldValidatorEx1" runat="server" ControlToValidate="USERNAME" Display="Dynamic"
                                ErrorMessage="请输入用户名称"></asp:RequiredFieldValidator>
                            </td>
                        </tr>                       
                        <tr>
                            <td>权限</td>
                            <td>
                                <?php 
                                $roles=$DB->
                                GetDataTable("select roleid,rolename from roles");
                                foreach ($roles as $role) {
                                    echo "
                                <input type=\"checkbox\" value=\"".$role["roleid"]."\" id=\"chkroles\" name=\"chkroles\"    />
                                ".$role["rolename"]."
                                <br>
                                ";
                                }
                             ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" id="action" name="action" />
    </form>
</body>
</html>