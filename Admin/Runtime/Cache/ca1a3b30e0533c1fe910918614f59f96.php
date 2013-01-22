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
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js">
            
        </script>
    </head>
    <body>
        <div class="ititle">
            商品品牌添加
        </div>
        <form action="<?php echo U('add_brand');?>" method="post" class="agform">
            <table>
                <tr>
                    <td class="ahead">
                        请输入品牌的名称
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="name" class="put"/>
                    </td>
                </tr>


                <tr>
                    <td class="ahead">
                        上传品牌LOGO
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
                        品牌所属分类
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="cid">
                            <option value="">请选择</option>
                            <?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>






                 <tr>
                    <td class="ahead">
                        是否为热卖品牌
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <span>是:</span>
                        <input type="radio" name="hot" value="1"/>
                        </label>
                         <label>
                             <span>否:</span>
                             
                         <input type="radio" name="hot" value="0"/>
                        </label>
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