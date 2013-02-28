$(function(){
	$(".right iframe",window.parent.document).css("height",function(){		
        return 1350+"px";
    })
    $(".add_cate").click(function(){
        var obj = $("#tmplate").clone();
        obj.children().children('span').attr("class","cate_del").text("del-");
        obj.insertAfter($(this));
    })
    $(".cate_del").live("click",function(){
         $(this).parent().parent().remove();
    })
   
    $(".butage").click(function(){
    $(this).fadeOut("fast");
    if($(this).attr("flag")==0){
        $(this).attr("flag",1);
       $(this).next().val("1");
       $(this).css("background-image","url("+public_url+"/Common/img/on.jpg)");      
    }else{
       $(this).attr("flag",0);
       $(this).next().val("0");
       $(this).css("background-image","url("+public_url+"/Common/img/off.jpg)");
    }   
    $(this).fadeIn(0);
    
})
})