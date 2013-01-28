$(function(){
    $(".button").click(function(){
        var uid = $("#uname");
        var pwd = $("#password");
        var obj ={
            'uname':uid,
            'password':pwd
        }
        $.ajax({
            type:'POST',
            url:url,
            data:obj,
            success:function(mes){
                if(mes){
                    history.go(-1);
                }else{
                   alert("无此用户！");
                }
            }
        })
    })
})

