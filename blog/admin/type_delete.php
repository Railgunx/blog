<html>
<head>
<script>
function del(id)
{if(confirm("确定删除？"))
	createRequest('operate.php?catename='+id+'&target=type_delete');
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
			location.reload();
		} else {
			alert('您请求的页面发现错误');
		}
	}
}
</script>
</head>
<body>
<table>
<tr><td>类名</td><td>操作</td></tr>
<?php
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select * from category";
$result = mysqli_query($conn, $sql);
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<tr><td><?php echo $info["cate_name"]?></td><td ><input id="<?php echo $info['cate_name']?>" type="button" onclick=del<?php echo '("'.$info['cate_name'].'")'?> value="删除"></td></tr>
<?php }?>
</table>
</body>
</html>

