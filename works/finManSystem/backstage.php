<?php
require_once 'include.php';
checkAdmin();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理主页</title>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/backstage.css">
</head>
<body>
    <!--admin_top-->
    <div class="admin_top">
        <div class="inside">
            <div class="fl">
                <span class="fl">
                    欢迎您！&nbsp;&nbsp;
                    <?php echo $_SESSION['adminName'];?>&nbsp;&nbsp;
                    你的权限是：
                    <?php
                        if($_SESSION['isSuper']=="YES"){
                            echo "超级管理员";
                        }else{
                            echo "普通管理员";
                        }
                    ?>
                </span>
            </div>
            <h3 class="head_text fr">米米金融理财后台管理系统</h3>
        </div>
    </div>
<!--操作导航-->
    <div class="operation">
        <div class="inside">
            <!--面包屑-->
            <div class="link fl">
                <a href="#">米米金融</a>
                <span>&gt;&gt;</span>
                <a href="#">后台管理</a>
            </div>
            <!--操作-->
            <div class="link fr">
                <b>欢迎您！
                    <?php
            			if(isset($_SESSION['adminName'])){
            		        echo $_SESSION['adminName'];
            			}
                    ?>
                </b>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php">首页</a><span></span>
                <a href="doAdminAction.php?act=logout">退出</a>
            </div>
        </div>
    </div>
<!--操作界面-->
    <div class="content">
        <div class="inside">
            <!--左侧列表-->
            <div class="menu fl">
                <span class="title">管理员</span>
                <ul class="menu_list">
                    <li>
                        <h3><span>+</span>管理员管理</h3>
                        <dl class="hide">
                            <?php 
                            if($_SESSION['isSuper']==="YES"){
                                ?>
                                    <dd><a href="addAdmin.php" target="backFrame">添加管理员</a></dd>
                                    <dd><a href="adminList.php" target="backFrame">管理员列表</a></dd>
                                <?php
                            }
                            ?> 
                            <dd><a href="adminPwd.php" target="backFrame">修改密码</a></dd>
                        </dl>
                    </li>                   
                    <li>
                         <h3><span>+</span>会员管理</h3>
                         <dl class="hide">
                             <dd><a href="userList.php" target="backFrame">会员列表</a></dd>
                             <dd><a href="chargeRecord.php" target="backFrame">充值记录</a></dd>
                         </dl>
                    </li>
                    <li>
                         <h3><span>+</span>产品管理</h3>
                          <dl class="hide">
                              <dd><a href="addCate.php" target="backFrame">添加分类</a></dd>
                              <dd><a href="addPro.php" target="backFrame">添加产品</a></dd>
                              <dd><a href="proList.php" target="backFrame">产品列表</a></dd>
                          </dl>
                    </li>
                    <li>
                         <h3><span>+</span>消息管理</h3>
                          <dl class="hide">
                              <dd><a href="addNotice.php" target="backFrame">添加通知</a></dd>
                              <dd><a href="noticeList.php" target="backFrame">系统通知</a></dd>
                              <dd><a href="mesList.php" target="backFrame">用户留言</a></dd>
                          </dl>
                    </li>
                </ul>
            </div>
            <!--右侧内容-->
            <div class="main fl">
                <span class="title"><?php ?></span>
                <!--嵌套网页开始-->
                <iframe src="systemIntro.php"  frameborder="0" name="backFrame" width="100%" height="720"></iframe>
                <!--嵌套网页结束-->
            </div>
        </div>
    </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/backstage.js"></script>
</html>