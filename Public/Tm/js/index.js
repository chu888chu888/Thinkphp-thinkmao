$(function(){


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




    $(".list").mouseenter(function(){
        $(this).css("background-color","#88766E").css("border-left","1px solid #88766E");
        $(this).children(".list_head").children("span").css("color","#FEFEFE");
        $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1.png)");
        $(this).children("p").children("a").css("color","#fff");
        $(this).children(".lsmall").css("display","block");
        if($.browser.msie){ 
           
            $(this).children('.getout').css("display","block").css("width","745px").css("height","600px").css("background-color","#ff0000");  
            
        }else{
            $(this).children('.getout').css("display","block").animate({
                width: '745px'
            }, "slow");
        }
    })
    $(".list:even").mouseleave(function(){
        $(this).css("background-color","#ffffff").css("border-left","1px solid #E6E6E6");
        $(this).children(".list_head").children("span").css("color","#000");
        $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1bNnYXa4jXXcsI4sD-189-145.png)");
        $(this).children("p").children("a").css("color","#848484");
        $(this).children(".lsmall").css("display","none");
        $(this).children('.getout').css("display","none");
    })
    $(".list:odd").mouseleave(function(){
        $(this).css("background-color","#F1F1F1").css("border-left","1px solid #E6E6E6");
        $(this).children(".list_head").children("span").css("color","#000");
        $(this).children(".list_head").children("div").css("background-image","url("+img_url+"/T1bNnYXa4jXXcsI4sD-189-145.png)");
        $(this).children("p").children("a").css("color","#848484");
        $(this).children(".lsmall").css("display","none");
        $(this).children('.getout').css("display","none");
    })

    $(window).scroll(function(){
        var bodyTop = $(window).scrollTop();
        var num = (bodyTop - 95)/100-3;
        if(bodyTop < 95 ){
            $("#guid_box").css("position","absolute").css("top","0px").css("left","0px");
        }else{
            if($.browser.msie){
                $("#guid_box").css("top",bodyTop-95+"px");                  
            }else{
                $("#guid_box").css("position","fixed").css("left","80px");
            }
        }

          
        $("#guid_box .list").each(
            function(index){
                var box = $(this);
                var obj = $(this).children("p");
                var blockstatus = obj.css("display");
                if(num>index){
                    if(blockstatus=="block"){
                        box.stop(true,true);
                        obj.eq(1).slideUp("fast",function(){
                            box.animate({
                                height: '35px'
                            },0,function(){
                                obj.eq(0).slideUp("fast",function(){
                                    box.animate({
                                        height: '15px'
                                    },0);
                                    box.css("overflow","visible");
                                });             
                            });
                        });                                           
                    }
                }else{
                    if(blockstatus=="none"){
                        box.stop(true,true);
                        box.animate({
                            height: '60px'
                        },30,function(){
                            obj.slideDown("fast");
                            box.css("overflow","visible");
                        });
                    }
                }
            }
            )
    //        }
    })

    //轮换图片开始--------------------------

    var out=getClass("out")[0];//获得最外层的div
    var box=getClass("box",out)[0];//获得包含图片的盒子
    var imgs=getClass("box_img");//获得所有图片的集合
    var imgswidth=1600;//单张图片的宽度
    var button = getClass("button")[0];//获得包含按钮的盒子

    box.style.width=imgswidth*imgs.length+"px";
    var btn=getClass("btn",button);//获得包含按钮的盒子
    var spans=getClass("sp");//获得按钮的集合
    var spans = $(".sp");
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
            animate(box,{
                left:-num*imgswidth
            },500,Tween.Cubic.easeIn,function  () {
                box.style.left=0;
            });
            num=0;
        }else{
            animate(box,{
                left:-num*imgswidth
            },500,Tween.Cubic.easeIn);
        }

        for (var i=0; i<spans.length; i++) {
            spans[i].className="sp";
        }
        spans[num].className="select sp";
    }

    for (var i=0; i<spans.length; i++) {
        spans[i].index=i;                  
        $(".sp").eq(i).mouseover(function  () {
            clearInterval(t);
            for (var j=0; j<spans.length; j++) {
                spans[j].className="sp";
            }
            this.className="select sp";
            num=this.index;
            animate(box,{
                left:-num*imgswidth
            },500,Tween.Cubic.easeIn);
        }
        )
 
        spans[i].onmouseout=function  () {
            t= setInterval(move,2000)
        }
    }

})



