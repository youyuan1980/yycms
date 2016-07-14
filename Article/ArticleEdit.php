<?php
    include_once('../Dal/AdminPageBase.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>无标题页</title>
    <link href="../Css/css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/Common.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        // $(document).ready(function() {
        //     var userid=GetRequest("userid");
        //     if(userid.length>0)
        //     {
        //         $('input[name=userid]').attr("readonly","readonly");
        //     }
        // });
		function cl_Click () {
        // var tuserid=$("#userid").attr("value");
        // var tusername=$("#username").attr("value");
        // if (tuserid==""||tusername=="")
        // {
        //     alert('请输入用户ID和用户名称');
        //     return false;
        // };
        // var action='add';
        // var userid=GetRequest("userid");
        // if (userid.length>0) {action='edit'};
        // $("#action").attr("value",action);
        // $("#form1").submit();
    	}
    </script>
</head>
<body>
    <form id="form1" method="post" action="UserSave.php">
        <div>
            <div class="PageHeader">
                <div class="PageTitle">
                <!--   <?php
                    if (!empty($userid)) {
                        echo "编辑用户信息";
                        $sql="select username,userid,userpassword from users where userid='".$userid."'";
                        $u=$DB->
                    GetDataTable($sql);
                        foreach ($u as $row) {
                            $userid=$row["userid"];
                            $username=$row["username"];
                        }
                    }
                    else{
                        echo "添加用户信息";
                    }
                 ?> -->
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
                            <td width="10%">标题</td>
                            <td>

                            </td>
                        </tr>
                        <tr id="a1">
                            <td width="10%">栏目</td>
                            <td>
                            </td>
                        </tr>
						<tr>
							<td>信息</td>
							<td>
								<script id="editor" type="text/plain" style="width:600px;height:300px;"></script>
							</td>
						</tr>
                    </table>
                </div>
            </div>
        </div>

    </form>
</body>
</html>
<script>
	var ue = UE.getEditor('editor');
</script>