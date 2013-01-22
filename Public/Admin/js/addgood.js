$(function(){
    $(".innerbox").eq(0).css("display","block");
    $(".guid li").eq(0).css("background-color","#eee").css("color","red");
    $(".guid li").click(function(){
        $(".guid li").css("background-color","#009A61").css("color","#fff");
        $(this).css("background-color","#eee").css("color","red");
        var num = $(this).index();
        $(".innerbox").css("display","none");
        $(".innerbox").eq(num).css("display","block");
    })
    
    
    $("#cate").change(function(){
        var obj = $("option:selected",this);
        var pid = obj.attr('pid');
        if(pid == 0){
            alert('顶级栏目无法添加商品');
            $("option",this).eq(0).attr("selected",true);
        }
    })
    
    
    function list_brands(){
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
})
