<html>
<head>
</head>
<body>
<table style="margin:auto;align:center">
<tr><td colspan=2 align=center>已有类别</td></tr>
<tr><td>类名</td><td>类序号</td></tr>
<?php
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select * from category";
$result = mysqli_query($conn, $sql);
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<tr><td><?php echo $info["cate_name"]?></td><td><?php echo $info["order_no"]?></td></tr>
<?php }?>
</table>
<form action="operate.php" method="post" >
类&nbsp;名：<input name="name">
类序号：<input name="number">
<input type="hidden" name="target" value="type_add">
<input type="submit">
</form>
</body>
</html>
<?php
