<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!--
		在网站HTML文件的开头，增加viewport meta标签告诉浏览器视口宽度等于设备屏幕宽度，且不进行初始缩放。
		这段代码支持Chrome、Firefox、IE9以上的浏览器，但不支持IE8以及低于IE8的浏览器。
	 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 

	<title>塔南的空间移动端</title> 

	<style type="text/css"> 
		@import url(../stylemobile.css);/*这里是通过@import引用CSS的样式内容*/ 
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
  die('哎呀，数据库连接失败了，原因: ' . mysql_error());
  }

/* 2、连接数据库*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);

/* 3、设置数据编码*/
mysql_query("set names 'utf8'");
?>



<!-- 百度搜索 -->
	<form action="http://www.baidu.com/baidu" class= "mform">
		<div class="baidu">
			<input name=tn type=hidden value=baidu>
			<table class="msearchtable">
				<tr class="mtitle">
					<td class="title" colspan="2"><h1>百度搜索</h1></td>
				</tr>
				<tr class="msearchline">
					<td class="mleft">
						<!-- autoComplete 不显示历史输入记录 -->
						<input 
						type="text" 
						name="word" 
						autoComplete="off" 
						onFocus="if (value =='输入搜索内容'){value =''}" 
						onBlur="if (value ==''){value='输入搜索内容'}" 
						value="输入搜索内容" 
						class="mshuru" >
					</td>
					<td class="mright">
						<input type="submit" value="百度搜索" class="msubmit">
					</td>
				</tr>
			</table>
		</div>
	</form> 

</br>

<!-- 站点列表 -->
<div class="kuang"><!-- 网站导航 DIV，设置框居中用-->

	<?php			
		$result = mysql_query("SELECT * FROM lei");/*result是 网站类型 表中的各个值集合*/
		/*mysql_data_seek($result,0);*/
		
		$num = 1;/*num用来周期性改变li元素的class的值，就是在页面中显示不同CSS效果用*/
		while($row = mysql_fetch_array($result))/*row 是网站类型某一行数据*/
		  {  
			  $result1 = mysql_query("SELECT * FROM zhan WHERE leixing= '".$row['leixing']."'");/*result1是网站 表中符合制定网站类型的值的集合*/
			  $row1 = mysql_fetch_array($result1);/*row1 是网站地址的某一行数据，仅仅用来判断是否继续执行*/
			  if($row1 == true)
				  {
				  	echo"<div class='list'>";
					echo"<ul class='list1'>";
					mysql_data_seek($result1,0);
					  while($row2 = mysql_fetch_array($result1))/*row2 是网站地址表中的某一行数据*/
					  {
						echo"<li class='ge",$num,"'>";
						echo"<a href='",$row2['wangzhi'],"'>",$row2['mingcheng'],"</a>";
						echo"</li>";
					  }
					echo"</ul>";
					echo"<div class='mline'></div>";
					echo"</div>";
					$num = fmod($num,6) + 1;
				  }
				  
		  }
		
	?>
</div>
<div class="bottom">
	<div align="center">
		<hr>
		©2018 ssg &nbsp;&nbsp;&nbsp;
		<a href="http://www.miitbeian.gov.cn">冀ICP备18005584号-1</a>
	</div>
</br>
</div>

<?php
	mysql_close($con);
?>
</body>
</html>