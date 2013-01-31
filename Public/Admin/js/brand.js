$(function(){
    $(".add_cate").click(function(){
        var obj = $("#tmplate").clone();
        obj.children().children('span').attr("class","cate_del").text("del-");
        obj.insertAfter($(this));
    })
    $(".cate_del").live("click",function(){
         $(this).parent().parent().remove();
    })
   
})