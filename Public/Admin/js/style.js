$(function(){
    $(".select img").click(function(){        
         $(".select").css("border-color","#BABABA").css("background-color","#fff");
         $(this).parent('.select').css("border-color","#FFB10D").css("background-color","#FFFCAA");
         var tpl_style = $(this).parent('.select').children("input[name='index_tpl_style']").val(); 
         var tpl_url =  $(this).parent('.select').children("input[name='index_tpl_dir_url']").val(); 
         var tpl_style_arr ={
             index_tpl_style:tpl_style,
             index_tpl_dir_url:tpl_url
         };
         $.ajax({
             type:'POST',
             url:CONTROL+'/change',
             data:tpl_style_arr,
             success:function(data){
                 if(data){
                     alert("修改成功!");
                 }else{
                     alert("修改失败!");
                 }
             }
         })
    })
})

