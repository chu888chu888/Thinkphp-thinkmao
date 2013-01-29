$(function(){
    $("#button").click(function(){
        var uid = $("#uname").val();
        var pwd = $("#password").val();
        var obj ={
            'uname':uid,
            'password':pwd
        }
        $.ajax({
            type:'POST',
            url:url,
            data:obj,
            success:function(mes){
                if(mes==1){
                    history.go(-1);
                }else if(mes==0){
                   alert("无此用户！");
                }
            }
        })
    })
})

