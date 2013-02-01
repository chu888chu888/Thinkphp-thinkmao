<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Common/css/base.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/add_good.css"/>
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js">

        </script>
        <script type="text/javascript" src="__PUBLIC__/Admin/js/brand.js">

        </script>
    </head>
    <body>
        <div class="ititle">
            商品品牌添加
        </div>
        <form action="<?php echo U('edit_brand');?>" method="post" class="agform">
            <input type="hidden" value="<?php echo ($id); ?>" name="id"/>
            <table>
                <tr>
                    <td class="ahead">
                        品牌的名称
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="name" class="put" value="<?php echo ($mes["name"]); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td class="ahead">
                        更改品牌LOGO
                    </td>
                </tr>
                <tr style="border: none;height:auto">
                    <td>
                         <link rel='stylesheet' href='__PUBLIC__/Uploadify/uploadify.css'/>
<style>
	.uploadify{margin-top:1em;}
	.uploadify-button {background-color: transparent;border: none;padding: 0}
    .uploadify:hover .uploadify-button {background-color: transparent}
    .upload-img{width:110px;height:60px;float:left;margin-right:10px;position:relative;}
    .upload-img .upload-del{
    	display:block;width:16px;height:16px;
    	background:url(__PUBLIC__/Uploadify/uploadify-cancel.png);
    	position:absolute;top:0;right:0;
    	cursor:pointer;
    }
</style>
<script type='text/javascript' src='__PUBLIC__/Uploadify/jquery.uploadify.min.js'></script>
<script type='text/javascript' src='__PUBLIC__/Uploadify/uploadify.js'></script>
<script type='text/javascript'>
	var uploadUrl = '__APP__/Common/uploadify';
	uploadOptions.swf = '__PUBLIC__/Uploadify/uploadify.swf';
	uploadOptions.uploader = uploadUrl;
	uploadOptions.buttonImage = '__PUBLIC__/Uploadify/button.png';
</script><input type='file' id='logo' name='logo'/><div></div>
<script type='text/javascript'>
	uploadOptions.uploadLimit = 1;
	uploadOptions.disWidth = 110;
	uploadOptions.disHeight = 60;
	uploadOptions.formData = {
		<?php echo C('VAR_SESSION_ID');?> : '<?php echo session_id();?>',
		width : '0',
		height : '0',
		path : './Uploads/brand/'
	};
	$('#logo').uploadify(uploadOptions);
</script>
                    </td>
                </tr>


                <tr>
                    <td class="ahead">
                        品牌所属分类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="add_cate">more+</span>
                    </td>
                </tr>
                <?php if(is_array($mes["cid"])): foreach($mes["cid"] as $k=>$m): if($k == 0): ?><tr id="tmplate">
                    <td>
                        <select name="cid[]">
                            <option value="">请选择</option>
                            <?php if(is_array($category)): foreach($category as $key=>$v): if($m == $v['id']): ?><option value="<?php echo ($v["id"]); ?>" selected="selected"><?php echo ($v["html"]); echo ($v["name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <span></span>
                    </td>
                </tr>
                  <?php else: ?>
                   <tr id="tmplate">
                    <td>
                        <select name="cid[]">
                            <option value="">请选择</option>
                            <?php if(is_array($category)): foreach($category as $key=>$v): if($m == $v['id']): ?><option value="<?php echo ($v["id"]); ?>" selected="selected"><?php echo ($v["html"]); echo ($v["name"]); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <span class="cate_del">del-</span>
                    </td>
                </tr><?php endif; endforeach; endif; ?>






                 <tr>
                    <td class="ahead">
                        是否为热卖品牌
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <span>是:</span>
                            <?php if($mes["hot"] == 1): ?><input type="radio" name="hot" value="1" checked="checked"/>
                        <?php else: ?>
                         <input type="radio" name="hot" value="1"/><?php endif; ?>
                        </label>
                         <label>
                             <span>否:</span>
                              <?php if($mes['hot'] == 0): ?><input type="radio" name="hot" value="0" checked="checked"/>
                           <?php else: ?>
                            <input type="radio" name="hot" value="0"/><?php endif; ?>
                        </label>
                    </td>
                </tr>


                  <tr>
                    <td class="ahead">
                        品牌简介
                    </td>
                </tr>
                <tr>
                    <td>
                       <textarea name="descript" id="textarea">
                              <?php echo ($mes["descript"]); ?>
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