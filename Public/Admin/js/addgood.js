$(function(){
    $(".catename").click(function(){
        if($(this).next("ul").length==0){
              if($(this).attr("flag")=="false"){
                $(this).css("background-color","#DB1F26");
                 $(this).attr("flag",true);
                 var cateid = $(this).attr("cateid");
                 var cateval = $(this).attr("val");
                 var str = $("#res_char").html();
                 if($("#res_char").children("input").length==0){                     
                     str = "";
                 }
                 var obj = "<input type='button' value="+cateval+" class='cateval'><input type='button' value="+cateid+" name='cid[]' class='cateid'>";
                 str += obj;
                 $("#res_char").html(str); 
                  list_attr();
            }else{
               $(this).css("background-color","#FAA571");
                 $(this).attr("flag",false);
                  var cateid = $(this).attr("cateid");
                  var lcate = $("input[value = "+cateid+"]");
                  lcate.prev().hide("normal",function(){
                      lcate.prev().remove();                      
                  });
                  lcate.remove();     
                   list_attr();
                }                
        }else{           
            if($(this).attr("flag")==0){             
                $(this).attr("flag",1);  
                $(this).children("span").text("+");  
                $(this).next("ul").show("normal");
            }else{
                $(this).attr("flag",0);    
                $(this).children("span").text("-");
                $(this).next("ul").hide("normal");
                }
        }
    })
    //商品分类框处的点击效果
    $(".cateval").live("click",function(){
        var cateid = $(this).next().val();
        var robj = $("li[cateid="+cateid+"]");
        robj.css("background-color","#FAA571");
        robj.attr("flag",false);
        $(this).next().remove();
        $(this).hide("normal",function(){
            $(this).remove();
        });       
    })

    /**
     *列表叶商品添加
     */
    $(".innerbox").eq(0).css("display","block");
    $(".guid li").eq(0).css("background-color","#DB1F26").css("color","#fff");
    $(".guid li").mouseenter(function(){
        $(".guid li").css("background-color","#4CA3D7").css("color","#F5F5F5");
        $(this).css("background-color","#DB1F26").css("color","#fff");
        var num = $(this).index();
        $(".innerbox").hide("normal");
        $(".innerbox").eq(num).show("normal");
    })
    /**
     *选择类型与属性关联
     */
    function list_attr(){
         var strcid='';
        $("#res_char input[class='cateid']").each(function(){
            strcid += $(this).val()+"|";
        }) 
        var scid={
            strcid:strcid
        }
        $.ajax({
            type:"POST",
            url:type_url,
            data:scid,
            success:function(data){                
               eval("var types = "+data);
               $("#good_type").empty();
               var str = "";
               for(type in types){
                   if(str==""){
                   var obj = "<input type='button'  value="+types[type]+" class='typebu' style='background-color:blue;color:#fff'><input type='button' name='tid' value="+type+"  style='display:none'>";  
                   }else{
                   var obj = "<input type='button'  value="+types[type]+" class='typebu' ><input type='button' value="+type+"  style='display:none'>"; 
                   }
                   str+=obj;
               }
               $("#good_type").html(str);
            }
        })        
        var moren = $("#good_type").children("input[class != 'typebu']");
        var tid = moren.first().val(); 
         showattr(tid);
    }
    function showattr(tid){
         var id = {
            id:tid
        }
        $.ajax({
            type:"POST",
            url:attr_url,
            data:id,
            success:function(data){
                eval("var attr = "+data);
                var tr = '';
                var tr_attr='';
                var tr_spec='';
                for(var i=0;i<attr.length;i++){
                    if(attr[i].type==0){
                        if(attr[i].value==0){
                        var valstr = "<input type='text' name='attr["+attr[i].id+"]'/>";
                        tr_attr += '<tr class="tfont"><td  style="width:50px">'+attr[i].name+':</td><td style="width:40px" colspan="3">'+valstr+'</td></tr>';
                        }else{
                        var name1 = "attr["+attr[i].id+"]";
                        var attrv = attr[i].value.split('|');
                        var option = '';
                        for(var m=0;m<attrv.length;m++){
                            option +='<option value='+attrv[m]+'>'+attrv[m]+'</option>';
                        }
                        var valstr = "<select name="+name1+" style='padding:3px;' class='setype'><option value='0'>请选择</option>"+option+"</select>";
                        tr_attr += '<tr class="tfont"><td  style="width:50px">'+attr[i].name+':</td><td style="width:40px" colspan="3">'+valstr+'</td></tr>';
                        }
                    }else{
                        var name1 = "spec["+attr[i].id+"][value][]";
                        var name2 = "spec["+attr[i].id+"][price][]";
                        var specv = attr[i].value.split('|');
                        var option = '';
                        for(var m=0;m<specv.length;m++){
                            option +='<option value='+specv[m]+'>'+specv[m]+'</option>';
                        }
                        var valstr = "<select name="+name1+" style='padding:3px;' class='setype'><option value='0'>请选择</option>"+option+"</select>";
                        var valstrs ="<td class='addattr'>more+</td><td style='width:50px;text-align:right'>价格:</td><td><input type='text' style='width:50px;border:2px solid #ccc;height:20px;padding-left:0px' name="+name2+"</td>&nbsp;&nbsp;&nbsp;元"
                        tr_spec += '<tr class="tfont"><td  style="width:50px">'+attr[i].name+':</td><td style="width:40px">'+valstr+'</td>'+valstrs+'</tr>';
                    }
                }
                tr = tr_attr+tr_spec;
                $("#attr tr[id != 'head_type']").remove();
                $("#attr").append(tr);                
            }
        })
    }
    
    
    $(".typebu").live("click",function(){
        $(".typebu").css("background-color","#fff");
        $(".typebu").css("color","#555");
        $(".typebu").next().removeAttr("name");       
        $(this).css("background-color","blue");
        $(this).css("color","#fff");
        $(this).next().attr("name","tid");
        var tid = $(this).next().val();       
        showattr(tid)
    })

//规格添加
    $(".addattr").live("click",function(){
        var objclone = $(this).parent().clone();
        objclone.children('td').eq(2).attr("class","delattr").text("del-");
        objclone.insertAfter($(this).parent());
    })

    $(".delattr").live("click",function(){
        $(this).parent().remove();
    })


    /**
     * 栏目与品牌的动态关联
     */ 
   
   $("#res_brand").click(function(){
       if($("#brand_div").css("display")!="none"){
           retrun;
       }
         var strcid='';
        $("#res_char input[class='cateid']").each(function(){
            strcid += $(this).val()+"|";
        })       
        var cid = {
            cid:strcid
        }
        $.ajax({
            url:brands_url,
            data:cid,
            type:'POST',
            success:function(data){                
                eval("var brands = "+data);
                $(".show_cate").hide("normal",function(){
                    $("#brand_div").css("width","300px");
                    var height =$("#brand_div").outerHeight();
                    $("#brand_div").css("top","-"+height/2);       
                    $("#brand_div").show("normal");    
                });
                for(val in brands){
                     var obj = "<input type='button' value="+brands[val].name+" brandid = "+brands[val].id+" class='bvalue'>";
                    var str = $("#brand_div").html();
                    str += obj;                    
                   $("#brand_div").html(str);
                }
                          

            }
        })
   })
//商品品牌的选择
$(".bvalue").live("mouseover",function(){
    $(this).css("background-color","blue");
    $(this).css("color","#fff");
})
$(".bvalue").live("mouseout",function(){
    $(this).css("background-color","#fff");
    $(this).css("color","#666");
})
$(".bvalue").live("click",function(){
   var brandid = $(this).attr("brandid");
    var brandval = $(this).attr("value");
    var obj = "<input type='button' value="+brandval+" class='brandval' style='background-color:blue'><input type='button' value="+brandid+" name='bid' class='cateid'>";
    $("#res_brand").html(obj);
    $("#brand_div").hide("normal",function(){
        $("#brand_div").css("width","30px");
        $(this).empty();
        $(".show_cate").show("normal");
    });
})













})
