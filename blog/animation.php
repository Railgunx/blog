<html>
<head>
<title>动画演示</title>
<style type="text/css">
*{
	margin:0px;
	padding:0px;
	margin-right:200px;
	overflow:hidden;
}
#div1{
	position:absolute;
	display:inline;
	width:50px;
	height:50px;
	border-radius:25px;
	background-image:url(img/div.jpg);
	background-size:cover;
    animation:move 5s infinite;
}
@keyframes move{
	from{left:0px;
	transform:rotate(0deg);
}
	to{left:calc(100% - 50px);
    transform:rotate(360deg)}
}
#div2{
	position:absolute;
	display:inline;
	width:50px;
	height:50px;
	border-radius:25px;
	background-image:url(img/div.jpg);
	background-size:cover;
    animation:move2 5s infinite;
	top:calc(100% - 50px)
}
@keyframes move2{
	from{top:calc(100% - 50px)
	transform:rotate(0deg);
}
	to{top:0px;
    transform:rotate(360deg)}
}
#div3{
	position:absolute;
	display:inline;
	width:50px;
	height:50px;
	border-radius:25px;
	background-image:url(img/div.jpg);
	background-size:cover;
    animation:move3 5s infinite;
	left:calc(100% - 50px);
}
@keyframes move3{
	from{top:0px;
	transform:rotate(0deg);
}
	to{top:calc(100% - 50px);	
    transform:rotate(360deg)}
}
#div4{
	position:absolute;
	display:inline;
	width:50px;
	height:50px;
	border-radius:25px;
	background-image:url(img/div.jpg);
	background-size:cover;
    animation:move4 5s infinite;
	left:calc(100% - 50px);
	top:calc(100% - 50px)
}
@keyframes move4{
	from{left:calc(100% - 50px)
	transform:rotate(0deg);
}
	to{left:0px;	
    transform:rotate(360deg)}
}
</style>
</head>
<body>
<div id='div1'></div>
<div id='div2'></div>
<div id='div3'></div>
<div id='div4'></div>

</body>
</html>