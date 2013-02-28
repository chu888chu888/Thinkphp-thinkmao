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
        <script src="__PUBLIC__/Admin/js/brandindex.js"></script> 
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
                   <td class="good_id"><?php echo ($n["id"]); ?></td>
                   <td class="c_title" style="width: 10%;text-align: center"><?php echo ($n["name"]); ?></td>
                   <td class="c_title" style="width: 15%;text-align: center">
                       <img src="<?php echo ($n["logo"]); ?>" style="height:30px"/>
                   </td>
                   <td class="mod">                   
                       <a href="<?php echo U('edit_brand_show');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-info">
                           <i class="icon-zoom-in icon-white"></i>
                           View
                           <i class="icon-edit icon-white"></i>
                           Edit
                       </a>
                       <a href="<?php echo U('del_good_type');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-danger">
                            <i class="icon-trash icon-white"></i>
                            Delete							
                       </a>                      
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
        <div class="page" style="float:left"><?php echo ($page); ?></div>
        <a href="<?php echo U('Brands/add_brand_show');?>" class="btn addtop btn-danger" style="float: right;margin-top: 30px;">
                <i class="icon-trash icon-white"></i>
                添加品牌</a>
    </body>
</html>