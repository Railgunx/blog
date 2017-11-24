<?php
session_start();
if(isset($_SESSION['checkcode']))
{
    if(strtoupper($_GET['chk'])!=$_SESSION['checkcode'])
    {
        echo "验证码错误！";
        exit();
    }
    else {
        $conn=mysqli_connect("localhost", "root", "19951219", "blog");
        $sql="select * from admin where username='".$_GET["username"]."' and password='".$_GET["pwd"]."'";
        $result=mysqli_query($conn, $sql);
        $info=mysqli_fetch_array($result);
        if($info)
        {
            $_SESSION["username"]=$_GET["username"];
            $_SESSION["status"] = $info[3];
            if ($info[3]=='管理员')
               echo '管理员';
            else echo '普通用户';
        }
        else echo "用户名或密码错误！";
    }
}
?>