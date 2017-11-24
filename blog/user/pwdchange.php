<html>
<head>
<script type="text/javascript">
function test(){
	var old = document.getElementById("old").value;
	var new1 = document.getElementById("new1").value;
	var new2 = document.getElementById("new2").value;
	if (old == "")
		alert("旧密码不能为空！");
	else if (new1 != new2)
		alert("两次密码不一致！");
	else 
		createRequest('check.php?old='+old+'&new1='+new1);
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
</head>
<body style=position:absolute;>
<form style=position:relative;left:300px;top:100px;>
&emsp;&emsp;&emsp;&emsp;旧密码：<input id="old" type="password"><br><br>
&emsp;&emsp;&emsp;&emsp;新密码：<input id="new1" type="password"><br><br>
重新输入新密码：<input id="new2" type="password"><br><br>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="button" value="提交" onclick=test()>
</form>
</body>
</html>