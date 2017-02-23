<?php
//注册
function reg(){
	$username=$_POST['username'];
	//$password=md5($_POST['password']);
	$password=$_POST['password'];
	$verify=$_POST['verify'];
	$verify1=$_SESSION['verify'];
	if($verify!==$verify1){
		alertMes("验证码输入错误，请重新输入","userReg.php");
	}else{
		$sql="select username from user where username='$username'";
		$query=mysql_query($sql);
		$rowsCount=mysql_num_rows($query);
		if($rowsCount>0){
			echo "<script>javascript:alert('对不起，该用户名已存在！');history.back();</script>";
		}else{
			$sql="insert into user(username,password) values('$username','$password')";
			mysql_query($sql);
			alertMes("注册成功，去登录!","userLog.php");
		}
	}
}
//登录
function login(){
	$username=$_POST['username'];
	//$password=md5($_POST['password']);
	$password=$_POST['password'];
	$verify=$_POST['verify'];
	$verify1=$_SESSION['verify'];
	if($verify!==$verify1){
		alertMes("验证码输入错误，请重新输入","userLog.php");
	}else{
		$sql="select * from user where username='{$username}' and password='{$password}'";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		//echo $rows['id'].$rows['username'];
		if($rows){
			$_SESSION['loginId']=$rows['id'];
		    $_SESSION['username']=$rows['username'];
		    alertMes("登录成功,去首页","index.php");
		}else{
			alertMes("登录失败，请重新登录","userLog.php");
		}
	}
}
//注销
function userOut(){
	$_SESSION['loginId']="";
    $_SESSION['username']="";
	alertMes("注销成功","index.php");
}

//用户资料修改
function alertInfo(){
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
}

//修改密码
function alterPwd(){
	$username=$_SESSION['username'];
	$rows=mysql_fetch_array(mysql_query("select * from user where username='$username'"));
	//$oldPwd=md5($_POST['oldPwd']);
	$oldPwd=$_POST['oldPwd'];
	//$newPwd=md5($_POST['newPwd']);
	$newPwd=$_POST['newPwd'];
	/*echo "旧密码：".$oldPwd."<br/>";
	echo "新密码：".$newPwd."<br/>";
	echo "数据库存储的密码：".$rows['password']."<br/>";*/
	if($oldPwd!==$rows['password']){
		echo "<script>javascript:alert('原密码输入错误，请重新输入！');history.back();</script>";
	}else{
		$query=mysql_query("update user set password='$newPwd' where username='$username'");
		if($query){
			echo "<script>javascript:alert('修改成功！');history.back();</script>";
		}else{
			echo "<script>javascript:alert('修改失败！');history.back();</script>";
		}
	}
}

//判断是否有无用户登录
function checkLogined(){
	if(!isset($_SESSION['loginId'])||empty($_SESSION['loginId'])){
		alertMes("请先登录","userLog.php");
	}
}

//提交留言
function leaveMes(){
	$mContent=$_POST['mContent'];
	$username=$_SESSION['username'];
	/*echo $username."<br/>".$mContent;*/
	$mesQuery=mysql_query("INSERT INTO `message`(`username`, `mContent`) VALUES ('$username','$mContent')");
	if($mesQuery){
		echo "提交留言成功!<br/><a href='leaveMes.php'>返回继续留言</a>|<a href='userMessage.php'>查看我的留言</a>";
	}else{
		echo "<script>javascript:alert('提交留言失败！');history.back();</script>";
	}
}

//卖出产品
function sellPro($id){
	$sql="select * from `order` where `id`='$id'";
	$query=mysql_query($sql);
    $rows=mysql_fetch_array($query);
	$addTime=$rows['addTime'];
	$pCount=$rows['pCount'];
	$pRate=$rows['pRate'];
	$pBuyer=$rows['pBuyer'];
	$soldTime=time();
	$days=round(($soldTime-strtotime($addTime))/3600/24);
	$earn=round($pCount*$pRate*$days/365,2); 
	$sellQuery=mysql_query("update `order` set isExpire='YES',soldTime='$soldTime',earn='$earn' where id='$id'");
	if($sellQuery){
		$userQuery=mysql_query("select yuE,earn from user where username='$pBuyer'");
		$userRow=mysql_fetch_array($userQuery);
		$yuE=$userRow['yuE']+$earn;
		$earn=$userRow['earn']+$earn;
		$earnQuery=mysql_query("update `user` set yuE='$yuE',earn='$earn' where username='$pBuyer'");
		if($earnQuery){
			echo "卖出成功，收益已达账户!<br/><a href='userOrder.php'>返回我的订单</a>|<a href='userYuE.php'>查看我的余额</a>";
		}else{
			echo "<script>javascript:alert('卖出成功，收益审核中！');history.back();</script>";
		}
	}else{
		echo "<script>javascript:alert('产品卖出失败，请查看！');history.back();</script>";
	}
}

//删除订单
function delOrder($id){
	$sql="delete from `order` where `id`='$id'";
	$query=mysql_query($sql);
	$rowsCount=mysql_affected_rows();
	if($rowsCount){
		echo "<script>javascript:alert('删除成功！');history.back();</script>";
	}else{
		echo "<script>javascript:alert('删除失败！');history.back();</script>";
	}	
}