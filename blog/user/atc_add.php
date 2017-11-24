<html>
<head></head>
<body style="align:center;">
<form action="operate.php" method="post">
<input name="target" type="hidden" value="atc_add">
标题：<input name="title">
分类：<select name="category">
<?php 
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select cate_name from category";
$result = mysqli_query($conn, $sql);
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<option value="<?php echo $info[0];?>"><?php echo $info[0];?></option>
<?php }?>
</select><br><br>
正文：<br><textarea name="content" rows="10" cols="80"></textarea>
<br><input type="submit"></form>
</body>
</html>
