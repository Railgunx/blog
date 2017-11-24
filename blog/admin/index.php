
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/index.css">
<script >
function reinitIframe(){   
    var iframe = document.getElementById("frame_content");   
    try{   
        var height = iframe.contentWindow.document.body.scrollHeight;   
        iframe.height =  height;         
    }catch (ex){}   
}   
function shows(id){
document.getElementById("main").innerHTML="<iframe id='frame_content'  src='../show.php?id="+id+"'  height=100% width=100%   SCROLLING=no style='border:0px;'></iframe>";
var ifm= document.getElementById("main"); 
ifm.height=document.documentElement.clientHeight;
window.setTimeout("reinitIframe()", 200);

}

	
		</script>
<?php 
$conn = mysqli_connect("localhost", "root", "19951219", "blog");
$sql = "select cate_name from category";
$result = mysqli_query($conn, $sql);
$category = isset($_GET["category"]) ? $_GET["category"] : '';
$author = isset($_GET["author"]) ? $_GET["author"] : '';
$title = isset($_GET["title"]) ? $_GET["title"] : '';
?>
<title></title></head>
<body>
<nav>
<form action="index.php" method="get" >
分类：<select name="category" >
<option value=''>--请选择--</option>
<?php 
while (($info = mysqli_fetch_array($result))!=false)
{
?>
<option <?php if($info[0]==$category) echo 'selected="selected"'?> value="<?php echo $info[0];?>"><?php echo $info[0];?></option>
<?php }?>
</select><br>
作者：<input value="<?php echo $author;?>" name="author" width="20px"><br>
标题：<input value="<?php echo $title;?>" name="title" width="20px"><br>
<br>&nbsp;&nbsp;&nbsp;<input type="submit" value="搜索"><br><br>
<a href="index.php">返回首页</a>&nbsp;
<a href="<?php echo $_SERVER['REQUEST_URI']?>">返回</a>
</form>
</nav>

<main id="main" >                                                                                                                                                                                                                                                                                                                                                                                      
<?php
$index = array();
$target = array();
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$page_rows = 10;
$where = " where cate_name like '%{$category}%' and author like '%{$author}%' and title like '%{$title}%'";
$sql = "select count(*) from article".$where;
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_row($result)[0];
$page_all = ceil($rows/$page_rows);
if($page<1)
    $page = 1;
if($page > $page_all)
    $page = $page_all;
$sql = "select * from article".$where." order by time desc limit ".(($page-1)*$page_rows).",{$page_rows}";
$result = mysqli_query($conn, $sql);
if($result)
for ($i = 0;($info = mysqli_fetch_array($result))!=false;$i++)
{
$index[] = $info["title"];
$target[] = $info['id'];
echo "<div class='out' onclick=shows({$info["id"]})>";
echo "<a name='{$info['id']}'></a>".$info["title"]."   ".$info["author"]."   ".$info["cate_name"];
echo "<div class='in'>".$info["content"];
echo "</div><br>{$info["time"]} &nbsp;浏览量：{$info["views"]}</div><hr>";
}
    
    if($page>3)
        echo "<a href=index.php?author={$author}&title={$title}&category={$category}>1</a>&nbsp;";
    if($page>4)
        echo "...";
    if($page-2>0)
        echo "<a href=index.php?author={$author}&title={$title}&category={$category}&page=".($page-2).">".($page-2)."</a>&nbsp;";
    if($page-1>0)
    echo "<a href=index.php?author={$author}&title={$title}&category={$category}&page=".($page-1).">".($page-1)."</a>&nbsp;";
    echo "<B>{$page}</B>&nbsp;";
    if($page+1<$page_all)
    echo "<a href=index.php?author={$author}&title={$title}&category={$category}&page=".($page+1).">".($page+1)."</a>&nbsp;";
    if($page+2<$page_all)
        echo "<a href=index.php?author={$author}&title={$title}&category={$category}&page=".($page+2).">".($page+2)."</a>&nbsp;";
    if($page_all-$page>3)
        echo "...";
    if($page<$page_all)
    echo "<a href=index.php?author={$author}&title={$title}&category={$category}&page={$page_all}>{$page_all}</a>&nbsp;";
    echo "{$page}/{$page_all}页";

?>

</main>
<div id="right">
本页目录<br><br>
<?php 
for($i = 0;$i < count($index);$i++)
{
    echo "<a href='#{$target[$i]}'>".$index[$i]."<br><br>";
}

?>
</div>

</body>
</html>

<?php
