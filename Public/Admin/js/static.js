$(function(){
    
    $(".add1").click(function(){
        $(".add").attr("checked","checked")
    })
    $(".add2").click(function(){
        $(".add").attr("checked",false)
    })
      $(".del1").click(function(){
        $(".del").attr("checked","checked")
    })
    $(".del2").click(function(){
        $(".del").attr("checked",false)
    })
    $(".sub").click(function(){
        var add = '';
        var del='';
        $(".add").each(
        function(){
         
            if($(this).attr('checked') == 'checked'){
                    add = add +','+ $(this).val()                  
            }
               }
          )
               $(".del").each(
        function(){
         
            if($(this).attr('checked') == 'checked'){
                    del = del +','+ $(this).val()                  
            }
               }
          )
          location.href=CONTROL+"/more/add/"+add+"/del/"+del;
    })
    
    
    
    
    
    
    
    
    
     $(".add1a").click(function(){
        $(".adda").attr("checked","checked")
    })
    $(".add2a").click(function(){
        $(".adda").attr("checked",false)
    })
      $(".del1a").click(function(){
        $(".dela").attr("checked","checked")
    })
    $(".del2a").click(function(){
        $(".dela").attr("checked",false)
    })
    $(".suba").click(function(){
        var adda = '';
        var dela='';
        $(".adda").each(
        function(){
         
            if($(this).attr('checked') == 'checked'){
                    adda = adda +','+ $(this).val()                  
            }
               }
          )
               $(".dela").each(
        function(){
         
            if($(this).attr('checked') == 'checked'){
                    dela = dela +','+ $(this).val()                  
            }
               }
          )
          location.href=CONTROL+"/morea/adda/"+adda+"/dela/"+dela;
    })
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
})

