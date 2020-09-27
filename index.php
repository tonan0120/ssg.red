<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>塔南的空间</title> 

	<style type="text/css"> 
		@import url(style.css);/*这里是通过@import引用CSS的样式内容*/ 
	</style> 
	
	<?php
		include"ssg.php";
	?>
	

	<script type="text/javascript">
		try {
			var urlhash = window.location.hash;
				if (!urlhash.match("fromapp"))
				{
					if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
					{
					window.location="http://ssg.red/mobile/mindex.php";
					}
				}
			}
		catch(err)
			{
			}
</script>
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

	<div  align="center">
		<h2>网 址 大 全</h2>
	</div>
	
	<!-- 百度搜索框 -->
	<form action="http://www.baidu.com/baidu" target="_blank">
		<div class="baidu"> 
			<input name=tn type=hidden value=baidu>
			<img src="http://img.baidu.com/search/img/baidulogo_clarity_80_29.gif" alt="Baidu" align="bottom" border="0">
			<input type=text name=word size=30 class="shuru">
			<input type="submit" value="百度搜索" class="anjian">
		</div>
	</form> 
<br/>
<?php
/* 1、连接服务器 */
/*$con = mysql_connect("qdm183517294.my3w.com","qdm183517294","tonan7788");*/
$con = mysql_connect($ssg_sql_address,$ssg_sql_acount,$ssg_sql_password);

if (!$con)
  {
  die('哎呀，数据库连接失败了，原因: ' . mysql_error());
  }

/* 2、连接数据库*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);

/* 3、设置数据编码*/
mysql_query("set names 'utf8'");
?>

<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->
	<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<?php
			
			$result = mysql_query("SELECT * FROM lei");/*result是 网站类型 表中的各个值集合*/
			/*mysql_data_seek($result,0);*/
			echo"<table>";
			while($row = mysql_fetch_array($result))/*row 是网站类型某一行数据*/
			  {  
				  $result1 = mysql_query("SELECT * FROM zhan WHERE leixing= '".$row['leixing']."'");/*result1是网站 表中符合制定网站类型的值的集合*/
				  $row1 = mysql_fetch_array($result1);/*row1 是网站地址的某一行数据，仅仅用来判断是否继续执行*/
				  if($row1 == true)
					  {
						echo"<tr>";
						echo"<th class='lefttitle'>";
						echo"<a class='title' >",$row['leixing'],"</a>";
						echo"</th>";
						echo"<td>";
						echo"<ul class='hang'>";
						mysql_data_seek($result1,0);
						  while($row2 = mysql_fetch_array($result1))/*row2 是网站地址表中的某一行数据*/
						  {
							echo"<li class='ge'>";
							echo"<a href='",$row2['wangzhi'],"'target='_blank'>",$row2['mingcheng'],"</a>";
							echo"</li>";
						  }
						echo"</ul>";
						echo"</td>";
						echo"</tr>";
					  }
					  
			  }
			echo"</table>";
			?>
	</div>
</div>

<div class="bottom">
	<div align="center">
		©2018 ssg &nbsp;&nbsp;&nbsp;
		<a href="http://www.miitbeian.gov.cn">冀ICP备18005584号-1</a>
	</div>
</div>
<?php
	mysql_close($con);
?>
</body>
</html>