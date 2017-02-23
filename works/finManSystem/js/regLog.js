//会员登录注册验证
$(function(){
    //验证用户名
    $("username").blur(function () {
        var $value=$(this).val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
        }else{
            $(this).prevAll(".txt_null").hide();
        }
    });
    //验证密码
    $("#password").blur(function () {
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
        var $value1=$("#password").val();
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
    //验证验证码
    $("#verify").blur(function () {
        var $value=$(this).val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
        }else{
            $(this).prevAll(".txt_null").hide();
        }
    });
    //登录注册事件
    $("#submit").click(function () {
        if($(".login .int p").is(":visible")||$(".login .int input").val()===""){
            alert("请检查输入");
            return false;
        }
    });
});

//管理员登录添加验证
$(function(){
    //验证输入是否为空
    $(".login .int .inputTxt").blur(function () {
        var $value=$(this).val();
        if($value==""){
            $(this).prevAll(".txt_null").show();
        }else{
            $(this).prevAll(".txt_null").hide();
        }
    });
});

