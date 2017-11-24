<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "insert into guestbook (username,art_id,content) values ('{$_SESSION['username']}','{$_GET['id']}','{$_GET['guest_content']}')";
$result = mysqli_query($conn, $sql);
if($result)
    echo "评论成功！";
    else echo "评论失败！";
?>
        