<html>
<head>
<script type="text/javascript">
function update(id){
	createRequest('operate.php?id="'+id+'"&target=atc_update');
}
var http_request = false;
function createRequest(url) {
	//初始化对象并发出XMLHttpRequest请求
	http_request = false;
	if (window.XMLHttpRequest) { 										//Mozilla等其他浏览器
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			http_request.overrideMimeType("text/xml");
		}
	} else if (window.ActiveXObject) { 								//IE浏览器
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
		   } catch (e) {}
		}
	}
	if (!http_request) {
		alert("不能创建XMLHTTP实例!");
		return false;
	}
	http_request.onreadystatechange = alertContents;   					 //指定响应方法
	
	http_request.open("GET", url, true);								 //发出HTTP请求
	http_request.send(null);
}
function alertContents() {   											 //处理服务器返回的信息
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			alert(http_request.responseText);
		} else {
			alert('您请求的页面发现错误');
		}
	}
}
</script>
<?php 
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select cate_name from category";
$result1 = mysqli_query($conn, $sql);
$sql = "select * from article where id='".$_GET["id"]."'";
$result2 = mysqli_query($conn, $sql);
$info2 = mysqli_fetch_array($result2);
?>
</head>
<body>
<form action="operate.php" method="post">
<input name="target" type="hidden" value="atc_update">
<input name="id" type="hidden" value="<?php echo $info2["id"]?>">
标题：<input name="title" value=<?php echo '"'.$info2["title"].'"'?>>
分类：<select name="category" >
<?php 
while (($info = mysqli_fetch_array($result1))!=false)
{
?>
<option <?php if($info[0]==$info2["cate_name"]) echo 'selected="selected"'?> value="<?php echo $info[0];?>"><?php echo $info[0];?></option>
<?php }?>
</select><br><br>
正文：<br><textarea name="content" rows="10" cols="80" ><?php echo $info2["content"]?></textarea>
<br><input type="submit"></form>
</body>
</html>