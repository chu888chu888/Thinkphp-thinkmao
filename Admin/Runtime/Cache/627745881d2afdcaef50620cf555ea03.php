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
                    <td>品牌名称</td>
                    <td>品牌LOGO</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
        <?php if(is_array($brands)): foreach($brands as $key=>$n): ?><tr>
                   <td><?php echo ($n["id"]); ?></td>
                   <td class="c_title"><?php echo ($n["name"]); ?></td>
                   <td class="c_title" style="text-align: center">
                       <img src="<?php echo ($n["logo"]); ?>" style="height:50px"/>                      
                   </td>
                   <td class="mod">
                       |&nbsp;<a href="<?php echo U('good_attr_list');?>?id=<?php echo ($n["id"]); ?>">编辑品牌</a>|                      
                       <a href="<?php echo U('del_good_type');?>?id=<?php echo ($n["id"]); ?>">删除该品牌</a>
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
      
        <h4><a href="<?php echo U('Brands/add_brand_show');?>" class="addtop">添加品牌</a></h4>
    </body>
</html>