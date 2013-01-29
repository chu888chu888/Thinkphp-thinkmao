<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Common/css/base.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/add_good.css"/>
    </head>
    <body>
        <div class="ititle">
            商品分类添加
        </div>
        <form action="<?php echo U('mod_cate_c');?>" method="post" class="agform">
            <table>
            <tr>
                <td class="ahead">
                请输入分类的名称
                </td>
            </tr>
             <tr>
             <td>
               <input type="text" name="name" class="put" value="<?php echo ($cate["name"]); ?>"/>
               <input type="hidden" name="pid" value="<?php echo ($cate["pid"]); ?>"/>
               <input type="hidden" name="id" value="<?php echo ($cate["id"]); ?>"/>
             </td>
            </tr>


             <tr>
                <td class="ahead">
                请选择分类的类型
                </td>
            </tr>
             <tr>
               <td>
                   <select name="tid">
                       <option value="<?php echo ($mes["id"]); ?>">
                           <?php echo ($mes["name"]); ?>
                       </option>
                       <?php if(is_array($data)): foreach($data as $key=>$n): ?><option value="<?php echo ($n["id"]); ?>">
                            <?php echo ($n["name"]); ?>
                            </option><?php endforeach; endif; ?>
                   </select>
             </td>
            </tr>
            <tr>
                <td class="ahead">
                 选择父级别栏目
                </td>
            </tr>
               <tr>
               <td>
                   <select name="pid">
                       <option value="<?php echo ($pcate["id"]); ?>">
                           <?php echo ($pcate["name"]); ?>
                       </option>
                       <?php if(is_array($cateall)): foreach($cateall as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>">
                            <?php echo ($v["html"]); echo ($v["name"]); ?>
                            </option><?php endforeach; endif; ?>
                   </select>
             </td>
            </tr>
            <tr>
                <td align="right">
                 <input type="submit" value="确定" class="gsubmit"/>
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>