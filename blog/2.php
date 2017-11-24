<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8" />
<title>用户注册</title>
<link rel="stylesheet" type="text/css" href="style/zc.css">
<script src="style/zc.js">
</script>
<script >
function change(){
	document.getElementById("checkcode").src="checkcode.php";
}
function check1(){
	var ck = document.getElementById("chk").value;
	var name = document.getElementById("username").value;
	var pwd = document.getElementById("pwd").value;
	var pwd2 = document.getElementById("pwd2").value;
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
	else if(pwd2=='')
	{alert("请输入确认密码！");
	form1.pwd2.focus();
	return false;
		}
	else if(pwd!=pwd2)
	{alert("两次密码输入不一致！");
	form1.pwd.focus();
	return false;
		}
	else
	{
			createRequest('zc.php?chk='+ck+'&username='+name+'&pwd='+pwd);
			
	}
}
</script>
</head>
<body>

<header>注册页面</header>
<div  id='div1'>
<div class='star-six'></div>
</div>
<div id='div2'>
<div class='star-six'></div>
</div>
<div id='atc'>
<form name='form1'>
用&nbsp;户&nbsp;名：<input id='username' name='username'><br/><br/>
密&nbsp;&nbsp;&emsp;码：<input id='pwd' type='password' name='pwd'><br/><br/>
确认密码：<input id='pwd2' type='password'><br/><br/>
验&nbsp;证&nbsp;码：<input  name='chk' id='chk' size='6'>&nbsp;&nbsp;<img name="check"id="checkcode" alt="验证码" src="checkcode.php" onclick=change()>
<a onclick=change() href=#>换一张</a>
<br/><br/>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input id='tijiao' type='button' value='提   交' onclick=check1()>
</form>
</div>


</body>
</html>