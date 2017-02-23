<?php
require_once 'include.php';
checkLogined();
$id=$_REQUEST['id'];
$userId=$_SESSION['loginId'];
$money=$_POST['money'];
$proInfo=mysql_fetch_array(mysql_query("select * from product where id='$id'"));
$userInfo=mysql_fetch_array(mysql_query("select * from user where id='$userId'"));
if($money<10||$money==""){
	echo "<script>javascript:alert('请输入正确的金额！');history.back();</script>";
}elseif($proInfo['Premain']<$money){
	echo "<script>javascript:alert('可投金额不足！');history.back();</script>";
}elseif($userInfo['yuE']<$money){
	echo "<script>javascript:alert('余额不足！');history.back();</script>";
}else{
	$sales=$proInfo['sales']+$money;
	$Premain=$proInfo['Premain']-$money;
	$yuE=$userInfo['yuE']-$money;
	$pNumber=$proInfo['pNumber'];
	$pName=$proInfo['pName'];
	$pCate=$proInfo['pCate'];
	$pRate=$proInfo['pRate'];
	$pBuyer=$userInfo['username'];
	$query1=mysql_query("update product set sales='$sales',Premain='$Premain' where id='$id'");
	$query2=mysql_query("update user set yuE='$yuE' where id='$id'");
	$query3=mysql_query("insert into `order`(`pNumber`, `pName`, `pCate`, `pRate`, `pCount`, `pBuyer`) values ('$pNumber','$pName','$pCate','$pRate','$money','$pBuyer')");
	if($query1&&$query2&&$query3){
		echo "购买成功!<br/><a href='productDetail.php?id=$id'>继续购买</a>|<a href='index.php'>返回首页</a>";
	}else{
		echo "<script>javascript:alert('购买失败，重新购买！');history.back();</script>";
	}
}
?>