<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select * from admin where username='".$_SESSION["username"]."' and password='".$_GET["old"]."'";
$result = mysqli_query($conn, $sql);
$info=mysqli_fetch_array($result);
if ($info)
{
    $sql = "update admin set password='".$_GET["new1"]."' where username='".$_SESSION["username"]."'";
    if (mysqli_query($conn, $sql))
        echo "密码修改成功！";
    else echo "密码修改失败！";
}
else echo "旧密码输入错误！";
?>