$(function(){
    $(".remark").click(function(){
        if($(this).children('input').length==0){
        $mes = $(this).text();
        $(this).text('');
        var obj =$("<input/>");
        obj.attr("class","iput");
        obj.val($mes);
        obj.prependTo($(this));
        }
    })
    $(".iput").live("blur",function(){
                  var id = $(this).parent().prev().children('input').val();
                  var mes = $(this).val();
                  $(this).parent('td').text(mes);
                  $(this).empty();
                  var obj = {
                      "remark":mes,
                      "id":id
                  }
                  $.ajax({
                      type:"POST",
                      url:mod,
                      data:obj,
                      success:function(){

                      }
                  })

    })

})

