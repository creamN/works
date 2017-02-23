<?php
require_once "include.php";
?>
<!doctype html>
<html>
<head>
    <title>会员注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/logreg.css">
</head>
<body>
<!--header-->
<div class="header">
    <div class="inside reg_inside">
        <a class="logo fl" href="index.php">米米金融</a>
        <span class="title" fl>注册</span>
        <span class="state fr">已有账户，请&nbsp;<a href="userLog.php" class="">登录</a></span>
    </div>
</div>
<!--登录区域-->
<div class="loginBox">
	<div class="login_cont">
	<form class="info" name="form" method="post" action="doAction.php?act=reg">
		<ul class="login">
			<li class="int">
			    <p class="txt_null"><i class="warn"></i>用户名不能为空!</p>
			    <label for="username">用户名</label>
			    <input id="username" name="username" class="inputTxt" type="text" placeholder="请输入用户名"/>
			</li>
			<li class="int">
			    <p class="txt_null"><i class="warn"></i>密码不能为空!</p>
			    <p class="txt_error"><i class="warn"></i>密码为6到16位数字或字母！</p>
			    <label for="password">密码</label>
			    <input id="password" name="password" class="inputTxt" type="password" placeholder="请输入6到16位数字或字母"/>
			</li>
			<li class="int">
			    <p class="txt_null"><i class="warn"></i>确认密码不能为空!</p>
			    <p class="txt_error"><i class="warn"></i>两次输入密码不一致</p>
			    <label for="confirmPwd">确认密码</label>
			    <input id="confirmPwd" class="inputTxt" type="password" placeholder="请再次输入密码"/>
			</li>			
			<li class="int code">
                <p class="txt_null"><i class="warn"></i>验证码不能为空!</p>
                <label for="verify" class="fl">验证码</label>
                <input class="inputTxt" name="verify" type="text" id="verify"/>
                <i class="code_img fl"><img src="lib/code.php" alt="刷新验证码" onclick="this.src='lib/code.php?time='+new Date().getTime();"/></i>
            </li>
			<li class="submit_box">
			    <button type="submit" class="submit" id="submit">立即注册</button>
			</li>
		</ul>
		</form>
	</div>
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/regLog.js"></script>
</html>
