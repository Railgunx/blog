<head>
<script type="text/javascript">
function delet(id){
	if(confirm("确定删除？"))
	createRequest('operate.php?id='+id+'&target=com_del');
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
<table  border="1" style="background-color:#c0c0c0;margin:auto;align:center">
<tr style="font-weight:bold;"><td  width="200">留言内容</td><td width="100">留言时间</td></tr>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select * from guestbook where username='".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<tr>
<td><?php echo $info['content']?></td><td><?php echo $info['time']?></td>
<td><input type="button" value="删除" onclick=delet<?php echo "(\"".$info["id"]."\")"?>></td>
</tr>

<?php }?>
</table>