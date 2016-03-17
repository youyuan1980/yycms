<?php
include_once('Dal/AdminPageBase1.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="Ext/resources/css/ext-all.css"/>
    <script type="text/javascript" src="Ext/adapter/ext/ext-base.js"></script>
    <script type="text/javascript" src="Ext/ext-all.js"></script>
    <script src="Script/default.js" type="text/javascript" ></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
<form id="form1">
    <div id="north">
        <div id="top">
            <img src="images/top.jpg" align="left" width='90%' height='200'/>
            <?php echo $_SESSION["username"]; ?>&nbsp;<a href="login.php?action=logout" target="_top">退出系统</a><span
                style="margin-right: 30px;"></span></div>
    </div>
    <div id="west">
        <ul id="treeDemo" class="ztree"></ul>
        <a href="sys/userlist.php" target="main">人员列表</a>
    </div>
    <iframe height="100%" width="100%" src="sys/userlist.php" name="main" frameborder="no" id="main" border="0">
    </iframe>
    <div id="south">
         <p style="text-align: center; padding-top: 15px;">
            <!-- 版权所有： © 2015 水云间工作室 CopyRight All Rights Reserved. 技术支持：水云间工作室 --></p>
    </div>
</form>
</body>
</html>