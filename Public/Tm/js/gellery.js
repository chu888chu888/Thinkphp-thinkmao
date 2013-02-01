$(function(){
    $(".min").click(function(){
        var num=$(this).attr('num');
        var gid = $(this).attr('gid');
        var mid = $(this).parent().parent().parent().parent().prev().children('img');
        var obj = {
            num:num,
            gid:gid
        }
        $.ajax({
            type:'POST',
            url:gellery_url,
            data:obj,
            success:function(mes){
                eval("var url = "+mes);
                 mid.attr("src",url);
            }
        })
    })

    $(".search_input").focus(function(){
        $(this).css("background-position","0 -132px")
    })
    $(".search_input").blur(function(){
        $(this).css("background-position","0 -154px")
    })



})