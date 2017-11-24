<html>
<head>
<?php session_start();?>
<meta charset='UTF-8'/>
<title>登录页面</title>
<link rel="stylesheet" type="text/css" href="style/login.css">
<script src="style/js.js">
</script>
<script >
function change(){
	document.getElementById("chk1").src="checkcode.php";
}
function tz(){
	window.location.href="2.php";
}
function check(){
	var ck = document.getElementById("chk").value;
	var name = document.getElementById("username").value;
	var pwd = document.getElementById("pwd").value;
	if(ck=='')
		{
		alert("验证码不能为空！");
		form1.chk.focus();
		return false;
		}
	else if(name=='')
	{alert("用户名不能为空！");
	form1.username.focus();
	return false;
		}
	else if(pwd=='')
	{alert("密码不能为空！");
	form1.pwd.focus();
	return false;
		}
	else
	{
		createRequest('1.php?chk='+ck+'&username='+name+'&pwd='+pwd);
			
	}
}
</script>
</head>
<body>
<div id='div1'></div>
<div id='div2'></div>
<div id='div3'></div>
<div id='div4'></div>
<header>登录页面</header>

<div id='login'>
<form method="POST" name="form1" id="form1" >
<br/><br/>
<label for='username'>用户名：</label>
<input id='username' name="username" placeholder="请输入用户名" required="required"><br/><br/><br/>
<label for='pwd'>密&nbsp; 码：</label>
<input type='password' id='pwd' name="pwd" placeholder='请输入密码' required="required"><br/><br/><br/>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; 
<label for='chk'>验证码：</label>
<input id='chk' name="chk" placeholder='请输入验证码' required="required">
<img id='chk1' src="checkcode.php" alt="验证码" onclick=change() class="ch">
<a  href="#" onclick=change()>换一张</a><br/><br/><br/>
&emsp;&emsp;<input type='button' value='登录' onclick="check()">&emsp;&emsp;
<input type="button" value='注册' onclick='tz()'>
</form>

</div>
<br/>
</body>
</html>