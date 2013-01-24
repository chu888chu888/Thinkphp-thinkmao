$(function(){
    $(".innerbox").eq(0).css("display","block");
    $(".guid li").eq(0).css("background-color","#eee").css("color","red");
    $(".guid li").click(function(){
        $(".guid li").css("background-color","#009A61").css("color","#fff");
        $(this).css("background-color","#eee").css("color","red");
        var num = $(this).index();
        $(".innerbox").css("display","none");
        $(".innerbox").eq(num).css("display","block");
    })
    /**
     *选择类型与属性关联
     */
    
    $("#good_type").change(function(){
        var obj = $("option:selected",this);
        var id = obj.attr("value");        
        list_attr(id);
    })
    
    function list_attr(id){
        $("#attr tr").each(
               function(i){
                   if(i != 0){
                       $(this).remove();
                   }
               }
          )
         var id = {
            id:id
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
                    if(attr[i].value==0){
                        var valstr = "<input type='text' name='attr["+attr[i].id+"]'/>";
                        tr_attr += '<tr class="tfont"><td  style="width:50px">'+attr[i].name+':</td><td style="width:40px" colspan="3">'+valstr+'</td></tr>';
                    }else{
                        var name1 = "spec["+attr[i].id+"][value][]";
                        var name2 = "spec["+attr[i].id+"][price][]";
                        var specv = attr[i].value.split('|');
                        var option = '';
                        for(var m=0;m<specv.length;m++){
                            option +='<option value='+specv[m]+'>'+specv[m]+'</option>';
                        }
                        var valstr = "<select name="+name1+" ><option value='0'>请选择</option>"+option+"</select>";
                        var valstrs ="<td class='addattr'>more+</td><td style='width:50px;text-align:right'>价格:</td><td><input type='text' style='width:50px;border:2px solid #ccc;height:20px;padding-left:0px' name="+name2+"</td>&nbsp;&nbsp;&nbsp;元"
                        tr_spec += '<tr class="tfont"><td  style="width:50px">'+attr[i].name+':</td><td style="width:40px">'+valstr+'</td>'+valstrs+'</tr>';
                    }      
                }
                tr = tr_attr+tr_spec;
                $("#attr").append(tr);
            } 
        })       
        
    }
    
    
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
    
    
    $("#cate").change(function(){
        var obj = $("option:selected",this);
        var pid = obj.attr('pid');
        var cid = obj.val();
        var tid = obj.attr('tid');
        list_attr(tid);
        $("#good_type").children('option').each(function(){
            if($(this).attr("value")==tid){               
                $(this).attr("selected","selected");
            }
        })
        if(pid == 0){
            alert('顶级栏目无法添加商品');
            $("option",this).eq(0).attr("selected",true);
            return false;
        }
             var opfirst = $("<option>").attr("value",'0').text("选择品牌:");
             $("#brand").empty().append(opfirst);
            list_brands(cid);
           

    })
    
    
    function list_brands(cid){
        var cid = {
            cid:cid
        }       
        $.ajax({
            url:brands_url,
            data:cid,
            type:'POST',
            success:function(data){
                eval("var brands = "+data);               
             for(var i=0;i<brands.length;i++){                
                var obj = $("<option>").attr("value",brands[i].id).text(brands[i].name);
                $("#brand").append(obj);
            }
            }
        })        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
})
