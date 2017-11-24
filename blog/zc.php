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
        $sql="INSERT INTO admin SET username='".$_GET['username']."',password='".$_GET['pwd']."'";
        $result=mysqli_query($conn, $sql);
        if($result)
        {
            echo 1;      
        }
        else echo "注册失败！";
    }
}
?>