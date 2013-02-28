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
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
        <script src="__PUBLIC__/Admin/js/ega.js"></script>
        <script type="text/javascript">
              var public_url = "__PUBLIC__";
        </script>
    </head>
    <body>
         <div class="ititle">
            商品属性添加
        </div>
        <form action="<?php echo U('edit_good_attr');?>" method="post" class="agform">
            <table>
            <tr>
                <td class="ahead">
                请输入属性名称:
                </td>
                <td>
                   <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                  <input type="text" name="name" class="put"/>
                   </td>
            </tr>            
             <tr>
                <td class="ahead">
                属性值的类型:
                </td>
                <td>
                   <label >
                       <span class="ega">属性：</span>
                       <input type="radio" name="type" value='0' class="ega" style="margin-top: 10px;"/>
                   </label>
                    <label >
                        <span class="ega">规格：</span>
                       <input type="radio" name="type" value="1" class="ega" style="margin-top: 10px;"/>
                   </label>

             </td>
            </tr>
            


             <tr>
                <td class="ahead">
                  是否设为筛选属性:
                </td>
                <td>
                  
                   <input type="button" class="butage">
                   <input type="hidden" name="gselect"  value="0"/>
             </td>
            </tr>
            




             <tr>
                <td class="ahead">
                录入的方式：
                </td>
                <td>
                   <label >
                       <span class="ega">手工录入:</span>
                       <input type="radio" class="select_type ega" name="puttype"  value='0' style="margin-top: 10px;"/>
                   </label >
                    <label>
                        <span  class="ega">自动选择:</span>
                       <input type="radio" class="select_type ega" name="puttype"  value="1" style="margin-top: 10px;"/>
                   </label>
             </td>
            </tr>
            


            <tr>
                <td colspan="2">
                    <textarea class="text sel" name="select">

                    </textarea>
                </td>
            </tr>

            <tr>
                <td align="right" colspan="2">
               <input type="submit" value="确定" class="gsubmit"/>
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>