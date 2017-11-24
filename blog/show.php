<head>
<script type="text/javascript" src=style/show.js>
</script>
<link rel="stylesheet" type="text/css" href="style/show.css">
<script>
function sm1(){
	var id = document.getElementById('id').value;
	var guest = document.getElementById('guest_content').value;
	createRequest('guest.php?id='+id+'&guest_content='+guest);
}
function delt(id){
	if(confirm("确定删除？"))
	createRequest('guest_del.php?id='+id);
}
</script>
</head>
<body style="margin:0px;border:0px;padding:0px;">
<?php
if(isset($_GET["id"]))
{   session_start();
    $conn = mysqli_connect("localhost", "root", "19951219", "blog");
    $sql = "update article set views=views+1 where id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $sql = "select * from article where id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_array($result);
    echo "<center><h2 >".$info['title']."</h2><br>";
    echo "作者：".$info['author']." &nbsp;分类：".$info['cate_name']."&nbsp;发表时间：{$info['time']}"."&nbsp;浏览量：{$info['views']}"."</center><br>";
    echo $info['content'];
    ?><br><br><br><br><br><br>
    <div >
   <h3>评论列表</h3><br>
   <?php 
   $sql = "select * from guestbook where art_id=".$_GET['id'] ;
   $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result) < 1)
       echo "<B>暂时没人评论，赶紧抢沙发~</B>";
   for($i = 1;($info = mysqli_fetch_array($result))!=false;$i++)
   {
   ?>
   <B><?php echo $info['username']?></B><?php echo "<br>&nbsp;&nbsp;".$i."楼&nbsp;".$info['time']."&nbsp;&nbsp;";
   if(isset($_SESSION['username']) && $_SESSION['username']==$info['username'])
       echo "<span class='del' onclick='delt({$info['id']})'>删除</span>";
   echo "<br>&nbsp;&nbsp;".$info['content']."<br>"?>
   <?php }?>
   </div>
    <?PHP if(isset($_SESSION['username']))
    {
    ?>
    <br>
   <div id='guest' >
   <input type="hidden" id="id" value="<?php echo $_GET['id']?>">
   <textarea rows="6" cols="80" id="guest_content"></textarea><br>
   <br>
   <button  onclick="sm1()" >评论</button>
</div> 
   <?php }}?> 
   
</body>