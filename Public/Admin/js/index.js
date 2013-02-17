/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var wid;
$(function(){
  change();
})
$(window).resize(
    function(){
        change();
    }
);
 function change(){
   if($(window).width()>970){
       wid = $(window).width();
       if(wid<970){
           wid=970;
       }
       var widfor =  wid - 135;
     $(".right").css("width",widfor+"px");
     $("#ou").css("width",wid+"px")
   }else{   
     $(".right").css("width","845px");
     $("#ou").css("width","970px")
   }   
    }
