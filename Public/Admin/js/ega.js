$(function(){
    $(".select_type").click(
        function(){
            var type =$(this).val();
            if(type == '0'){
                $(".sel").hide("normal");
            }else{
               $(".sel").show("normal");
            }
        }
)
//是否为筛选属性按钮切换
    $(".butage").click(function(){
    if($(this).next().val()==0){      
       $(this).next().val("1");
       $(this).css("background-image","url("+public_url+"/Common/img/on.jpg)");      
    }else{
       $(this).removeAttr("id");      
       $(this).next().val("0");
       $(this).css("background-image","url("+public_url+"/Common/img/off.jpg)");
    }   
    $(this).fadeIn(0);
    
})
//修改商品的属性
$("#modifyattr").click(function(){ 
    //-----------------------------------------
          
           var outwid = $("body",parent.document).outerWidth();
           var wid = parseInt((parseInt(outwid)-560)/2)+"px";
           var widmes = parseInt((parseInt(outwid)-360)/2)+"px";
           $(".fade",window.parent.document).show("fast",function(){
               $(".outmes",window.parent.document).css("left",widmes);
               $(".judgebody",window.parent.document).html("确定修改该属性吗？");
               $(".judge",window.parent.document).css("left",wid).slideDown("normal");
           });           
      
      
//-------------------
})
    $(".judgeend input",window.parent.document).click(function(){ 
                   if($(this).attr("id")=="affirm"){
                      $(".judge",window.parent.document).slideUp("fast",function(){
                        $(".fade",window.parent.document).hide("fast",function(){
                          $(".agform").submit();
                        });
                      })
              }
   })




})
