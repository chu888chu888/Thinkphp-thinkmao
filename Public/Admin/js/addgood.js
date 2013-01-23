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
         var id = {
            id:id
        }       
        $.ajax({
            type:"POST",
            url:attr_url,
            data:id,
            success:function(data){
                eval("var attr = "+data);
                for(var i=0;i<attr.length;i++){
                    if(attr[i].value=='0'){
                        var valstr = "<input type='text' name='attr[]/>'";
                    }else{
                        var valstr = "<select name='attr[]'><option value='0'>请选择</option></select>";
                    }
                    var tr = '<tr class="tfont" width="100px"><td>'+attr[i].name+'</td></td>'+valstr+'</td></tr>';
                    alert(tr);
                    $("#tb").append(tr);
                }
            } 
        })       
        
    }
    
    
    
    /**
     * 栏目与品牌的动态关联
     */  
    
    
    $("#cate").change(function(){
        var obj = $("option:selected",this);
        var pid = obj.attr('pid');
        var cid = obj.val();
        var tid = obj.attr('tid');      
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
