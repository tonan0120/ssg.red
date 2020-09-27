<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>网址导航</title> 
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
	
</div>
</br>
</br>

</br>
</br><div align='center'><h2>登录页面</h2></div>
</br>
<div class='kuang'>
	<div  class='wangzhi'>
		<div  align='center'>	
			<form action="login2.php" method="post"><!-- 登录框 -->
				<table>
					
					<tr>
						<td>用户名：</td>
						<td><input type="text" name="name"/></td>
					</tr>
					<tr>
						<td>密&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
						<td><input type="text" name="password"/></td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<input type="submit" value="登 录"/>
						</td>
						</tr>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>