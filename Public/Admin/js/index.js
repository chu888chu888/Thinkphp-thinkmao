var wid;
$(function(){
/**
* 动态的调整右边窗口的大小
*/
  change();
  /**
   *初始化栏目
   */
  startchannel();
  
  $(".left ul li[class != 'main']").click(function(){
      $(".left ul li[class != 'main']").css("background-color", "#F5F5F5");
      $(".left ul li[class != 'main']").children('a').css("color","#4CA3D8");
      $(this).attr("flag",false);
      $(this).css("background-color", "#DB1F26");
      $(this).children('a').css("color","#fff");
      $(this).attr("flag",true);
  })
  
 /*
  *鼠标移入栏目时颜色效果动画
  */
  $(".left ul li[class != 'main']").attr("class","rudio");
  var state = true;
  $(".left ul li[class != 'main']").mouseenter(function(){ 
      if(!$(this).attr("flag")){      
      $(this).css("background-color", "#DB1F26");
      $(this).children('a').css("color","#fff");
      }
  })
  $(".left ul li[class != 'main']").mouseleave(function(){
      if(!$(this).attr("flag")){
      $(this).animate({
          "background-color": "#F5F5F5"         
        }, 500 );
        $(this).children('a').animate({
          "color": "#4CA3D8"         
        }, 500 );
      }
  })
  /**
   * 显示或者隐藏子栏目
   */
  $(".main").click(function(){
      if($(this).attr("flag")=="more"){
          $(this).attr("flag","less");
          $(this).children("span").css("background-position","-288px -120px");          
          var obj = $(this).parents("ul");
          obj.children("li[class != 'main']").slideUp("normal");         
      }else if($(this).attr("flag")=="less"){
           var other = $(".main[flag = 'more']").parents("ul");
           other.children("li[class != 'main']").slideUp("normal");
           $(".main").attr("flag","less");
           other.children("li[class = 'main']").children("span").css("background-position","-288px -120px");
//           $(".main").each(function(){
//               if($(this).attr("flag")=="more"){
//                   alert(123);
//                   var other = $(this).parents("ul");
//                   other.children("li[class != 'main']").slideDown("normal");
//               }
//           })
           
          $(this).attr("flag","more");
          $(this).children("span").css("background-position","-313px -119px");
           var obj = $(this).parents("ul");
          obj.children("li[class != 'main']").slideDown("normal");   
      }
  })
  
 
})

/**
*初始化栏目
*/
function startchannel(){
    $(".main").attr("flag","less");
    $(".main").children("span").css("background-position","-288px -120px");
    var obj = $(".main").parents("ul");
    obj.children("li[class != 'main']").slideUp(1000);   
}

/**
* 动态的调整右边窗口的大小
*/

$(window).resize(
    function(){
        change();
    }
);
 function change(){
   if($(window).width()>=1270){
       wid = $(window).width();      
       var widfor =  wid - 180;
     $(".right").css("width",widfor+"px");
     $("#ou").css("width",wid+"px")
   }else{
     $(".right").css("width","1091px");
     $("#ou").css("width","1270px")
   }   
    }
