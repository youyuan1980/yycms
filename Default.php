<?php
    include_once('Dal/AdminPageBase1.php');
    $UserID= $_SESSION["userid"];
    $json="[";
    $sql = "select id,name,pid,isparent,url from menu t ".
    " where roleid ='' or roleid in (select roleid from userinrole where userid='" .$UserID."')  order by menuorder ";
    $dt = $DB->GetDataTable($sql);
    foreach ($dt as $row) {
        if ($json!="[") {
            $json=$json.",";
        }
        $id = $row["id"];
        $pid = $row["pid"];
        $name = $row["name"];
        $isparent = "";
        if ($row["isparent"]=="1") {
            $isparent = ",isParent:true";
        }
        $url=",url:\"" . $row["url"] . "\",target:\"main\"";
        $json = $json."{\"id\":\"" . $id . "\",\"pId\":\"" . $pid . "\",open:true,\"name\":\"" . $name . "\"" . $isparent . $url . "}";
    }
    $json=$json.']';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="Ext/resources/css/ext-all.css"/>
    <script type="text/javascript" src="Ext/adapter/ext/ext-base.js"></script>
    <script type="text/javascript" src="Ext/ext-all.js"></script>
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" href="zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="zTree/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript">
        var zNodes = <?php echo $json;?>;

    </script>
    <script src="Script/Default.js" type="text/javascript" ></script>
</head>
<body>
<form id="form1">
    <div id="west">
        <ul id="treeDemo" class="ztree"></ul>
    </div>
    <div id="north">
        <div id="top">
            <img src="images/top.jpg" align="left" width='90%' height='200'/>
            <?php echo $_SESSION["username"]; ?>&nbsp;<a href="login.php?action=logout" target="_top">退出系统</a><span
                style="margin-right: 30px;"></span></div>
    </div>
    <iframe height="100%" width="100%" src="main.php" name="main" frameborder="no" id="main" border="0">
    </iframe>
    <div id="south">
        <p style="text-align: center; padding-top: 15px;">
            版权所有： © 2015 水云间工作室 CopyRight All Rights Reserved. 技术支持：水云间工作室</p>
    </div>
</form>
</body>
</html>