<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/admin.css" />
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
         <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
         <script src="__PUBLIC__/Admin/js/index.js"></script>
        <base target="iframe" />
    </head>
    <body id="ou">

        <div class="head">
            <span class="theme">
                Admin
            </span>
            <ul class="t_guid">
                <li><a href="__APP__/Channel">栏目列表</a></li>
                <li><a href="__WEB__/Art/index">文章列表</a></li>
                <li><a href="#">用户管理</a></li>
                <li><a href="__WEB__/Index/welcome">查看首页</a></li>
            </ul>
        </div>
        <div class="by">
            <div class="left">
                <ul>
                    <li class="main">商品管理</li>
                    <li><a href="<?php echo U('ListGoods/index');?>">商品列表</a></li>
                    <li><a href="<?php echo U('AddGood/index');?>">添加商品</a></li>
                    <li><a href="<?php echo U('Brands/index');?>">商品品牌</a></li>
                    <li><a href="<?php echo U('Goods/cate');?>">商品分类</a></li>
                    <li><a href="<?php echo U('Goods/good_type');?>">商品类型</a></li>
                </ul>
                 <ul>
                    <li class="main">订单管理</li>
                    <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
                    <li><a href="<?php echo U('Order/step1');?>">待付款订单</a></li>
                    <li><a href="<?php echo U('Order/step2');?>">待发货订单</a></li>
                    <li><a href="<?php echo U('Order/step3');?>">已完成订单</a></li>
                </ul>

            </div>
            <div class="right">
                <iframe src="<?php echo U('Index/welcome');?>" name="iframe" scrolling="no">
                </iframe>
            </div>
        </div>
    </body>
</html>