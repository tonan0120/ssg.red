<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>页面修改</title> 
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
  die('Could not connect: ' . mysql_error());
  }

/* 2、连接数据库*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);

/* 3、设置数据编码*/
mysql_query("set names 'utf8'");
?>

<div class="top"><!-- 顶部导航栏 -->
	<div class = "left">
		<img src="../favicon.ico" alt="ssg" border="0" width="20px"><a href="/index.php" class="sitename1">塔南的空间</a>
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
		<h2 class="title">页面修改</h2>
	</div>
	<div class="kuang2"><!-- 网站导航 DIV，设置框居中用-->
		<div  class="wangzhi"><!-- 网址DIV，设置内容左对齐用 -->
		<form >
			<table>
				<tr>
					<td class="xuhao"><h4>序号</h4></th>
					<td class="mingcheng"><h4>名称</h4></th>
					<td class="wangzhi"><h4>网址</h4></th>
					<td class="leixing"><h4>网站类别</h4></th>
					<td class="bianji" colspan="2"><h4>编辑</h4></th>
				</tr>
			</table>
		</form>
				 <?php
				/*在lei表中获取所有类型*/
				$result = mysql_query("SELECT * FROM lei");
				mysql_data_seek($result,0);
				while($row = mysql_fetch_array($result))
				  {  
					  
					  /*在zhan表中以类型查询所有数据*/
					  $result1 = mysql_query("SELECT * FROM zhan WHERE leixing='".$row['leixing']."'");
						while($row1 = mysql_fetch_array($result1))
						{  
							  echo"<form action='update.php' method='post'>";
							  echo"<table>";
							  echo"<tr>";
							  echo"<td class='xuhao' ><input type='hidden' name='id' value='".$row1['id']."'/>".$row1['id']."</td>";
							  echo"<td class='mingcheng'><input class='mingcheng' name='mingcheng' value='".$row1['mingcheng']."'></td>";					
							  echo"<td class='wangzhi'><input name='wangzhi' class='wangzhi'  value='".$row1['wangzhi']."'></td>";
							  echo"<td class='leixing'>";
								  echo"<select name='leixing'>";
									  echo"<option value= '".$row1['leixing']."'>".$row1['leixing']."</option>";
									  $result3 = mysql_query("SELECT * FROM lei");
									  mysql_data_seek($result3,0);
									  while($row3 = mysql_fetch_array($result3))
										  {
											  echo "<option value='".$row3['leixing'],"'>".$row3['leixing']."</option>";
										  }
								  echo"</select>";
							  echo"</td>";
							  echo"<td class='gengxin'>";
							  echo"<input type='submit' name='submit' value='更新'></input>";
							  echo"</td>";
							  echo"<td class='shanchu'>";
							  echo"<a class='button' href='delete.php?id=".$row1['id']."'>删除</a>";
							  echo"</td>";
							  echo"</tr>";
							  echo"</table>";
							  echo"</form>";
							  
						  }

				  }
				  ?>  
			<table>
				<tr>
					<td colspan="5" align="center" class="fanhui">
						<a class="button" href="/">返回</a>
					</td>
				</tr>
			</table>
<?php
	mysql_close($con);
?>
		</div>
	</div>



</body>