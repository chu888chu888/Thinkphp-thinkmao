<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />   
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/list_goods.css" /> 
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
                   <td>
                       <img src="<?php echo ($n["pic"]); ?>" class="list_img"/>
                   </td>
                   <td>
                       <?php echo ($n["number"]); ?>
                   </td>
                   <td>
                       <?php echo ($n["price"]); ?>
                   </td>
                   
                   <td class="mod">
                       <a href="<?php echo U('good_show');?>?id=<?php echo ($n["id"]); ?>">查看</a>
                       <a href="">修改</a>
                       <a href="">删除</a>
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>       
    </body>
</html>