$(function(){
    //栏目的显示与关闭
            $(".c_title").click(function(){
                var objp = $(this).parents("tr");
                var flag = objp.attr("flag");
                var obj = $(this).children(".catep");                
                if(obj.attr("openx")=='0'){
                         obj.css("background-position","-106px -10px");
                         obj.attr("openx","1");
                         shhi(objp,flag);
                     }else{
                        obj.css("background-position","-42px -10px");
                         obj.attr("openx","0");
                         hihi(objp,flag);
                     }
            })
    //显示栏目
           function shhi(obj,flag){
              var flag = parseInt(flag);
               var tmp = parseInt(obj.next().attr("flag"));
              if(tmp == flag){
                  return;
              }else if(tmp == flag+5){                
                  obj.next().show("normal");
                  cheight(1)
                  shhi(obj.next(),flag);
              }else{
                  shhi(obj.next(),flag);
              }               
           }
           //隐藏栏目
           function hihi(obj,flag){
               var flag = parseInt(flag);
              var tmp = parseInt(obj.next().attr("flag"));
               if(tmp <= flag){
                  return;
              }else if(tmp > flag){
                  obj.children(".c_title").children(".catep").css("background-position","-42px -10px");
                  obj.children(".c_title").children(".catep").attr("openx","0");
                  obj.next("tr:visible").hide("normal",function(){
                      cheight(0);
                  });
                  hihi(obj.next(),flag);                  
              }   
           }
    
    
    
    
             catepage();
               //栏目分页点击处理
            $(".catenum").live("click",function(){
                $(".catenum").attr("sele","0");
                $(".catenum").css("background-color","#fff").css("color","#369BD7");
                $(this).attr("sele","1");
                $(this).css("background-color","#F5F5F5").css("color","#999999");
               cateattr();
            })
            $(".endcpoint").live("click",function(){
                var pagenum = Number($(".catenum[sele = '1']").text()); 
                var pagelength = $(".catenum").length;
                var objpage = $(".catenum[sele = '1']");
                var endpointnum = $(".endcpoint").index($(this));
                if(endpointnum==0){
                    if(pagenum != 1){
                        objpage.prev().attr("sele","1").css("background-color","#F5F5F5").css("color","#999999");
                        objpage.attr("sele","0").css("background-color","#fff").css("color","#369BD7");
                        cateattr();                              
                    }
                }else{
                    if(pagenum != pagelength){
                        objpage.next().attr("sele","1").css("background-color","#F5F5F5").css("color","#999999");
                        objpage.attr("sele","0").css("background-color","#fff").css("color","#369BD7");
                        cateattr();                        
                    }
                }
            })
            //栏目分页颜色处理
            $(".endcpoint").live("mouseover",function(){
                 $(this).css("background-color","#F5F5F5").css("color","#2071a1");
            })
             $(".endcpoint").live("mouseout",function(){
                 $(this).css("background-color","#fff").css("color","#369BD7");
            })
            $(".catenum[sele != '1']").live("mouseover",function(){
                 $(this).css("background-color","#F5F5F5").css("color","#999999");
            })
            $(".catenum[sele != '1']").live("mouseout",function(){               
                 $(this).css("background-color","#fff").css("color","#369BD7");
            })
})
//栏目分页函数以及颜色处理
    function catepage(){
       var num = $("#catetbody tr[flag = '1']").length;        
       var pagenum = Math.ceil(num/16);
       var str ='<li class="endcpoint">Prev</li>';       
       for(number=1;number<=pagenum;number++){
           if(number === 1){
             str += '<li class="catenum" sele = "1" style="background-color:#F5F5F5;color:#2071a1">'+number+'</li>';
           }else{
             str += '<li class="catenum" sele = "0">'+number+'</li>';
           }
       }
       str += '<li style="border:none" class="endcpoint">Next</li>';
       $(".catelist").html(str);
       var wid = 94 + pagenum*38+"px";
       $(".catelist").css("width",wid);
       cateattr();
    }
     //栏目分页--显示当前分页下的栏目
            function cateattr(){
                  var pagenum = Number($(".catenum[sele = '1']").text());          
                  $("#catetbody tr[flag = '1']").each(function(i){
                               if(i>=(pagenum-1)*16 && i<pagenum*16){
                                        $(this).show("normal");
                              }else{
                                        $(this).hide(0);
                              }
                       })

            }
 
 function cheight(flag){     
               if(flag){
                         $(".right iframe", window.parent.document).css("height",function(i,val){
                             var val = parseInt(val);
                             return val+33+"px";
                        });
               }else{
                   $(".right iframe", window.parent.document).css("height",function(i,val){
                             var val = parseInt(val);
                             return val-33+"px";
                        });
               }
 }

