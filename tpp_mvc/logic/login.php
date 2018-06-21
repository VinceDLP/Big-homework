<?php
include_once("../db/DbManage.php");
require_once("../systemconfig.php");
   $db = new DbManage();
if(isset($_POST['login'])) {
    $username = trim($_POST['TPL_username']);
    $password = trim($_POST['TPL_password']);
    $sqlTxt = "select Pwd from user_info WHERE User_name = '" . $username . "'";
    $result = $db->executeSqlTxt($sqlTxt);
    if (($username == '') || ($password == '')) {
        header('refresh:0;url=login.php');
        echo "<script>alert('该用户名或密码不能为空，点击跳转到登录页面')</script>";
        exit;
    }
    if ($row = mysqli_fetch_array($result)) {
        $Pwd = $row["Pwd"];
        if ($Pwd == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['islogin'] = 1;
            setcookie("username", $username, time() + 7 * 24 * 60 * 60);
            setcookie("code", md5($username . md5($password)), time() + 7 * 24 * 60 * 60);
            header('refresh:0;url=all_movie.php');
            echo "<script>alert('登录成功,点击跳转到所有影片页面')</script>";
        } else {
            header('refresh:0;url=login.php');
            echo "<script>alert('密码错误，点击后跳转到登录页面')</script>";
        }
    } else {
        header('refresh:0;url=login.php');
        echo "<script>alert('没有找到该用户名，点击跳转到登录页面')</script>没有找到该用户名，3秒后跳转到登录页面";
    }}
    $smarty->display("movie/login.html");
    ?>

