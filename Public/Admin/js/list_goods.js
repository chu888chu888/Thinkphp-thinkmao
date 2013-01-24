$(function(){
    $('.zb').live('click',function(){
        
        if($(this).attr("class")=='series0'){
            $(this).attr("class","series1");
            var num = $(this).index();
            $(".zzd").eq(num).attr("value",num+1);
        }else{
            $(this).attr("class","series1");
            var num = $(this).index();
            $(".zzd").eq(num).attr("value",num+1);
        }
    })
   
    $(".add").click(function(){
        var obj = $("#tmplate").clone(true);
        obj.children("#gnum").append('<span class="ldel">del-</span>');
        $("#tbody").append(obj);
    })
    $(".ldel").live("click",function(){
        $(this).parent().parent().remove();
    })
    $(".adde").click(function(){
        var obj2 = $(".tmplate").last().clone(true);        
        $("#tbody").append(obj2);       
    })
    
})
