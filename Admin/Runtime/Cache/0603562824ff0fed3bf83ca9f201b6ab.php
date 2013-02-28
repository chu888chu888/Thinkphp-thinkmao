<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
        <script src="__PUBLIC__/Admin/js/goodattrlist.js"></script>
    </head>
    <body>
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>属性名</td>
                    <td>属性值</td>
                    <td>属性类型</td>
                    <td>是否为筛选属性</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$n): ?><tr>
                   <td><?php echo ($n["id"]); ?></td>
                   <td><?php echo ($n["name"]); ?></td>
                   <td title="<?php echo ($n["value"]); ?>" style="width:400px">              
                       <?php echo (truncate($n["value"],60,"...")); ?>               
                   </td>
                   <td>              
                       <?php if($n['type'] == 0): ?>商品属性
                       <?php else: ?>
                           商品规格<?php endif; ?>             
                   </td>
                   <td>
                      <?php if($n['gselect'] == 0): ?>否
                        <?php else: ?>
                        是<?php endif; ?>
                   </td>
                   <td class="mod">
                       <a href="<?php echo U('edit_type_attr_show');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-info">
                           <i class="icon-edit icon-white"></i>
                           Edit
                       </a>
                       <a url="<?php echo U('del_type_attr');?>?id=<?php echo ($n["id"]); ?>"  class="btn btn-danger gdel" gid="<?php echo ($n["id"]); ?>">
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
        <a href="<?php echo U('edit_good_attr_show');?>?id=<?php echo ($id); ?>" class="btn addtop btn-danger" style="float: right;margin-top:30px;">
                <i class="icon-trash icon-white"></i>
                添加商品类型
             </a>      
         
    </body>
</html>