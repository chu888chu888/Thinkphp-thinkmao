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
        <script src="__PUBLIC__/Admin/js/cate.js"></script>
    </head>
    <body>
        <table class="channel_list">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>分类名称</td>
                    <td>操作</td>
                </tr>
            </thead>
        <tbody id="catetbody">
        <?php if(is_array($cate)): foreach($cate as $key=>$n): if($n['top'] == '1'): ?><tr flag="<?php echo ($n["top"]); ?>">
           <?php else: ?>
                  <tr style="display: none" flag="<?php echo ($n["top"]); ?>"><?php endif; ?>
                   <td ><?php echo ($n["id"]); ?></td>
                   <td class="c_title">
                       <?php echo ($n["html"]); echo ($n["name"]); ?>
                   <?php if($n['end'] != 'true'): ?><span class="catep" openx='0'></span><?php endif; ?>
                   </td>
                   <td class="mod" style="width: 40%">
                       <a href="<?php echo U('add_top_cate_show');?>?pid=<?php echo ($n["id"]); ?>" class="btn btn-success">
                           <i class="icon-zoom-in icon-white"></i>
                           AddChildren				
                       </a>
                       <a href="<?php echo U('mod_cate');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-info">
                           <i class="icon-edit icon-white"></i>
                           Edit
                       </a>
                       <a url="<?php echo U('del_cate');?>?id=<?php echo ($n["id"]); ?>" class="btn btn-danger">
                            <i class="icon-trash icon-white"></i>
                            Delete							
                       </a>
                     
                   </td>
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>
        <ul class="catelist" style="float: left;margin-top: 20px;margin-left: 30px;">
                    <li class="endcpoint">Prev</li>
                    <li style="border:none" class="endcpoint">Next</li>
                </ul>
        <a href="<?php echo U('add_top_cate_show');?>?pid=0" class="btn addtop btn-danger" style="float: right;margin-top: 30px;">
                <i class="icon-trash icon-white"></i>
                添加顶级分类
        </a>        
    </body>
</html>