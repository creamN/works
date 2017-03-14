<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加管理员</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>添加管理员</h2>
    </div>
    <form action="doAdminAction.php?act=addAdmin" method="post">
    	<ul class="addAdmin">    		
			<li class="int">
				<label for="adminName">管理员名称</label>
				<input id="adminName" class="inputTxt" type="text" name="adminName" placeholder="请输入管理员名称"/>
			</li>
			<li class="int">
				<label for="adminPwd">管理员密码</label>
				<input id="adminPwd" class="inputTxt" type="password" name="adminPwd" placeholder="请设置管理员密码"/>
			</li>
			<li class="int isSuper">
				<span>管理员权限</span>
				<input type="radio" name="isSuper" value="NO" checked="checked"/>普通管理员
				<input type="radio" name="isSuper" value="YES"/>超级管理员
			</li>
			<li class="submit_box">
				<button type="submit" class="submit">添加管理员</button>
			</li>
		</ul>
    </form>
</div>
</body>
</html>