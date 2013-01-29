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
    $("#gsel").click(function(){
           if($(this).next().val()==0){
               $(this).next().val(1);
               $(this).css("background-color","red");
           }else{
               $(this).next().val(0);
               $(this).css("background-color","blue");
           }

    })







})
