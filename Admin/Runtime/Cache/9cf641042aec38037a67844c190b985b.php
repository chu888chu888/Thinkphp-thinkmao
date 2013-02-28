<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>HDSHOP 页面提示</title>
    <style type="text/css">
        *{padding:0px;margin:0px;font: 14px/20px "Microsoft Yahei 微软雅黑";}
        body{background-color:#333333;}
        #hd_success_html{width:460px;margin:220px auto;background-color:#fff;height: auto;overflow:hidden;border: 3px solid #ccc;border-radius: 4px;}
        #hd_success_html h2{ height: 28px; color:#f6f6f6;background-color:#41A1D9;font-size:15px; font-weight: bold; text-indent: 10px; line-height: 28px;}
        #hd_success_html div{padding:10px; font-size:14px; font-weight: bold;color:#333;}
        #hd_success_html div a{color:royalblue;}
        #hd_success_html div p{ border-bottom: solid 1px #dcdcdc;padding-bottom: 10px; margin-bottom: 10px;color: green;text-align: center;line-height: 40px;}
        #hd_success_html div span {color:#999; font-weight: normal;}
        #hd_success_html div span a{color:#757575;text-decoration: none;}
        #hd_error_html{width:460px;margin:220px auto;background-color:#fff;height: auto;overflow:hidden;border: 3px solid #ccc;border-radius: 4px;}
        #hd_error_html h2{ height: 28px; color:#f6f6f6;background-color:#ff0000;font-size:15px; font-weight: bold; text-indent: 10px; line-height: 28px;}
        #hd_error_html div{padding:10px; font-size:14px; font-weight: bold;color:#333;}
        #hd_error_html div a{color:royalblue;}
        #hd_error_html div p{ border-bottom: solid 1px #dcdcdc;padding-bottom: 10px; margin-bottom: 10px;color: red;text-align: center;line-height: 40px;}
        #hd_error_html div span {color:#999; font-weight: normal;}
        #hd_error_html div span a{color:#757575;text-decoration: none;}
    </style>
</head>
<body>
    <?php if(isset($message)): $jumpUrl = $jumpUrl ? 'javascript:location.href="' . $jumpUrl . '"': 'javascript:history.back(-1)';?>
        <div id="hd_success_html">
            <h2 style="font-size: border">A<span style="color:red">d</span>min 提示：</h2>
            <div>
                <p><?php echo ($msgTitle); echo ($message); ?>&nbsp&nbsp&nbsp&nbsp</p>
                <span>页面将在&nbsp;<span id="write_time"><?php echo ($waitSecond); ?></span>&nbsp;秒钟后进行&nbsp;<a href="<?php echo ($jumpUrl); ?>">跳转</a>&nbsp;或点击&nbsp;<a href="__APP__">返回首页</a></span>
            </div>
        </div>
    <?php else: ?>
    <?php echo $jumpUrl;?>
        <div id="hd_error_html">
            <h2 style="font-size: border">A<span style="color:red">d</span>min 提示：</h2>
            <div>
                <p><?php echo ($msgTitle); echo ($error); ?>&nbsp&nbsp&nbsp&nbsp</p>
                <span>页面将在&nbsp;<span id="write_time"><?php echo ($waitSecond); ?></span>&nbsp;秒钟后进行&nbsp;<a href="<?php echo ($jumpUrl); ?>">跳转</a>&nbsp;或点击&nbsp;<a href="__APP__">返回首页</a></span>
            </div>
        </div><?php endif; ?>
<script type="text/javascript">
    var time = document.getElementById('write_time').innerHTML-1;
    setInterval(function(){
        document.getElementById('write_time').innerHTML = time--;
    },1000);
    window.setTimeout('<?php echo ($jumpUrl); ?>', <?php echo ($waitSecond); ?>*1000);
</script>
</body>
</html>