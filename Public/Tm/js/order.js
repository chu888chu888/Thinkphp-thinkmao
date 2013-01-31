$(function(){
    $("#add_address").click(function(){
       $("#address").toggle();
    })
    $(".address li").click(function(){
        $(".address li").attr("class","");
        $(this).attr("class","select_address");
    })
    $("#put_order").click(function(){
       var oid = $(".address li[class='select_address']").children("input").val();
       var data ={
           "oid":oid
       }
       $.ajax({
           type:"POST",
           url:put_url,
           data:data,
           success:function(mes){
                  if(mes==1){
                      alert('订单申请成功');
                      location.href=index;
                  }else{
                       alert('订单申请失败');
                  }
           }
       })
    })
})
