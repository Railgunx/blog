<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
if(isset($_POST["target"])&&$_POST["target"]=="type_add")
{$sql = "insert into category (cate_name,order_no) values (\"".$_POST["name"]."\",\"".$_POST["number"]."\")";
if(mysqli_query($conn, $sql))
    echo "添加成功！";
else echo "添加失败！";
exit();
}
if (isset($_GET["target"]) && $_GET["target"]=="type_update") 
{
    $_GET["catename1"] = str_replace(" ", "+", $_GET["catename1"]);
    $_GET["cate_name"] = str_replace(" ", "+", $_GET["cate_name"]);
    $sql = "update category set cate_name=".$_GET["catename1"].",order_no=".$_GET["no"]." where cate_name=".$_GET["cate_name"];
    $result = mysqli_query($conn, $sql);
    if($result)
    echo "更改成功！";
else echo "更改失败！";
exit();
}
if (isset($_GET["target"]) && $_GET["target"]=="type_delete") {
    $_GET["catename"] = str_replace(" ", "+", $_GET["catename"]);
    $sql = "delete from category where cate_name=\"".$_GET["catename"].'"';
    $result = mysqli_query($conn, $sql);
    if($result)
        echo "删除成功！";
    else echo "删除失败！";
    exit();
}
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
if (isset($_GET["target"]) && $_GET["target"]=="user_del") {
    $sql = "delete from admin where id=\"".$_GET["id"].'"';
    $result = mysqli_query($conn, $sql);
    if($result)
        echo "删除成功！";
    else echo "删除失败！";
    exit();
}
?>

