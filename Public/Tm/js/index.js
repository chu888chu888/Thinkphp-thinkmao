$(function(){
  // $(".getout").mouseover(function(){
  //   $(this).css("display","block");
  // });
  // $(".getout").mouseout(function(){
  //   $(this).css("display","none");
  // })
  // $(".list").mouseenter(function(event){
  //  var num = $('.list').index($(this));
  //   if(0){
  //     $('.getout').animate({top:num*30+30+'px'}, "slow",function(){
  //          $(".getout").css("display","none");
  //          $(".getout").eq(num).css("display","block").attr('id','id_select').animate({width: '745px',top:num*30+30+'px'}, "slow");
  //     });
  //   }else{
  //   $(".getout").eq(num).css("display","block").attr('id','id_select').animate({width: '745px',top:num*30+30+'px'}, "slow");
  //     }
  //   event.stopPropagation();
  //   return false;
  // })
  // $(".list").mouseleave(function(event){
  // var num = $('.list').index($(this));
  //   $(".getout").eq(num).attr('id','').animate({width: '0px'}, "slow",function(){
  //     $(this).css("display","none");
  //   });

  // })
   $(".list").mouseenter(function(){
    $(this).children('.getout').css("display","block").animate({width: '745px'}, "slow");

  })
  $(".list").mouseleave(function(){
    // $(this).children('.getout').animate({width: '0px'}, 0,function(){
    //   $(this).css("display","none");
    // });
      $(this).children('.getout').css("display","none");
  })













  $(".list").mouseover(function(){
     $(this).css("background-color","#88766E").css("border-left","1px solid #88766E");
     $(this).children(".list_head").children("span").css("color","#FEFEFE");
     $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1.png)");
     $(this).children("p").children("a").css("color","#fff");
     $(this).children(".lsmall").css("visibility","visible");
  })
  $(".list:even").mouseout(function(){
     $(this).css("background-color","#ffffff").css("border-left","1px solid #E6E6E6");
     $(this).children(".list_head").children("span").css("color","#000");
     $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1bNnYXa4jXXcsI4sD-189-145.png)");
     $(this).children("p").children("a").css("color","#848484");
     $(this).children(".lsmall").css("visibility","hidden");
  })
  $(".list:odd").mouseout(function(){
     $(this).css("background-color","#F1F1F1").css("border-left","1px solid #E6E6E6");
     $(this).children(".list_head").children("span").css("color","#000");
     $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1bNnYXa4jXXcsI4sD-189-145.png)");
     $(this).children("p").children("a").css("color","#848484");
     $(this).children(".lsmall").css("visibility","hidden");
  })



	$(".list").each(function(index){
		if(index % 2 != 0){
			$(this).css("background-color","#F1F1F1");
		}else{
			$(this).css("background-color","#fff");
		}
	})

    if($.browser.msie){
           $("#guid_box .list").css("height","80px");
    }


    $(window).scroll(function(){
          var bodyTop = document.documentElement.scrollTop + document.body.scrollTop;
          if(bodyTop < 95 ){
          	$("#guid_box").css("position","absolute").css("top","0px").css("left","0px");
          }else{
          	 if($.browser.msie){
               $("#guid_box").css("top",bodyTop-95+"px");
               }else{
          	   $("#guid_box").css("position","fixed").css("left","80px");
          	   }
          }

         	if($.browser.msie){
		          		   var num = Math.floor((bodyTop-95)/100);
		          		   for (var i = 0; i <num; i++) {
		          		      		$("#guid_box .list").eq(i).css("height","30px");
		          		      			}
		          		    for (var i = num; i <=16; i++) {
		          		      		$("#guid_box .list").eq(i).css("height","80px");
		          		      			}

		            }else{

          $("#guid_box .list").each(

          	function(index){
          		 var bodyTop = document.documentElement.scrollTop + document.body.scrollTop;

		          		if(bodyTop>(95+100*index)){
		          			$(this).stop(false,true);
		          			$(this).children("p").stop();
		          			$(this).children("p").slideUp("slow");
                    $(this).children("p").animate({"background-color": '#F1F1F1'},30);
		          			$(this).animate({height: '15px'},30);
		          		}else{
		          		    $(this).stop(false,true);
		                    $(this).animate({height: '60px'},30,function(){
		                    $(this).children("p").slideDown("fast");
		                    });
		          		}
          	  }
          )
      }
    })




//轮换图片开始--------------------------

 var out=getClass("out")[0];//获得最外层的div
  var box=getClass("box",out)[0];//获得包含图片的盒子
  var imgs=getClass("box_img");//获得所有图片的集合
  var imgswidth=1600;//单张图片的宽度

  box.style.width=imgswidth*imgs.length+"px";
  var btn=getClass("btn",out);//获得包含按钮的盒子
  var spans=getClass("sp");//获得按钮的集合
  var right=getClass("right")[0];

 function imgresize () {
   var cw=document.documentElement.clientWidth;
   if(cw>1000){
   var nowl=(imgswidth-cw)/2;
   for (var i=0; i<imgs.length; i++) {
     imgs[i].style.left=-nowl+"px";
    }
   }
 }

   imgresize ()

   window.onresize=function  () {
   imgresize ()
   }



 var num=0
var t= setInterval(move,2000)
 function move () {
    num++;
  if(num==imgs.length-1){
   animate(box,{left:-num*imgswidth},500,Tween.Cubic.easeIn,function  () {
     box.style.left=0;
   });
     num=0;
   }else{
   animate(box,{left:-num*imgswidth},500,Tween.Cubic.easeIn);
   }

   for (var i=0; i<spans.length; i++) {
     spans[i].className="sp";
   }
   spans[num].className="select sp";
 }

if($.browser.msie){
 for (var i=0; i<spans.length; i++) {
    spans[i].index=i;
    $(".sp").eq(i).mouseover(function  () {
	     clearInterval(t);
	     for (var j=0; j<spans.length; j++) {
		   spans[j].className="sp";
	     }
		 this.className="select sp";
      num=this.index;
     animate(box,{left:-num*imgswidth},500,Tween.Cubic.easeIn);
    }
    )

	spans[i].onmouseout=function  () {
	 t= setInterval(move,2000)
	}
 }
}else{
 for (var i=0; i<spans.length; i++) {
    spans[i].index=i;
  spans[i].onmouseover=function  () {
clearInterval(t);
for (var j=0; j<spans.length; j++) {
spans[j].className="sp";
}
this.className="select sp";
num=this.index;
animate(box,{left:-num*imgswidth},1000,Tween.Cubic.easeIn);
}
spans[i].onmouseout=function  () {
t= setInterval(move,2000)
}
}
}

})



