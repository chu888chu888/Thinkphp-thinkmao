<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title></title>   
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/Agood.css" />
        <script src="__PUBLIC__/Common/js/jquery-1.8.3.js"></script>
        <script src="__PUBLIC__/Admin/js/addgood.js"></script>
        <script type="text/javascript">
            var brands_url = '<?php echo U("brands");?>';
            var attr_url = '<?php echo U("attr");?>';
        </script>
    </head>
    <body>
        <div class="ititle">
            商品上传
        </div>
        <ul class="guid">
            <li>基本信息</li>
            <li>详细描述</li>
            <li>其他信息</li>
            <li>商品属性</li>
            <li>商品相册</li>
            <li>售后服务</li> 
        </ul>
        <form action="" method="post" class="form">
            <div class="innerbox">
                <table class="tb">
                    <tr>
                        <td class="tname">商品名称:</td>
                        <td>
                            <input type="text" name="name" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">商品单位:</td>
                        <td>
                            <input type="text" name="unit" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">商品货号:</td>
                        <td>
                            <input type="text" name="number" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">商品分类:</td>
                        <td>                            
                            <select name="cid[]" id="cate">
                                <option value="">选择分类</option>
                                <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" tid="<?php echo ($v["tid"]); ?>" pid='<?php echo ($v["pid"]); ?>'>
                                        <?php echo ($v["html"]); echo ($v["name"]); ?>
                                    </option><?php endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tname"> 拓展分类:</td>
                        <td>
                            <input type="button"  value="添加分类" class="button"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">商品品牌:</td>
                        <td>
                            <select name="bid[]" id="brand">
                                <option value="0">选择品牌:</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">本店售价:</td>
                        <td>
                            <input type="text" name="price" />&nbsp;&nbsp;&nbsp;元
                        </td>
                    </tr>
                    <tr>
                        <td class="tname">市场售价:</td>
                        <td>
                            <input type="text" name="mprice" />&nbsp;&nbsp;&nbsp;元
                        </td>
                    </tr>

                </table>
            </div>


            <div class="innerbox">
                <table class="tb ed">
                    <tr>
                        <td class="tfont">商品详细介绍:</td>
                    </tr>
                    <tr  class="edit">
                        <td>
                            <script type='text/javascript'>window.UEDITOR_HOME_URL = '__PUBLIC__/Ueditor/';</script>
<script type='text/javascript' src='__PUBLIC__/Ueditor/editor_config.js'></script>
<script type='text/javascript' src='__PUBLIC__/Ueditor/editor.min.js'></script><script type='text/plain' name='intro' id='intro'></script>
<script type='text/javascript'>
	UEDITOR_CONFIG.initialFrameWidth = '100%';
    UEDITOR_CONFIG.initialFrameHeight = '300';
    UEDITOR_CONFIG.initialContent = '';
    UEDITOR_CONFIG.imageUrl = '__APP__/Common/editor?path=./Uploads/Editor/';
    UEDITOR_CONFIG.imagePath = '__ROOT__';
    UE.getEditor('intro');
</script>
                        </td>
                    </tr>
                </table>
            </div>     

            <div class="innerbox">
                <table class="tb ed">
                    <tr>
                        <td style="width:200px;">是否为推荐商品：</td>                  
                        <td align="left">
                            <label>
                                <span>是</span>
                                <input type="radio" name="recommend" value="1"/>
                            </label>	
                            <label>
                                <span>否</span>
                                <input type="radio" name="recommend" value="0" />
                            </label>	
                        </td>
                    </tr>
                    <tr>
                        <td style="width:200px;">是否为热卖商品：</td>                   
                        <td align="left">
                               <label>
                                <span>是</span>
                                <input type="radio" name="hot" value="1"/>
                            </label>	
                            <label>
                                <span>否</span>
                                <input type="radio" name="hot" value="0" />
                            </label>	
                        </td>
                    </tr>
                </table>
            </div>    
            
            <div class="innerbox">
                <table class="tb">
                    <tr>
                        <td class="tfont" width="100px;">选择商品属性:</td>
                         <td>
                        <select name="tid" id="good_type">
                            <option value="0">选择商品类型</option>
                            <?php if(is_array($goods_type)): foreach($goods_type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        </td>
                    </tr>
                   
                </table>
            </div>    
            
             <div class="innerbox">
                 <table class="tb" style="width:80%">
                    <tr>
                        <td class="tfont" width="100px;">商品图册:</td>
                        
                    </tr>
                     <tr>
                          <td>
                              <link rel='stylesheet' href='__PUBLIC__/Uploadify/uploadify.css'/>
<style>
	.uploadify{margin-top:1em;}
	.uploadify-button {background-color: transparent;border: none;padding: 0}
    .uploadify:hover .uploadify-button {background-color: transparent}
    .upload-img{width:140px;height:180px;float:left;margin-right:10px;position:relative;}
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
</script><input type='file' id='img' name='img'/><div></div>
<script type='text/javascript'>
	uploadOptions.uploadLimit = 10;
	uploadOptions.disWidth = 140;
	uploadOptions.disHeight = 180;
	uploadOptions.formData = {
		<?php echo C('VAR_SESSION_ID');?> : '<?php echo session_id();?>',
		width : '0',
		height : '0',
		path : './Uploads/img_list/'
	};
	$('#img').uploadify(uploadOptions);
</script>
                        </td>
                     </tr>
                   
                </table>
            </div>    
           
            
             <div class="innerbox">
                <table class="tb ed">
                    <tr>
                        <td class="tfont">售后服务:</td>
                    </tr>
                    <tr  class="edit">
                        <td>
                            <script type='text/plain' name='service' id='service'></script>
<script type='text/javascript'>
	UEDITOR_CONFIG.initialFrameWidth = '100%';
    UEDITOR_CONFIG.initialFrameHeight = '300';
    UEDITOR_CONFIG.initialContent = '';
    UEDITOR_CONFIG.imageUrl = '__APP__/Common/editor?path=./Uploads/Editor/';
    UEDITOR_CONFIG.imagePath = '__ROOT__';
    UE.getEditor('service');
</script>
                        </td>
                    </tr>
                </table>
            </div>  



            <input type="submit" value="确定" class="gsubmit" style="margin-left: 85%"/>
        </form>
    </body>
</html>