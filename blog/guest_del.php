<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "delete from guestbook where id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
if($result)
    echo "删除评论成功！";
    else echo "删除评论失败！";
?>