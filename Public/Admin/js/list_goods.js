$(function(){
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
