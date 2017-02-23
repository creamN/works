/**
 * Created by Cream on 2016/3/31.
 */
$(function () {
    $(".menu_list li h3").click(function () {
        if($menu=$(this).next("dl").hasClass("hide")){
            $(this).children("span").html("-").end().next("dl").removeClass("hide");
        }else{
            $(this).children("span").html("+").end().next("dl").addClass("hide");
        }
    });
});