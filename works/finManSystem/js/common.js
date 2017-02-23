/**
 * Created by Cream on 2016/3/29.
 */
//将底部栏固定在底部
$(window).resize(function () {
    var windowH=$(window).height();
    var bodyH=$(".header").height()+$(".top").height()+$(".banner").height()+$(".guide").height()+$(".guide").height()+$(".footer").height();
//    var bodyH=$("body").height;
    if(windowH<bodyH){
        $(".footer").removeClass("footFix");
    }else{
        $(".footer").addClass("footFix");
    }
});


