$(document).ready(function(){
    var h=window.innerHeight;
    $(".header").height(h);
    $(window).resize(function(){
        var h=window.innerHeight;
        $(".header").height(h);
    });
});



//页面滚动事件
$(".scroll").click(function(event){
    event.preventDefault();   //取消事件默认动作
    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
//隐藏href的#（哈希值）
$(function(){
    addEventListener("load",function(){
            setTimeout(hideURLbar, 0);
        }, false
    );
    function hideURLbar(){ window.scrollTo(0,1);
    }
});
