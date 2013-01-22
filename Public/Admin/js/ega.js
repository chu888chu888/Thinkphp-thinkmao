$(function(){
    $(".select_type").click(
        function(){
            var type =$(this).val();
            if(type == '0'){
//                $(".sel").css("background-color","#ccc").css("color","#ccc");
                $(".sel").css("display","none");
            }else{
//                $(".sel").css("background-color","#fff").css("color","#000");
               $(".sel").css("display","block");
            }
        }
)
})
