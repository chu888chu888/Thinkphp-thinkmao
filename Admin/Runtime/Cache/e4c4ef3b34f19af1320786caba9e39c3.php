<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />
        <script type="text/javascript" src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
         <script type="text/javascript" src="__PUBLIC__/Admin/js/order.js"></script>
         <script type="text/javascript">
             var mod = "<?php echo U(mod_remark);?>";
         </script>
    </head>
    <body>
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>商品数量</td>
                    <td>价钱总计</td>
                    <td>订单备注</td>
                    <td>订单状态</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
        <?php if(is_array($mes)): foreach($mes as $key=>$n): ?><tr>
                   <td><?php echo ($n["id"]); ?></td>
                   <td ><?php echo ($n["quantity"]); ?></td>
                   <td><?php echo ($n["subtotal"]); ?>
                         <input type="hidden" value="<?php echo ($n["id"]); ?>" />
                   </td>
                   <td class="remark">
               <?php if($n['remark']): echo ($n["remark"]); ?>
                   <?php else: ?>
                     请输入备注<?php endif; ?>
                   </td>
                   <td><?php echo ($n["status"]); ?></td>
                   <td class="mod">
                       <a href="<?php echo U('mod_order');?>?id=<?php echo ($n["id"]); ?>">修改订单</a>
                       <a href="<?php echo U('del_order');?>?id=<?php echo ($n["id"]); ?>">删除订单</a>
                       <a href="<?php echo U('pass');?>?id=<?php echo ($n["id"]); ?>">审核通过</a>
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
    </body>
</html>