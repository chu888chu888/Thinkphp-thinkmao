$(function(){
    /**
     * 设定套餐
     */
    $('.zb').live('click',function(){
        var time = new Date();
        var times = time.getTime()+Math.round(Math.random()*1000);
        if($(this).attr("class")=='series0 zb'){
            $(this).attr("class","series1 zb");
            var num = $(this).index();
            $(this).next().attr("value",times);
            var price = prompt("请输入该套餐的价格：",0);
            $(this).val(price);
            $(this).next().next().attr("value",price);
        }else{
            $(this).attr("class","series0 zb");
            var num = $(this).index();
            $(this).val('');
            $(this).next().attr("value",0);
            $(this).next().next().attr("value",0);
        }
    })
     /**
      * 添加库存列表
      */
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
