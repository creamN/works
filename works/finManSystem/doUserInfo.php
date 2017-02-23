<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$realname=$_POST['realname'];
$phone=$_POST['phone'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$address=$_POST['address'];
$sql="update user set name='$realname',phone='$phone',sex='$sex',email='$email',address='$address' where username='$username'";
$query=mysql_query($sql);
if($query){
	echo "<script>javascript:alert('修改成功，返回！');history.back();</script>";
}else{
	echo "<script>javascript:alert('修改失败，重新修改！');history.back();</script>";
}
?>