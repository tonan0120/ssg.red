<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
	<title>�������</title> 
		<style type="text/css"> 
			@import url(../style.css);/*������ͨ��@import����CSS����ʽ����*/ 
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
			echo "<a>$_SESSION[username]</a> <a href = '../exit.php'>�˳�</a>";
			echo "</div></div>";
		}else
		{
			header("location: ../login.php");
			exit();
		}
?>

</br></br></br></br></br></br></br></br>
<?php
/* �������ݿ������ */
$con = mysql_connect($ssg_sql_address,$ssg_sql_acount,$ssg_sql_password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

/* 2���������ݿ�*/
/*mysql_select_db("qdm183517294_db", $con);*/
mysql_select_db($ssg_sql_database, $con);
mysql_query("set names 'utf8'");
/*����SQL���*/
$sql="insert into zhan (leixing,wangzhi,mingcheng) values ('$_POST[leixing]','$_POST[wangzhi]','$_POST[mingcheng]')";

/*ִ��SQL��䣬���ж��Ƿ�ɹ�*/
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<div class='kuang'><div  class='wangzhi'><div  align='center'>	<h4>������ӳɹ���</h4><a class='title' href='./houtai.php'>����</a></div></div></div>";

/*�ر����ݿ�����*/
mysql_close($con);
?>
</body>
</html>