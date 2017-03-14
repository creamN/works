<?php
require_once "include.php";
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加留言</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>添加留言</h2>
    </div>
    <div class="leave_mes">
        <form class="info" name="form" method="post" action="doAction.php?act=leaveMes">
            <textarea rows="6" cols="40" name="mContent"></textarea>
            <button type="submit" class="submit">提交留言</button>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".submit").click(function(){
        var $mes=$(this).prev().val();
        if($mes===""){
            alert("请输入内容");
            return false;
        }
    });
});
</script>
</html>