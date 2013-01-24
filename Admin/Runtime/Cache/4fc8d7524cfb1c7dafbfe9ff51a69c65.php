<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/channel.css" />   
    <link rel="stylesheet" href="__PUBLIC__/Admin/css/list_goods.css" /> 
    <script type="text/javascript" src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Admin/js/list_goods.js"></script>
</head>
 <body>
     <form action="<?php echo U('put_number');?>" method="post">
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
        <tbody id="tbody">
            <?php if(is_array($data)): foreach($data as $krows=>$t): ?><tr class="tmplate">
                   <td class="good_id"><?php echo ($gid); ?></td>
                  <?php if(is_array($attr_all)): foreach($attr_all as $kcomcol=>$k): ?><td>
                       <?php echo ($k["attr_name"]); ?>
                   </td>
                   <td>
                      <select name="<?php echo ($gid); ?>[<?php echo ($k["attr_id"]); ?>][]">
                          <option value="all">选择规格值</option>
                          <?php if(is_array($k["value"])): foreach($k["value"] as $key=>$n): if($t['attr'][$kcomcol]['1'] == $key): ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($n); ?></option>
                              <?php else: ?>
                                 <option value="<?php echo ($key); ?>"><?php echo ($n); ?></option><?php endif; endforeach; endif; ?>
                      </select>
                   </td><?php endforeach; endif; ?>
                   <td id="gnum">
                       <input type="text" name="<?php echo ($gid); ?>[number][]" value="<?php echo ($t["inventory"]); ?>"/>&nbsp;&nbsp;&nbsp;<?php echo ($goods_mes["0"]["unit"]); ?>&nbsp;&nbsp;&nbsp;<span class="ldel">del-</span>
                   </td>
                  
               </tr><?php endforeach; endif; ?>
         </tbody>
        </table>  
         <div id="gsbu">
             <input type="buttom" value="添加" class="gsubmit adde"/>
             <input type="submit" value="确定" class="gsubmit"/>
         </div>
        </form>
    </body>
</html>