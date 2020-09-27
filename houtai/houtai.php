<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>页面编辑</title> 
		<style type="text/css"> 
			@import url(../style.css);/*这里是通过@import引用CSS的样式内容*/ 
		</style> 
		 <?php
		include"../ssg.php";
	?>
</head> 

<body>

<?php
/* 1、连接服务器 */
/*$con = mysql_connect("qdm183517294.my3w.com","qdm183517294","tonan7788");*/
$con = mysql_connect($ssg_sql_address,$ssg_sql_acount,$ssg_sql_password);

if (!$con)
  {
  die('Could not connect1: ' . mysql_error());
  }

/* 2、连接数据库*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);

/* 3、设置数据编码*/
mysql_query("set names 'utf8'");
?>

<div class="top"><!-- 顶部导航栏 -->
	<div class = "left">
		<img src="../favicon.ico" alt="ssg" border="0" width="20px"><a href="../index.php" class="sitename1">塔南的空间</a>
	</div>
	<div class = "right">
	<?php
		if(isset($_SESSION['username']))
		{
			echo "<a href = './houtai/houtai.php'>$_SESSION[username]</a> <a href = '../exit.php'>退出</a>";
		}else
		{
			header("location: ../login.php");
			exit();
		}
	?>
	</div>
</div>

	


<div align="center">
	<h2>添加内容</h2>
</div>
<!-- 添加网站 -->
<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->
	<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<div  align="center"><!-- 网址DIV，设置内容居中 -->
			
			<!-- 添加网站框 -->
			<form action="insert.php" method="post">
			<table>
				<tr>
					<th>类别</th>
					<td>
						<select name="leixing">
							<option value= " "> </option>
							<?php
							$result = mysql_query("SELECT * FROM lei");
							mysql_data_seek($result,0);
							while($row3 = mysql_fetch_array($result))
								  {
									  echo "ceshi";
									  echo "<option value='".$row3['leixing'],"'>".$row3['leixing']."</option>";
								  }
							?>
						</select>
					 </td>
				</tr>
				<tr>
					<th>网站名称</th>
					<td><input type="text" name="mingcheng" /></td>
				</tr>
				<tr>
					<th>网址</th>
					<td><input type="text" name="wangzhi" /></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" value="提 交"/></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>

<!-- 添加类型 -->
<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->
	<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<div  align="center"><!-- 网址DIV，设置内容居中 -->
	
			<!-- 添加网站框 -->
			<form action="insert2.php" method="post">
			<table>
				<tr>
					<th>添加网站类型</th>
					<td>
						<input type="text" name="leixing" />
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input type="submit" value="提 交"/>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>

<!-- 查询 添加 删除 修改 -->
<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->
	<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<div  align="center"><!-- 网址DIV，设置内容居中 -->
	
			<!-- 添加网站框 -->
			<form action="insert2.php" method="post">
			<table>
				<tr>
					<th><a href="content_change.php">修改内容</a></th>		
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>

<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->
	<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<div  align="center"><!-- 网址DIV，设置内容居中 -->
			<a href="/">返回首页</a>
		</div>
	</div>
</div>
<?php
	mysql_close($con);
?>
</body>
</html>