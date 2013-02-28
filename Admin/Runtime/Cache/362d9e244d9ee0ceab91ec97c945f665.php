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
            商品类型添加
        </div>
        <form action="<?php echo U('edit_good_type');?>?id=<?php echo ($good_type_mes["id"]); ?>" method="post" class="agform">
            <table>
            </tr>
                <td class="ahead">
                  类型的名称
                </td>
            </tr>
             </tr>
             <td>
               <input type="hidden" name="id"  value="<?php echo ($good_type_mes["id"]); ?>"/>
               <input type="text" name="name" class="put" value="<?php echo ($good_type_mes["name"]); ?>"/>
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