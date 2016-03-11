<?php
include_once('DAL/Config.php');
include_once('DAL/User.php');
session_start();
 if (isset($_POST["txt_userid"]) && isset($_POST["txt_pwd"])) {
     $UserID = $_POST["txt_userid"];
     $UserPwd = $_POST["txt_pwd"];
     $u=new User($DB);
    $flag = $u->Login($UserID, $UserPwd);
    if ($flag == 1) {
        $_SESSION["userid"] =$UserID;
        $_SESSION["username"]=$u->GetUserName($UserID);
        echo "<script>alert('登陆成功');location.href='Default.php';</script>";
    } else {
        if ($flag == 2) {
            echo "<script>alert('登陆失败:密码错识');location.href='login.php';</script>";
        } else {
            echo "<script>alert('登陆失败:用户名错识');location.href='login.php'</script>";
        }
    }
 }
 if (isset($_GET["action"])) {
     $action = $_GET["action"];
     if ($action=="logout") {
         unset($_SESSION["userid"]);         
         unset($_SESSION["username"]);
     }
 }
?>
<html>
<head><title>水云间后台管理系统</title>
    <meta charset="utf-8"/>
</head>
<body>
<form method="post" action="Login.php">
    <table border="1">
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="txt_userid"/></td>
        </tr>
        <tr>
            <td>帐号：</td>
            <td><input type="password" name="txt_pwd"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="登陆"/></td>
        </tr>
    </table>
</form>
</body>
</html>