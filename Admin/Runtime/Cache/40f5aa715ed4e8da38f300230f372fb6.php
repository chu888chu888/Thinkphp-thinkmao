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
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
        <script src="__PUBLIC__/Admin/js/good_type.js"></script>              
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
                   <td class="mod" style="width: 30%">
                       <a href="<?php echo U('good_attr_list');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-success">
                           <i class="icon-zoom-in icon-white"></i>
                           View				
                       </a>
                       <a href="<?php echo U('edit_good_attr_show');?>?id=<?php echo ($n["id"]); ?>" class="btn addtop btn-danger" >
                            <i class="icon-trash icon-white"></i>Add</a>
                       <a href="<?php echo U('edit_good_type_show');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-info">
                           <i class="icon-edit icon-white"></i>
                           Edit
                       </a>
                       <a url="<?php echo U('del_good_type');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-danger delta">
                            <i class="icon-trash icon-white"></i>
                            Delete							
                       </a>                      
                      
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
        <div class="page" style="float:left;margin-left:20px">
            <?php echo ($page); ?>
        </div>
             <a href="<?php echo U('add_good_type_show');?>" class="btn addtop btn-danger" style="float: right;margin-top:30px;">
                <i class="icon-trash icon-white"></i>
                添加商品类型
             </a>
    </body>
</html>