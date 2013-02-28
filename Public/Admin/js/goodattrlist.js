$(function(){
	$(".gdel").click(function(){
		var url = $(this).attr("url");
		//-----------------------------------------
		   var obj = $(this).parents("tr");
           var outwid = $("body",parent.document).outerWidth();
           var wid = parseInt((parseInt(outwid)-560)/2)+"px";
           var widmes = parseInt((parseInt(outwid)-360)/2)+"px";
           $(".fade",window.parent.document).show("fast",function(){
               $(".outmes",window.parent.document).css("left",widmes);
               $(".judgebody",window.parent.document).html("确定删除该属性吗？");
               $(".judge",window.parent.document).css("left",wid).slideDown("normal",function(){
                                  $(this).attr("flag","open");
               });
           }); 
          
      
          $(".judgeend input",window.parent.document).click(function(){
              var flag = $(".judge",window.parent.document).attr("flag");             
              if(flag =="open"){                  
                   if($(this).attr("id")=="affirm"){                      
                       $.ajax({
                           url:url,
                           type:"GET",
                           success:function(data){                           	
                               if(data==0){                                        
                                       $(".outmes .judgebody",window.parent.document).html("属性删除失败!");                                                                        
                                   }else{
                                       $(".outmes .judgebody",window.parent.document).css("color","blue").html("属性删除成功!");
                                       obj.css("display","none");                                                                    
                                   }
                                   $(".outmes",window.parent.document).slideDown("normal").delay(1000).slideUp("normal",function(){
                                                  $(".judge",window.parent.document).slideUp("fast",function(){
                                                         $(this).attr("flag","off");
                                                         $(".fade",window.parent.document).hide("fast",function(){
                                                             // $(".outmes",window.parent.document).stop(true,true);
                                                             // $(".outmes",window.parent.document).slideUp("fast");
                                                         });
                                                  });
                                        });    
                           }
                       })
              }              
          }
   })
		//-----------------------------------------
	})
})