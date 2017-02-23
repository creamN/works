<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>修改管理员密码</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>修改密码</h2>
    </div>
    <form action="doAdminAction.php?act=changePwd" method="post">
    	<ul class="addAdmin">
			<li class="int">
				<label for="oldPwd">原密码</label>
				<input id="oldPwd" class="inputTxt" type="password" name="oldPwd"/>
			</li>
			<li class="int">
				<label for="newPwd">新密码</label>
				<input id="newPwd" class="inputTxt" type="password" name="newPwd" placeholder="请输入新密码"/>
			</li>
			<li class="int">
				<label for="confirmPwd">确认密码</label>
				<input id="confirmPwd" name="confirmPwd" class="inputTxt" type="password" placeholder="确认输入"/>
			</li>
			<li class="submit_box">
				<button type="submit" class="submit">修改</button>
			</li>
		</ul>
    </form>
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".submit").click(function () {
        var $newPwd=$("#newPwd").val();
        var $confirmPwd=$("#confirmPwd").val();
        if($(".int input").val()===""){
            alert("请检查输入！");
            return false;
        }else if($newPwd!==$confirmPwd){
            alert("两次密码输入不一致！"+$newPwd+$confirmPwd);
            return false;
        }
    });
});
</script>
</html>