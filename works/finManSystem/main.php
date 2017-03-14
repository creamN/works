<?php
require_once "include.php";
checkLogined();
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>个人中心</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--user_top-->
    <div class="user_top">
        <div class="inside">
            <div class="fl">
                <span class="fl">
                    欢迎您！&nbsp;&nbsp;
                    <?php echo $_SESSION['username'];?>
                </span>
            </div>
            <h3 class="head_text fr">米米金融个人中心</h3>
        </div>
    </div>
    <!--操作导航-->
    <div class="operation">
        <div class="inside">
            <!--面包屑-->
            <div class="link fl">
                <a href="index.php">米米金融</a>
                <span>&gt;&gt;</span>
                <a href="main.php">个人中心</a>
            </div>
            <!--操作-->
            <div class="link fr">
                <b>欢迎您！
                    <?php
            			if(isset($_SESSION['username'])){
            		        echo $_SESSION['username'];
            			}
                    ?>
                </b>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="main.php">首页</a><span></span>
                <a href="index.php">网站首页</a><span></span>
                <a href="doAction.php?act=userOut">退出</a>
            </div>
        </div>
    </div>
    <!--操作界面-->
    <div class="oper_con">
        <div class="inside">
            <!--左侧列表-->
            <div class="menu fl">
                <span class="title"><?php echo $_SESSION['username'];?></span>
                <ul class="menu_list">
                    <li>
                        <h3><span>+</span>账户中心</h3>
                        <dl class="hide">
                            <dd><a href="userInfo.php" target="mainFrame">资料管理</a></dd>
                            <dd><a href="userPwd.php" target="mainFrame">密码修改</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>+</span>我的理财</h3>
                        <dl class="hide">
                            <dd><a href="userYuE.php" target="mainFrame">我的余额</a></dd>
                            <dd><a href="userOrder.php" target="mainFrame">我的订单</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>+</span>消息中心</h3>
                        <dl class="hide">
                            <dd><a href="leaveMes.php" target="mainFrame">添加留言</a></dd>
                            <dd><a href="userMessage.php" target="mainFrame">我的留言</a></dd>
                            <dd><a href="notice.php" target="mainFrame">系统消息</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <!--右侧内容-->
            <div class="main fl">
                <span class="title">个人中心</span>
                <!--嵌套网页开始-->
                <iframe src="systemIntro.php"  frameborder="0" name="mainFrame" width="1000" height="750"></iframe>
                <!--嵌套网页结束-->
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>