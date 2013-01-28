/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function changePrice(size,color){
    var number = $("#num").val();
    var goodsId = $("#goodid").val();
    var attr=size+','+color;
    var obj={
        act:"price",
        id:goodsId,
        attr:attr,
        number:number
    };
//    $.ajax({
//        type:"GET",
//        url:"goods.php",
//        data:obj,
//        success:function(res){
//            eval("var res = "+res);
//            if (res.err_msg.length > 0)
//            {
//                alert(res.err_msg);
//            }
//            else
//            {
//                $("#total_price").text(res.result);
//            }
//        }
//    })


}

$(function(){
    var size_id;
    var color;
    $(".s_p").click(function(){
         $(".s_p").css("border","1px solid #E2E1E3");
        $(this).css("border","2px solid #BB1C19");
        color = $(this).children("input").val();

        changePrice(size_id,color);
    })
    $(".size li").click(function(){
        $(".size li").css("border","1px solid #E2E1E3");
        $(this).css("border","2px solid #BB1C19");
        size_id = $(this).children("input").val();

        changePrice(size_id,color);
    })
    changePrice();
    $("#up").click(function(){
        var number = $("#num").val();
        $("#num").val(parseInt(number)+1);
        changePrice(size_id,color);
    })
    $("#down").click(function(){
        var number = $("#num").val();
        if(number>1){
            $("#num").val(parseInt(number)-1);
        }
        changePrice(size_id,color);
    })

})


