<head>
<?php 
require '../check_user.php';
if(isset($_SESSION['status'])&& $_SESSION['status'] == '普通用户' )
    echo '<script>window.location.replace("../user/user.php")</script>';
?>
<title>管理员页面</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css">
<script src="../style/us.js">
</script>
<script type="text/javascript">
function show(id){
	document.getElementById(id).style.display="block";
}
function hid(id){
	document.getElementById(id).style.display="none";
}
function zx(){
	createRequest('../zx.php');
}

</script>
</head>
<body>
<div id="top"><h1 style="text-align:center">博客系统</h1>
<div id="user">你好！
<?php if(isset($_SESSION['username']))
echo $_SESSION['username'];
 ?>&nbsp;<span id='zx' onclick=zx()>注销</span>
</div>
</div>
<div id="left">
<div><a id="index" href="admin.php" > 首页</a></div><br>
<div id="ifmt" onMouseOver="show('inf')" onMouseOut="hid('inf')"> 信息管理
<div id="inf">&nbsp;<a href="pwdchange.php" target="right">修改密码</a><br>&nbsp;<a href="user.php" target="right">用户管理</a></div></div>
<br>
<div onMouseOver="show('atc')" onMouseOut="hid('atc')"> 文章管理
<div id="atc">&nbsp;<a href="atc_add.php" target="right">添加文章</a><br>&nbsp;<a href="atc_update.php" target="right">编辑文章</a><br>&nbsp;<a href="atc_delete.php" target="right">删除文章</a></div></div><br>
<div onMouseOver="show('type')" onMouseOut="hid('type')"> 类别管理
<div id="type">&nbsp;<a href="type_add.php" target="right">添加类别</a><br>&nbsp;<a href="type_update.php" target="right">编辑类别</a><br>&nbsp;<a href="type_delete.php" target="right">删除类别</a></div></div><br>
<div><a id="comment" href="comment.php" target="right"> 删除评论</a></div>
</div>
<div id="right"><iframe name="right" src="index.php"  width=100% height=100% style="border:0px;"></iframe></div>
</body>
