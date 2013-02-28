<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />        
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
        <script src="__PUBLIC__/Admin/js/inventory.js"></script>
    </head>
    <body>
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>商品名称</td>                    
                    <td>货号</td>
                    <td>剩余库存总量</td>
                    <td>销售总量</td>
                    <td>价格</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
            <?php if(is_array($goods_mes)): foreach($goods_mes as $key=>$n): ?><tr>
                   <td class="good_id"><?php echo ($n["gid"]); ?></td>
                   <td class="c_title gname" title="<?php echo ($n["gname"]); ?>" style="width:210px;overflow: hidden">
                       <?php echo ($n["gname"]); ?>
                     </td>
                   <td>
                       <?php echo ($n["number"]); ?>
                   </td>
                   <td>
                    <?php if($n['inventnum'] == 0): ?>0<?php echo ($n["unit"]); ?>
                      <?php else: ?>
                       <?php echo ($n["inventnum"]); echo ($n["unit"]); endif; ?>
                   </td>
                   <td>
                       <?php echo ($n["sell_num"]); echo ($n["unit"]); ?>
                   </td>
                   <td class="td_price">
                       <?php echo ($n["price"]); ?>元
                   </td>
                   
                   <td class="mod">
                       <a href="<?php echo U('invent');?>?id=<?php echo ($n["gid"]); ?>" class="btn btn-success">
                           <i class="icon-zoom-in icon-white"></i>
                           View	
                           <i class="icon-edit icon-white"></i>
                           Edit			
                       </a>                                           
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
     <div class="page"><?php echo ($page); ?></div>
    </body>
</html>