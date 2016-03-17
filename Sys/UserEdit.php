<html>
<head>
    <title>无标题页</title>
    <link href="../Css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1">
    <div>
        <div class="PageHeader">
            <div class="PageTitle">
                <?php 
                    if (isset($_GET["user_id"])) {
                        echo "编辑用户信息";
                    }
                    else{
                        echo "添加用户信息";
                    }
                 ?>
            </div>
        </div>
        <div class="PageToolBar" id="PageToolBar" runat="server">
            <img src="../Images/add.gif" /><asp:LinkButton runat="server" ID="cl" 
                onclick="cl_Click" >保存</asp:LinkButton>
        </div>
        <div id="container">
            <div id="content">
                <table style="width: 100%" cellspacing="0" border="0" align="left" class="ContentTable"
                    id="LoginInfo">
                    <tr>
                        <td width="10%">
                            用户ID
                        </td>
                        <td>
                            <asp:TextBox runat="server" ID="USERID" Width="300"></asp:TextBox><asp:RequiredFieldValidator
                                ID="RequiredFieldValidatorEx4" runat="server" ControlToValidate="USERID" Display="Dynamic"
                                ErrorMessage="请输入用户ID"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%">
                            用户名称
                        </td>
                        <td>
                            <asp:TextBox runat="server" ID="USERNAME" Width="300"></asp:TextBox><asp:RequiredFieldValidator
                                ID="RequiredFieldValidatorEx1" runat="server" ControlToValidate="USERNAME" Display="Dynamic"
                                ErrorMessage="请输入用户名称"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <div id="UserPwdPanel" runat="server">
                        <tr>
                            <td width="10%">
                                初始密码
                            </td>
                            <td>
                                <asp:TextBox runat="server" ID="USERPWD" Width="300" TextMode="Password"></asp:TextBox><asp:RequiredFieldValidator
                                    ID="RequiredFieldValidatorEx2" runat="server" ControlToValidate="USERPWD" Display="Dynamic"
                                    ErrorMessage="请输入用户密码"></asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">
                                确认密码
                            </td>
                            <td>
                                <asp:TextBox runat="server" ID="PwdTry" Width="300" TextMode="Password"></asp:TextBox><asp:RequiredFieldValidator
                                    ID="RequiredFieldValidator6" runat="server" ControlToValidate="PwdTry" ErrorMessage="请再输入一次密码以确认是否正确"
                                    Display="Dynamic" SetFocusOnError="True"></asp:RequiredFieldValidator><asp:CompareValidator
                                        ID="CompareValidator1" runat="server" ControlToCompare="USERPWD" ControlToValidate="PwdTry"
                                        Display="Dynamic" ErrorMessage="两次密码输入不一致，请重新输入" SetFocusOnError="True"></asp:CompareValidator>
                            </td>
                        </tr>
                    </div>
                    <tr>
                        <td>
                            权限
                        </td>
                        <td>
                            <asp:CheckBoxList ID="chkRols" runat="server">
                            </asp:CheckBoxList>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </form>
</body>
</html>