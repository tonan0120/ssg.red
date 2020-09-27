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

<?php

		if(!isset($_SESSION['username']))
			{	
				echo "$_SESSION[username]";
			}
			else
			{
				echo "<div>";
				echo "<a>$_SESSION[username]</a> <a href = '../exit.php'>退出</a>";
				echo "</div>";
			}
?>
