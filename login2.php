<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>数据添加</title> 
		<style type="text/css"> 
			@import url(style.css);/*这里是通过@import引用CSS的样式内容*/ 
		</style> 
		 <?php
		include"ssg.php";
	?>
</head> 
<body>
<div class="top"><!-- 顶部导航栏 -->
	<div class = "left">
		<img src="favicon.ico" alt="ssg" border="0" width="20px"><a href="./index.php" class="sitename1">塔南的空间</a>
	</div>
	<div class = "right">
	<?php
		if(isset($_SESSION['username']))
		{
			echo "<a href = './houtai/houtai.php'>$_SESSION[username]</a> <a href = '../exit.php'>退出</a>";
		}else
		{
			echo "<a href='login.php'>登录</a>";
		}
	?>
	</div>
</div>
</br></br></br></br></br></br></br></br>
<?php
/* 连接数据库服务器 */
$con = mysql_connect($ssg_sql_address,$ssg_sql_acount,$ssg_sql_password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

/* 2、连接数据库*/
mysql_select_db($ssg_sql_database, $con);
mysql_query("set names 'utf8'");
/*创建SQL语句*/
$sql="select name from user where name= '$_POST[name]' and password = '$_POST[password]'";
/*执行SQL语句，并判断是否成功*/



$query=mysql_query($sql);
if (!$query)
  {
  die('Error: ' . mysql_error());
  }
$num=mysql_num_rows($query);
echo "<div class='kuang'>
		<div  class='wangzhi'>
			<div  align='center'>
			";
if($num <> 0)
{
	$_SESSION['username'] = $_POST['name'];
	echo ("<h3>登录成功</h3><a class='title' href='/houtai/houtai.php'>进入后台</a>");
}else
{
	echo ("<h3>用户名或密码错误</h3><a class='title' href='login.php'>重新登录</a>");
}
echo "</div></div></div>";
/*关闭数据库连接*/
mysql_close($con);
?>
</body>
</html>