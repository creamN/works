//首页banner切换（带下标的图片切换）
function switchAlpha(a,t1,t2){
    var n=a.find(".list").children("li").length;
    var dot=a.parent().find(".dot").children("a");
    a.find(".list").children("li").slice(1).css("opacity","0");
    var i=0;
    function toAlpha(t){
        if(i<n-1){i++;}else{i=0;}
        a.find(".list").children("li").eq(i).css("z-index","2").animate({opacity:1},t).siblings().css("z-index","1").animate({opacity:0},t)
        dot.eq(i).addClass("hover").siblings().removeClass("hover")
    }
    var timeac=setInterval(function(){toAlpha(t2)},t1);
    a.hover(function(){clearInterval(timeac);},function(){timeac=setInterval(function(){toAlpha(t2)},t1)})
    dot.click(function(){
        $(this).addClass("hover").siblings().removeClass("hover");
        i=$(this).index();
        a.find("li").eq(i).css("z-index","2").animate({opacity:1},t2).siblings().css("z-index","1").animate({opacity:0},t2)
    })
}

switchAlpha($(".switchAlpha"),5000,200)