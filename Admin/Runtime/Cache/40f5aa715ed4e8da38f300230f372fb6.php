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
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />        
    </head>
    <body>
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>商品类型名称</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
        <?php if(is_array($good_type)): foreach($good_type as $key=>$n): ?><tr>
                   <td><?php echo ($n["id"]); ?></td>
                   <td class="c_title"><?php echo ($n["name"]); ?></td>
                   <td class="mod">
                       |&nbsp;<a href="<?php echo U('good_attr_list');?>?id=<?php echo ($n["id"]); ?>">属性列表</a>|
                       <a href="<?php echo U('edit_good_attr_show');?>?id=<?php echo ($n["id"]); ?>">添加属性</a>|
                       <a href="<?php echo U('edit_good_type_show');?>?id=<?php echo ($n["id"]); ?>">编辑类型</a>|
                       <a href="<?php echo U('del_good_type');?>?id=<?php echo ($n["id"]); ?>">删除该类型</a>
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
        <div class="page">
            <?php echo ($page); ?>
        </div>
        <h4><a href="<?php echo U('add_good_type_show');?>" class="addtop">添加商品类型</a></h4>
    </body>
</html>