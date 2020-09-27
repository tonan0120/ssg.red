<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>数据更新</title> 
		<style type="text/css"> 
			@import url(../style.css);/*这里是通过@import引用CSS的样式内容*/ 
		</style> 
		 <?php
		include"../ssg.php";
	?>
</head> 
<body>

<?php
		if(isset($_SESSION['username']))
		{	
			echo "<div class='top'><div align='right'>";
			echo "<a>$_SESSION[username]</a> <a href = '../exit.php'>退出</a>";
			echo "</div></div>";
		}else
		{
			header("location: ../login.php");
			exit();
		}
?>

</br></br></br></br></br></br></br></br>
<?php
/* 1、连接数据库服务器 */
$con = mysql_connect($ssg_sql_address,$ssg_sql_acount,$ssg_sql_password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

/* 2、连接数据库*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);
mysql_query("set names 'utf8'");

/*创建SQL语句*/
$sql = "update zhan set leixing='$_POST[leixing]',wangzhi='$_POST[wangzhi]',mingcheng='$_POST[mingcheng]' where id = '$_POST[id]'";

/*执行SQL语句，并判断是否成功*/
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<div class='kuang'><div  class='wangzhi'><div  align='center'>	<h4>数据更新成功！</h4><a class='title' href='./houtai.php'>返回</a></div></div></div>";

/*关闭数据库连接*/
mysql_close($con);
?>
</body>
</html>