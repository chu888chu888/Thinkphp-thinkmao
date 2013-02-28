$(function(){
      $(".right iframe",window.parent.document).css("height",function(){
        return "10026px";
    })
      var obj;
    $("#modify").click(function(){
    	obj = $(".form")
         var outwid = $("body",parent.document).outerWidth();
           var wid = parseInt((parseInt(outwid)-560)/2)+"px";
           var widmes = parseInt((parseInt(outwid)-360)/2)+"px";
           $(".fade",window.parent.document).show("fast",function(){             
               $(".judgebody",window.parent.document).html("确定删除该类型吗？");
               $(".judge",window.parent.document).css("left",wid).slideDown("normal");
           });          
	})
	  $(".judgeend input",window.parent.document).click(function(){ 
                   if($(this).attr("id")=="affirm"){
                      $(".judge",window.parent.document).slideUp("fast",function(){
                        $(".fade",window.parent.document).hide("fast",function(){
                          obj.submit();
                        });
                      })
              }
   })
    })
})
