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
                    <?php if(is_array($attr_all)): foreach($attr_all as $key=>$m): ?><td colspan="2">
                            规格
                        </td><?php endforeach; endif; ?>
                         <td >
                            库存
                        </td>
                </tr>
            </thead>
        <tbody>           
               <tr>
                   <td class="good_id"><?php echo ($gid); ?></td>
                  <?php if(is_array($attr_all)): foreach($attr_all as $key=>$k): ?><td>
                       <?php echo ($k["attr_name"]); ?>
                   </td>
                   <td>
                      <select name="attr_id[]">
                          <option value="">选择规格值</option>
                          <?php if(is_array($k["value"])): foreach($k["value"] as $key=>$n): ?><option value="<?php echo ($n); ?>"><?php echo ($n); ?></option><?php endforeach; endif; ?>
                      </select>
                   </td><?php endforeach; endif; ?>
                   <td>
                       <input type="text" name="number" />
                   </td>
                  
               </tr>       
           
         </tbody>
        </table>       
    </body>
</htm