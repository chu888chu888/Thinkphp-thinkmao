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
                cms
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
                    <li class="main">内容管理</li>
                    <li><a href="__APP__/Channel">栏目列表</a></li>
                    <li><a href="__WEB__/Channel/addshow">添加顶级栏目</a></li>
                    <li><a href="__WEB__/Art/index">文章列表</a></li>
                    <li><a href="__WEB__/Art/add">添加文章</a></li>
                    <li><a href="__WEB__/Trush/index">回收站</a></li>
                </ul>
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
                <ul>
                    <li class="main">配置管理</li>
                    <li><a href="__WEB__/Code/index">修改验证码配置</a></li>
                    <li><a href="__WEB__/Style/index">修改风格配置</a></li>
                </ul>
                <ul>
                    <li class="main">生成静态</li>
                    <li><a href="__WEB__/Static/index">生成首页</a></li>
                    <li><a href="__WEB__/Static/lists">生成列表</a></li>
                    <li><a href="__WEB__/Static/cons">生成内容</a></li>
                    <li><a href="__WEB__/Static/all">全站生成</a></li>
                </ul>
                <ul>
                    <li class="main">数据备份</li>
                    <li><a href="__WEB__/backup/back">还原数据</a></li>
                    <li><a href="__WEB__/backup/backup">备份数据</a></li>
                </ul>
                <ul>
                    <li class="main">友情链接</li>
                    <li><a href="#">所有链接</a></li>
                    <li><a href="#">审核链接</a></li>
                </ul>
            </div>
            <div class="right">
                <iframe src="<?php echo U('Index/welcome');?>" name="iframe" scrolling="no">
                </iframe>
            </div>
        </div>
    </body>
</html>