<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$rows=mysql_fetch_array(mysql_query("select * from user where username='$username'"));
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>充值</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>密码修改</h2>
    </div>
    <div class="user_pwd">
        <form method="post" name="form" method="post" action="doAction.php?act=alterPwd">
        	<ul class="login">
                <li class="int">
                	<p class="txt_null"><i class="warn"></i>原密码不能为空!</p>
                	<p class="txt_error"><i class="warn"></i>密码为6到16位数字或字母！</p>
                    <label for="oldPwd">原密码</label>    
                    <input id="oldPwd" name="oldPwd" class="inputTxt" type="password"/>              
                </li> 
                <li class="int">
                	<p class="txt_null"><i class="warn"></i>新密码不能为空!</p>
                	<p class="txt_error"><i class="warn"></i>密码为6到16位数字或字母！</p>
                    <label for="newPwd">新密码</label>    
                    <input id="newPwd" name="newPwd" class="inputTxt" type="password"/>              
                </li>  
                <li class="int">
                	<p class="txt_null"><i class="warn"></i>确认密码不能为空!</p>
                	<p class="txt_error"><i class="warn"></i>两次输入密码不一致</p>
                    <label for="confirmPwd">确认密码</label>    
                    <input id="confirmPwd" name="confirmPwd" class="inputTxt" type="password"/>             
                </li>
                <li class="submit_box">
                    <button type="submit" class="submit" id="submit">确认修改</button>            
                </li>                  
            </ul>                               	
        </form>
    </div>   
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	//验证原密码
    $("#oldPwd").blur(function () {
    	
        var $value=$(this).val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
            $(this).prevAll(".txt_error").hide();
        }else if($value.length<6||$value.length>16){
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").show();
        }else{
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").hide();
        }
    });	
    //验证新密码	
    $("#newPwd").blur(function () {
    	
        var $value=$(this).val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
            $(this).prevAll(".txt_error").hide();
        }else if($value.length<6||$value.length>16){
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").show();
        }else{
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").hide();
        }
    });	
    //验证确认密码
    $("#confirmPwd").blur(function () {
        var $value=$(this).val();
        var $value1=$("#newPwd").val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
            $(this).prevAll(".txt_error").hide();
        }else if($value!==$value1){
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").show();
        }else {
            $(this).prevAll(".txt_null").hide();
            $(this).prevAll(".txt_error").hide();
        }
        });
    $("#submit").click(function () {
        if($(".login .int p").is(":visible")||$(".login .int input").val()===""){
            alert("请检查输入");
            return false;
        }
    });
});
</script>
</html>