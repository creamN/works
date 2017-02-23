<!doctype html>
<html>
<head>
    <title>管理员登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/logreg.css">
</head>
<body>
<!--head-->
<div class="adminHeader">
    <div class="reg_inside inside">
        <a class="logo fl" href="index.php">米米金融</a>
        <h3 class="head_text fr">米米金融管理员登录</h3>
    </div>
</div>
<!--登录区域-->
<div class="loginBox">
	<div class="login_cont">
	<form class="info" name="form" method="post" action="doAdminLog.php">
		<ul class="login">
			<li class="int">
			    <p class="txt_null"><i class="warn"></i>管理员账号不能为空!</p>
			    <label for="adminName">管理员账号</label>
			    <input id="adminName" name="adminName" class="inputTxt" type="text" placeholder="管理员账号"/>
			</li>
			<li class="int">
			    <p class="txt_null"><i class="warn"></i>密码不能为空!</p>
			    <label for="adminPwd">密码</label>
			    <input id="adminPwd" name="adminPwd" class="inputTxt" type="password" placeholder="请输入密码"/>
			</li>
			<li class="int code">
                <p class="txt_null"><i class="warn"></i>验证码不能为空!</p>
                <label for="verify" class="fl">验证码</label>
                <input class="inputTxt" name="verify" type="text" id="verify"/>
                <i class="code_img fl"><img src="lib/code.php" alt="刷新验证码" onclick="this.src='lib/code.php?time='+new Date().getTime();"/></i>
            </li>
			<li class="submit_box">
			    <button type="submit" class="submit" id="submit">立即登录</button>
			</li>
		</ul>
		</form>
	</div>
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/regLog.js"></script>
</html>
