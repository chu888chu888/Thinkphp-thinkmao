$(function(){
    $('.zb').live('click',function(){ 
        var time = new Date();
        var times = time.getTime()+Math.round(Math.random()*1000);       
        if($(this).attr("class")=='series0 zb'){
            $(this).attr("class","series1 zb");
            var num = $(this).index();
            $(".zzd").eq(num).attr("value",times);
        }else{
            $(this).attr("class","series0 zb");
            var num = $(this).index();
            $(".zzd").eq(num).attr("value",0);
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
