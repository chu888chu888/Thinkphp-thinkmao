<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
                    <td>属性名</td>
                    <td>属性值</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$n): ?><tr>
                   <td><?php echo ($n["id"]); ?></td>
                   <td><?php echo ($n["name"]); ?></td>
                   <td>              
                       <?php echo ($n["value"]); ?>               
                   </td>
                   <td class="mod">
                       <a href="<?php echo U('edit_singl_good_attr_show');?>?id=<?php echo ($n["id"]); ?>">编辑属性</a>
                       <a href="<?php echo U('del_good_attr');?>?id=<?php echo ($n["id"]); ?>">删除属性</a>                       
                       
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>       
         <h4><a href="<?php echo U('edit_good_attr_show');?>?id=<?php echo ($id); ?>" class="addtop">添加属性</a></h4>
    </body>
</html>