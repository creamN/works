<?php
require_once "include.php";
$adminName=$_POST['adminName'];
$adminPwd=$_POST['adminPwd'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if($verify!==$verify1){
	alertMes("验证码输入错误，请重新输入","adminLog.php");
}else{
	$sql="select * from admin where adminName='$adminName' and adminPwd='$adminPwd'";
	$query=mysql_query($sql);
	$rows=mysql_fetch_array($query);
	if ($rows) {
		$_SESSION['adminId']=$rows['id'];
		$_SESSION['adminName']=$rows['adminName'];
		$_SESSION['isSuper']=$rows['isSuper'];
		alertMes("管理员登录成功","backstage.php");
	}else{
		alertMes("登录失败，请重新登录","adminLog.php");
	}
}
