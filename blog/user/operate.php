<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
if(isset($_POST["target"]) && $_POST["target"]=="atc_add")
{$sql = "insert into article (title,cate_name,author,content) values (\"".$_POST["title"]."\",\"".$_POST["category"]."\",\"".$_SESSION["username"]."\",\"".$_POST["content"]."\")";
if(mysqli_query($conn, $sql))
    echo "添加成功！";
else echo "添加失败！";
exit();
}
if (isset($_POST["target"]) && $_POST["target"]=="atc_update") {
    $sql = "update article set title='".$_POST["title"]."',cate_name='".$_POST["category"]."',content='".$_POST["content"]."' where id=".$_POST["id"];
    $result = mysqli_query($conn, $sql);
    if($result)
        echo "更改成功！";
    else echo "更改失败！";
    exit();
}
if (isset($_GET["target"]) && $_GET["target"]=="atc_delete") {
    $sql = "delete from article where id=\"".$_GET["id"].'"';
    $result = mysqli_query($conn, $sql);
    if($result)
        echo "删除成功！";
    else echo "删除失败！";
    exit();
}
if (isset($_GET["target"]) && $_GET["target"]=="com_del") {
    $sql = "delete from guestbook where id=\"".$_GET["id"].'"';
    $result = mysqli_query($conn, $sql);
    if($result)
        echo "删除成功！";
    else echo "删除失败！";
    exit();
}
?>
