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
</br></br></br></br></br></br></br></br>
<?php
	unset($_SESSION['username']);
	session_destroy();
?>
<div class='kuang'>
	<div  class='wangzhi'>
		<div  align='center'>
			<h3>您已退出登录！</h3>
			<a class='title' href='login.php'>返回登录页</a>
		</div>
	</div>
</div>

</body>
</html>