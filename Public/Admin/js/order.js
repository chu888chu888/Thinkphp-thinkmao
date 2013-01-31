$(function(){
    $(".remark").click(function(){
        if($(this).children('input').attr('class')!='iput'){
        $mes = $(this).text();
        $(this).text('');
        var obj =$("<input/>");
        obj.attr("class","iput");
        obj.val($mes);
        obj.prependTo($(this));
        }
    })
    $(".iput").live("blur",function(){
                  var id = $(this).next().val();
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

