<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/admin.css" />
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
         <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
         <script src="__PUBLIC__/Common/js/color.js"></script>
         <script src="__PUBLIC__/Admin/js/index.js"></script>
        <base target="iframe" />
    </head>
    <body id="ou">
        <div class="fade"></div>
        <div class="judge" flag="off">
             <div class="judgetitle">
                 <h3>Settings</h3>
                 <button type="button" class="close">×</button>                 
             </div>
            <div class="judgebody">
                你确定删除该商品吗？
            </div>
            <div class=" judgeend">
                <input type="button" value="取消" id="cancel" class="gsubmit btn" style="color:#000">
                 <input type="button" value="确定" id="affirm" class="gsubmit btn btn-primary" >                 
            </div>
        </div>
        <div class="outmes">
            <div class="judgetitle" style="background-color: #EEEEEE;">
                提示信息
            </div>
            <div class="judgebody" style="color:red">
                ....
            </div>
        </div>
        <div class="head">
            <span class="theme">
                A<span class="themefont">d</span>min
            </span>
            <ul class="t_guid">
                <li><a href="#">栏目列表</a></li>
                <li><a href="#">文章列表</a></li>
                <li><a href="#">用户管理</a></li>
                <li><a href="#">查看首页</a></li>
            </ul>
        </div>
        <div class="by">
            <div class="left">               
                <ul>
                    <li class="main" flag="more">商品管理<span class="flagchange" ></span></li>
                    <li><a href="<?php echo U('ListGoods/index');?>">商品列表</a></li>
                    <li><a href="<?php echo U('AddGood/index');?>">添加商品</a></li>
                    <li><a href="<?php echo U('InventoryGood/index');?>">商品库存</a></li>
                    <li><a href="<?php echo U('Brands/index');?>">商品品牌</a></li>
                    <li><a href="<?php echo U('Goods/cate');?>">商品分类</a></li>
                    <li><a href="<?php echo U('Goods/good_type');?>">商品类型</a></li>
                </ul>
                 <ul>
                    <li class="main"  flag="more">订单管理<span class="flagchange"></span></li>
                    <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
                    <li><a href="<?php echo U('Order/step1');?>">待付款订单</a></li>
                    <li><a href="<?php echo U('Order/step2');?>">待发货订单</a></li>
                    <li><a href="<?php echo U('Order/step3');?>">已完成订单</a></li>
                    <li><a href="<?php echo U('Order/step3');?>">退货订单</a></li>
                </ul>
                <ul>
                    <li class="main"  flag="more">评论管理<span class="flagchange" ></span></li>
                    <li><a href="#">数据备份</a></li>
                    <li><a href="#">数据还原</a></li>
                </ul>
                <ul>
                    <li class="main"  flag="more">数据库管理<span class="flagchange" ></span></li>
                    <li><a href="#">数据备份</a></li>
                    <li><a href="#">数据还原</a></li>
                </ul>
                <ul>
                    <li class="main"  flag="more">广告管理<span class="flagchange" ></span></li>
                    <li><a href="#">广告列表</a></li>
                    <li><a href="#">广告位置</a></li>
                </ul>
                <ul>
                    <li class="main"  flag="more">用户管理<span class="flagchange" ></span></li>
                    <li><a href="#">用户列表</a></li>
                    <li><a href="#">添加用户</a></li>
                    <li><a href="#">用户等级</a></li>
                </ul>
                 <ul>
                    <li class="main"  flag="more">验证码管理<span class="flagchange" ></span></li>
                    <li><a href="#">参数配置</a></li> 
                    <li><a href="#">风格配置</a></li>
                </ul>
                <ul>
                    <li class="main"  flag="more">友情链接管理<span class="flagchange"></span></li>
                     <li><a href="#">首页链接</a></li>
                    <li><a href="#">链接列表</a></li>
                    <li><a href="#">待审核链接</a></li>                    
                </ul>
                

            </div>
            <div class="right">
                <iframe src="<?php echo U('Index/welcome');?>" name="iframe" scrolling="no">
                </iframe>
            </div>
        </div>
    </body>
</html>