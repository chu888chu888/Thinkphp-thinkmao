<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />   
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/list_goods.css" />
    <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
    <script src="__PUBLIC__/Admin/js/lgoods.js"></script>
    <script type="text/javascript">
        var del_url = "<?php echo U('good_del');?>";
    </script>
</head>
 <body>      
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>商品名称</td>
                    <td>列表图</td>
                    <td>货号</td>
                    <td>价格</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody>
            <?php if(is_array($goods)): foreach($goods as $key=>$n): ?><tr>
                   <td class="good_id"><?php echo ($n["id"]); ?></td>
                   <td class="c_title gname"><?php echo ($n["name"]); ?></td>
                   <td class="list_td_img">
                       <img src="<?php echo ($n["pic"]); ?>" class="list_img"/>
                   </td>
                   <td class="number">
                       <?php echo ($n["number"]); ?>
                   </td>
                   <td class="td_price">
                       <?php echo ($n["price"]); ?>
                   </td>
                   
                   <td class="mod">
                       <!-- <a href="<?php echo U('good_show');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-success">
                           <i class="icon-zoom-in icon-white"></i>
                           View				
                       </a> -->
                       <a href="<?php echo U('viewedite');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-info">
                           <i class="icon-zoom-in icon-white"></i>
                           View
                           <i class="icon-edit icon-white"></i>
                           Edit
                       </a>
                       <a class="btn btn-danger gdel" gid="<?php echo ($n["id"]); ?>">
                           <i class="icon-trash icon-white"></i>
                           Delete							
                       </a>
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
     <div class="page"><?php echo ($page); ?></div>
    </body>
</html>