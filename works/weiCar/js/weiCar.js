$(function () {
    //协议勾选
    $(".choose i").click(function(){
        if($(this).hasClass("yes")){
            $(this).removeClass("yes").prev(".checked").removeAttr("checked");
        }
        else{
            $(this).addClass("yes").prev(".checked").attr("checked","checked");
        }
    });
    /*提交注册按钮点击事件*/
    $("#submit").click(function () {
        $(this).parent(".refer").hide().next(".verify").show();
        return false;
    });
    /*验证码倒计时*/
    var istime=true;
    $(".gain").click(function(){if(istime){getCode($(this),30)}})
    //获取验证码
    function getCode(a,n){//a:DOM节点,n:倒数秒数
        istime=false;
        a.val(n+"s");
        var times=setTimeout(changetime,1000);
        function changetime(){
            if(n>0){n--;a.val(n+"s");times=setTimeout(changetime,1000);}else{clearTimeout(times);a.val("重新获取");istime=true;}
        }
    }
    /*验证成功*/
    $("#ver_button").click(function () {
        $(this).parent(".verify").hide().next(".reg_success").show();
        return false;
    });
});