<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/welcome.css" />
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>      
        <script type="text/javascript">
                     window.onload = function () {
			$('#main').fadeIn(2000);
                                                            $(".right iframe",window.parent.document).css("height","650px").css("padding-top","0px");
		                        }
          </script>
            
    </head>
    <body>
        <div id='main'>
		<dl>
			<dt>个人信息</dt>
			<dd>上一次登录时间：<span>2012-12-12 12:12</span></dd>
			<dd>上一次登录IP：<span>192.168.1.1</span></dd>
			<dd>本次登录时间：<span><?php echo (date('Y-m-d g:i a',time())); ?></span></dd>
			<dd>本次登录IP：<span><?php echo ($ip); ?></span></dd>
		</dl>
		<dl>
			<dt>服务器信息</dt>
			<dd>操作系统：<span><?php echo (PHP_OS); ?></span></dd>
			<dd>PHP版本： <span><?php echo (PHP_VERSION); ?></span></dd>
			<dd>服务器环境：<span><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></span></dd>
			<dd>MySQL版本：<span><?php echo mysql_get_server_info();?></span></dd>
		</dl>
		<dl>
			<dt>商品信息</dt>
			<dd>上架商品：<span>1000</span>件</dd>
			<dd>下架商品：<span>300</span>件</dd>
			<dd>总库存：<span>600</span>件</dd>
		</dl>
		<dl>
			<dt>订单信息</dt>
			<dd>待付款订单：<span>300</span>条</dd>
			<dd>待发货订单：<span>60</span>条</dd>
			<dd>已发仙订单：<span>200</span>条</dd>
			<dd>已完成订单：<span>800</span>条</dd>
		</dl>
		<dl id="pv">
			<dt>PV信息</dt>
			<dd>今日访问人数：<span>600</span></dd>
			<dd>现有会员数量：<span>10000</span></dd>
			<dd>历史访问人数：<span>100000</span></dd>
		</dl>
	</div>
    </body>
</html>