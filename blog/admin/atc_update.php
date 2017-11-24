<html>
<head>
<?php 
require '../check_user.php';
?>
<script type="text/javascript">
function update(id){
	window.location.href="atc_ud.php?id="+id;
}
</script>
</head>
<body>
<table style="margin:auto;align:center">
<tr><td>标题</td><td>分类</td></tr>
<?php
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select * from article where author='{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<tr>
<td><?php echo $info["title"]?></td>
<td><?php echo $info["cate_name"]?></td>
<td><input type="button" value="修改" onclick=update<?php echo "(\"".$info["id"]."\")"?>></td>
</tr>

<?php }?>
</table>

</body>
</html>