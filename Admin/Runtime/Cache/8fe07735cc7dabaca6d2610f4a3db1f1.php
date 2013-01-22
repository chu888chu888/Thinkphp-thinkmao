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
    </head>
    <body>
         <div class="ititle">
            商品属性添加
        </div>
        <form action="<?php echo U('edit_good_attr');?>" method="post" class="agform">
            <table style="height:500px;width:500px;margin-left: -100px">
            <tr>
                <td class="ahead">
                请输入属性名称:
                </td>
            </tr>
             <tr>
               <td>
                   <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
               <input type="text" name="name" class="put"/>
             </td>
            </tr>
             <tr>
                <td class="ahead">
                属性值的类型
                </td>
            </tr>
             <tr>
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
                录入的方式：
                </td>
            </tr>
             <tr>
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
                <td>
                    <textarea style="height:80px;width:300px;border: 2px solid #009A61" name="select" class="sel">
                        
                    </textarea>
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