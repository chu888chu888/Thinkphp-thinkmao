<?php
import('TagLib');
Class TagLibPic extends TagLib {

	Protected $tags = array(
		'upload' => array('attr' => 'name,width,height,limit,path', 'close' => 0),
		'editor' => array('attr' => 'name,width,height,content,path', 'close' => 0),
		);

	/**
	 * Uploadify上传组件
	 * @param  [type] $attr    [name,width,height,limit,path]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	Public function _upload ($attr, $content) {
		$attr = $this->parseXmlAttr($attr);
		if (!isset($attr['name'])) halt('上传组件必须指定NAME值');
		$name = $attr['name'];	//接收表单的NAME名
		$width = isset($attr['width']) ? $attr['width'] : 0;	//生成缩略图宽
		$height = isset($attr['height']) ? $attr['height'] : 0;	//生成缩略图高
		$limit = isset($attr['limit']) ? $attr['limit'] : 10;	//充许上传文件个数
		$path = isset($attr['path']) ? rtrim($attr['path'], '/') . '/' : './Uploads/Goods/';	//上传文件保存路径
		$display = isset($attr['display']) ? explode(',', $attr['display']) : array(140, 180);	//上传成功后显视的预览图宽高
		$disWidth = $display[0];
		$disHeight = $display[1];
		if (!defined('UPLOADIFY')) {
			$str .= <<<str
<link rel='stylesheet' href='__PUBLIC__/Uploadify/uploadify.css'/>
<style>
	.uploadify{margin-top:1em;}
	.uploadify-button {background-color: transparent;border: none;padding: 0}
    .uploadify:hover .uploadify-button {background-color: transparent}
    .upload-img{width:{$disWidth}px;height:{$disHeight}px;float:left;margin-right:10px;position:relative;}
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
</script>
str;
			define('UPLOADIFY', 1);
		}
		$str .= <<<str
<input type='file' id='{$name}' name='{$name}'/><div></div>
<script type='text/javascript'>
	uploadOptions.uploadLimit = {$limit};
	uploadOptions.disWidth = {$disWidth};
	uploadOptions.disHeight = {$disHeight};
	uploadOptions.formData = {
		<?php echo C('VAR_SESSION_ID');?> : '<?php echo session_id();?>',
		width : '{$width}',
		height : '{$height}',
		path : '{$path}'
	};
	$('#$name').uploadify(uploadOptions);
</script>
str;
		return $str;
	}

	/**
	 * 百度编辑器UEditor
	 * @param  [type] $attr    [width,height,content]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	Public function _editor ($attr, $content) {
		$attr = $this->parseXmlAttr($attr);
		if (!isset($attr['name'])) halt('编辑器组件必须指定NAME值');
		$name = $attr['name'];	//接收表单的NAME
		$path = isset($attr['path']) ? $attr['path'] : './Uploads/Editor/';	//上传图片的保存路径
		$width = isset($attr['width']) ? $attr['width'] : '100%';	//编辑器宽度
		$height = isset($attr['height']) ? $attr['height'] : '300';	//编辑器高度
		$content = isset($attr['content']) ? $attr['content'] : '';	//初始化默认内容
		$str = '';
		if (!defined('UEDITOR')) {
			$str .= <<<str
<script type='text/javascript'>window.UEDITOR_HOME_URL = '__PUBLIC__/Ueditor/';</script>
<script type='text/javascript' src='__PUBLIC__/Ueditor/editor_config.js'></script>
<script type='text/javascript' src='__PUBLIC__/Ueditor/editor.min.js'></script>
str;
			define('UEDITOR', 1);	
		}
		$str .= <<<str
<script type='text/plain' name='{$name}' id='{$name}'></script>
<script type='text/javascript'>
	UEDITOR_CONFIG.initialFrameWidth = '{$width}';
    UEDITOR_CONFIG.initialFrameHeight = '{$height}';
    UEDITOR_CONFIG.initialContent = '{$content}';
    UEDITOR_CONFIG.imageUrl = '__APP__/Common/editor?path={$path}';
    UEDITOR_CONFIG.imagePath = '__ROOT__';
    UE.getEditor('{$name}');
</script>
str;
		return $str;
	}
}
?>