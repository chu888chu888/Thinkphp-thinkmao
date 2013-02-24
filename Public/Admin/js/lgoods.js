$(function(){
    //初始化iframe的高度
	$(".right iframe",window.parent.document).css("height",function(){
		return "626px";
	})
        var gid;
       $(".gdel").click(function(){
           gid = $(this).attr("gid");
           var outwid = $("body",parent.document).outerWidth();
           var wid = parseInt((parseInt(outwid)-560)/2)+"px";
           var widmes = parseInt((parseInt(outwid)-360)/2)+"px";
           $(".fade",window.parent.document).show("fast",function(){
               $(".outmes",window.parent.document).css("left",widmes);
               $(".judge",window.parent.document).css("left",wid).slideDown("normal",function(){
                                  $(this).attr("flag","open");
               });
           }); 
          
       })
          $(".judgeend input",window.parent.document).click(function(){
              var flag = $(".judge",window.parent.document).attr("flag");             
              if(flag =="open"){                  
                   if($(this).attr("id")=="affirm"){                      
                       $.ajax({
                           url:del_url+"?id="+gid,
                           type:"GET",
                           success:function(data){
                               if(data==0){                                        
                                        $(".outmes .judgebody",window.parent.document).html("商品删除失败!");                                                                        
                                   }else{
                                       $(".outmes .judgebody",window.parent.document).css("color","blue").html("商品删除成功!"); 
                                       $(".gdel[gid="+gid+"]").parents("tr").css("display","none");                                       
                                   }
                                   $(".outmes",window.parent.document).slideDown("normal").delay(1000).slideUp("normal",function(){
                                                  $(".judge",window.parent.document).slideUp("fast",function(){
                                                         $(this).attr("flag","off");
                                                         $(".fade",window.parent.document).hide("fast",function(){
                                                             $(".outmes",window.parent.document).stop(true,true);
                                                         });
                                                  });
                                        });    
                           }
                       })
              }              
          }
   })
})