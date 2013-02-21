<?php
import('TagLib');
Class TagLibPic extends TagLib {

	Protected $tags = array(
		'upload' => array('attr' => 'name,width,height,limit,path', 'close' => 0),
		'editor' => array('attr' => 'name,width,height,content,path', 'close' => 0),
                                       'cate1'=>array('attr'=>'cid,row','close'=>1,"level"=>1),
                                       'cate2'=>array('attr'=>'cd,row','close'=>1,"level"=>2),
                                       'cate3'=>array('attr'=>'cid,row','close'=>1,"level"=>3),
                                        'cate4'=>array('attr'=>'cid,row','close'=>1,"level"=>4),
                                       'brand'=>array('attr'=>'cid,row,type','close'=>1,"level"=>1),
                                       'gbrand'=>array('attr'=>'cid,row,type','close'=>1,"level"=>1),
                                       'attr'=>array('attr'=>'gid,row','close'=>1,"level"=>1),
                                       'specname'=>array('attr'=>'gid,row','close'=>1,"level"=>1),
                                       'specvalue'=>array('attr'=>'aid,row,gid','close'=>1,"level"=>1),
                                       'inven'=>array('attr'=>'gid','close'=>1,"level"=>1),
                                       'goods'=>array('attr'=>'gid','close'=>1),
                                       'imgs'=>array('attr'=>'gid,type,row','close'=>1),
                                       'gellery'=>array('attr'=>'gid,type,row','close'=>1),
                                       'chgoods'=>array('attr'=>'cid,type,row,num','close'=>1),
                                       'segoods'=>array('attr'=>'gids,type,row','close'=>1),
                                       'allgood'=>array('attr'=>'gid','close'=>1),
                                       'select'=>array('attr'=>'cid,row','close'=>1),
                                       'selval'=>array('attr'=>'value,row','close'=>1),
                                       'ncate'=>array('attr'=>'cid,row','close'=>1),
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
        
        
        
         /**
     * 获得孙子级别栏目
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _ncate($attr,$content){
         $tag    = $this->parseXmlAttr($attr,'ncate');
         if(!$tag['cid'] && !$_GET['cid']){
                return;
            }
         $id = empty($tag['cid'])? $_GET['cid'] : $tag['cid'];
         $row = empty($tag['row'])? 30 : $tag['row'];
         $str = '';
         $str .='<?php ';
         $str .='$data = next_cate('.$id.');?>';
         $str.='<?php foreach($data as $k=>$field){?>';
          $str.='<?php if($k<'.$row.'){?>';
         $str.='<?php $field["url"]=U("List/index",array(\'cid\'=>$field[\'id\']));?>';
         $str .='<?php $field["name"]=slice_brand($field["name"]);?>';
         $str.=$content;
         $str.='<?php }; ?>';
          $str.='<?php } ?>';
         return $str;
    }



    /**
     * 遍历出筛选属性名
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _select($attr,$content){
          $tag = $this->parseXmlAttr($attr,'select');
            if(!$tag['cid'] && !$_GET['cid']){
                return;
         }
           $rows = empty($tag['row'])? 5 : $tag['row'];
           $cid = empty($tag['cid']) ? $_GET['cid'] : $tag['cid'];
           $str='';
           $str.='<?php ';
           $str.='$all = get_all_cid_select('.$cid.');';
           $str.='foreach($all as $k=>$field){';
           $str.='if($k<'.$rows.'){?>';
           $str.=  $content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;
    }
     /**
     * 遍历出筛选属性值
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _selval($attr,$content){
          $tag = $this->parseXmlAttr($attr,'select');
            if(!$tag['value']){
                return;
         }
           $value = $tag['value'];
           $rows = empty($tag['row'])? 10 : $tag['row'];
           $str='';
           $str.='<?php ';
           $str.='foreach('.$value.' as $k=>$attr){';
           $str.='if($k<'.$rows.'){?>';
           $str.='<?php $url = U("Select/index",array(\'aid\'=>$field[\'id\'],\'num\'=>$k));?>';
           $str.=  $content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;
    }
    /**
     * 获得商品的所有的信息
     * @param type $attr
     * @param type $content
     * @return string
     */
     public function _allgood($attr,$content){
         $tag = $this->parseXmlAttr($attr,'allgood');
         if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
           $str='';
           $str.='<?php ';
           $str.='$good_mes_all = get_goods_mes('.$gid.');';
           $str.='$mes[1] = $good_mes_all;';
           $str.='foreach($mes as $k=>$field){?>';
           $str.='<?php $url = U("Good/index",array(\'gid\'=>$field[\'id\']));?>';
           $str.='<?php $bidurl = U("Brand/index",array(\'bid\'=>$field[\'bid\']));?>';
           $str.=  $content;
           $str.='<?php } ?>';
           return $str;

    }


    public function _segoods($attr,$content){
        $tag = $this->parseXmlAttr($attr,'segoods');
                if(!$tag['gids']){
                return;
              }
           $rows = empty($tag['row'])? 10 : $tag['row'];
           $type = empty($tag['type'])? 0 : $tag['type'];
           $gids = $tag['gids'];
           $str.='';
           $str.='<?php ';
           $str.='$cids =explode(",",'.$gids.') ;';
           $str.='shuffle($cids);';
           $str.='foreach($cids as $k=>$hotgid){';
           $str.= 'if($k<'.$rows.'){ ?>';
           $str.='<?php $url = U("Good/index",array(\'gid\'=>$hotgid));?>';
           $str.=  $content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;

    }

    /**
     * 返回某个栏目下的热卖，推荐商品id
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _chgoods($attr,$content){
           $tag = $this->parseXmlAttr($attr,'chgoods');
                if(!$tag['cid'] && !$_GET['cid']){
                return;
              }
           $rows = empty($tag['row'])? 10 : $tag['row'];
           $type = empty($tag['type'])? 0 : $tag['type'];
           $cid = empty($tag['cid']) ? $_GET['cid'] : $tag['cid'];
           $p = isset($_GET['p']) ? $_GET['p'] : 1;
           $num = empty($tag['num'])? 10 : $tag['num'];
           $less = ($p-1)*$num;
           $more = $p*$num;
           $str.='';
           $str.='<?php ';
           $str.='$cids = check_cate_hot_goods('.$cid.',"'.$type.'");';
           $str.='$arr = array();';
            $str.='foreach($cids as $ks=>$vs){';
              $str.='if($ks>'.$less.' && $ks<='.$more.'){';
               $str.='$arr[] = $vs;';
                 $str.='}';
                  $str.='}';
               $str.='$cids=$arr;';
//           $str.='shuffle($cids);';
           $str.='foreach($cids as $k=>$hotgid){';
           $str.= 'if($k<'.$rows.'){ ?>';
           $str.='<?php $url = U("Good/index",array(\'gid\'=>$hotgid));?>';
           $str.=  $content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;

    }
    /**
     * 商品的图片相册读取
     * middle mini max
     * 使用{$field}取图片
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _imgs($attr,$content){
          $tag = $this->parseXmlAttr($attr,'imgs');
                if(!$tag['gid'] && !$_GET['gid']){
                return;
              }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
           $type = empty($tag['type']) ? 'mini' : $tag['type'];
           $row = empty($tag['row'])? 10 : $tag['row'];
           $str='';
           $str.='<?php ';
           $str.='$good_mes_all = get_goods_mes('.$gid.');';
           $str.='$mini = $good_mes_all["mini"];';
           $str.='$medium = $good_mes_all["medium"];';
           $str.='$max = $good_mes_all["max"];';
           $str.='$img["mini"]=$mini;';
           $str.='$img["medium"]=$medium;';
           $str.='$img["max"]=$max;';
           $str.='foreach($img["'.$type.'"] as $key=>$field){';
           $str.='if($key<'.$row.'){?>';
           $str.='<?php $num="$key";?>';
           $str.=$content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;

    }



    public function _gellery($attr,$content){
          $tag = $this->parseXmlAttr($attr,'gellery');
                if(!$tag['gid'] && !$_GET['gid']){
                return;
              }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
           $type = empty($tag['type']) ? 'mini' : $tag['type'];
           $row = empty($tag['row'])? 10 : $tag['row'];
           $str='';
           $str.='<?php ';
           $str.='$good_mes_all = get_goods_mes('.$gid.');';
           $str.='$mini = $good_mes_all["mini"];';
           $str.='$medium = $good_mes_all["medium"];';
           $str.='$max = $good_mes_all["max"];';
           $str.='$imgs = format_gellery($mini,$medium,$max);';
           $str.='foreach($imgs as $key=>$field){';
           $str.='if($key<'.$row.'){?>';
           $str.=  $content;
           $str.='<?php } ?>';
           $str.='<?php } ?>';
           return $str;

    }
    /**
     * 读取商品信息
     * 使用的是goods表
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _goods($attr,$content){
         $tag = $this->parseXmlAttr($attr,'goods');
         if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
           $str='';
           $str.='<?php ';
           $str.='$db = M("goods");';
           $str.='$data = $db->where(array("id"=>'.$gid.'))->select();';
           $str.='foreach($data as $k=>$field){?>';
           $str.='<?php $url = U("Good/index",array(\'gid\'=>$field[\'id\']));?>';
           $str.= $content;
           $str.= '<?php } ?>';
           return $str;
    }
 /**
 * 获取商品的套餐信息
 * @param type $attr
 * @param type $content
 * @return string
 */
    public function _inven($attr,$content){
         $tag = $this->parseXmlAttr($attr,'inven');
         if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
           $str='';
           $str.='<?php ';
           $str.='$good_mes_all = get_goods_mes('.$gid.');';
           $str.='$inven = $good_mes_all["inven"];';
           $str.='foreach($inven as $k=>$field){?>';
           $str.=  $content;
           $str.='<?php } ?>';
           return $str;

    }
    /**
     * 获取规格的id与name
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _specname($attr,$content){
         $tag = $this->parseXmlAttr($attr,'specname');
          if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
         $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
         $rows = empty($tag['row'])? 20 : $tag['row'];
               $str='';
               $str.='<?php ';
               $str.='$good_mes_all = get_goods_mes('.$gid.');';
               $str.='$specs = $good_mes_all["specs"];';
               $str.='$specsx = get_spec_name($specs);';
               $str.='foreach($specsx as $k=>$field){';
               $str.= 'if($k<'.$rows.'){ ?>';
               $str.=  $content;
               $str.='<?php } ?>';
               $str.='<?php } ?>';
               return $str;
    }
    /**
     * 获取某一规格的属性值
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _specvalue($attr,$content){
         $tag = $this->parseXmlAttr($attr,'specvalue');
         if(!$tag['aid']){
                return;
         }
         if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
         $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
         $rows = empty($tag['row'])? 40 : $tag['row'];
               $aid = $tag['aid'];
               $str.='<?php ';
               $str.='$good_mes_all = get_goods_mes('.$gid.');';
               $str.='$specs = $good_mes_all["specs"]['.$aid.'];';
               $str.='foreach($specs as $k=>$field){?>';
               $str.=  $content;
               $str.='<?php } ?>';
               return $str;

    }
    /**
     * 读取商品属性标签
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _attr($attr,$content){
              $tag = $this->parseXmlAttr($attr,'attr');
               if(!$tag['gid'] && !$_GET['gid']){
                return;
         }
           $gid = empty($tag['gid']) ? $_GET['gid'] : $tag['gid'];
               $rows = empty($tag['row'])? 200 : $tag['row'];
               $str='';
               $str.='<?php ';
               $str.='$good_mes_all = get_goods_mes('.$gid.');';
               $str.='$attrs = $good_mes_all["attrs"];';
               $str.='foreach($attrs as $k=>$field){?>';

               $str.=  $content;

               $str.='<?php } ?>';
               return $str;
    }

    /**
     * 读取栏目下所有的品牌
     * 获取该栏目下的热卖品牌
     * 通过商品关联
     * @param type $attr
     * @param type $content
     * @return type
     */

    public function _gbrand($attr,$content){
           $tag = $this->parseXmlAttr($attr,'gbrand');
            if(!$tag['cid'] && !$_GET['cid']){
                return;
            }
            $rows = empty($tag['row'])? 20 : $tag['row'];
            if(empty($tag['type'])){
                $type = 0;
            }
            $cid = empty($tag['cid'])?$_GET['cid']:$tag['cid'];
            $str  = '';
            $str .= '<?php ';
            $str .='$db=M("brand");';
            $str .='$all_bid = cate_good_brand('.$cid.');';
            $str .= '$bids =  implode(",",$all_bid);';
            if($type == 1){
            $str .= '$data = $db->where("id in ($bids) and hot = 1")->select();';
            }else{
            $str .= '$data = $db->where("id in ($bids)")->select();';
            }
            $str .= 'foreach($data as $k=>$field){';
            $str .= 'if($k<'.$rows.'){ ?>';
            $str .='<?php $field["url"]=U("Select/index",array(\'bid\'=>$field[\'id\']));?>';
            $str .='<?php $field["name"]=slice_brand($field["name"]);?>';
            $str .=  $content;
            $str .= '<?php } ?>';
            $str .= '<?php } ?>';
            return $str;

    }



    /**
     * 读取栏目下所有的品牌
     * 获取该栏目下的热卖品牌
     * @param type $attr
     * @param type $content
     * @return string
     */
     public function _brand($attr,$content){
            $tag = $this->parseXmlAttr($attr,'brand');
            if(!$tag['cid'] && !$_GET['cid']){
                return;
            }
            $rows = empty($tag['row'])? 20 : $tag['row'];
            if(empty($tag['type'])){
                $type = 0;
            }
            $cid = empty($tag['cid'])?$_GET['cid']:$tag['cid'];
            $str  = '';
            $str .= '<?php ';
            $str .='$db=M("brand");';
            $str .='$all_cid = check_all_cate('.$cid.');';
            $str .= '$add_bid = cate_brand($all_cid);';
            $str .= '$bids =  implode(",",$add_bid);';
            if($type == 1){
            $str .= '$data = $db->where("id in ($bids) and hot = 1")->select();';
            }else{
            $str .= '$data = $db->where("id in ($bids)")->select();';
            }
            $str .= 'foreach($data as $k=>$field){';
            $str .= 'if($k<'.$rows.'){ ?>';
            $str .='<?php $field["url"]=U("Select/index",array(\'bid\'=>$field[\'id\']));?>';
            $str .='<?php $field["name"]=slice_brand($field["name"]);?>';
            $str .=  $content;
            $str .= '<?php } ?>';
            $str .= '<?php } ?>';
            return $str;
     }
     /**
      * 读取一级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate1($attr,$content){
              return $this->common_cate($attr, $content,'cate1');
     }
     /**
      * 读取二级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate2($attr,$content){
              return $this->common_cate($attr, $content,'cate2');
     }
     /**
      * 读取三级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate3($attr,$content){
              return $this->common_cate($attr, $content,'cate3');
     }
      /**
      * 读取四级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate4($attr,$content){
              return $this->common_cate($attr, $content,'cate4');
     }
     /**
      * 读取栏目公共函数
      * @param type $attr
      * @param type $content
      * @return string
      */
     private  function common_cate($attr,$content,$name){
         $tag    = $this->parseXmlAttr($attr,$name);
         if(!$tag['cid'] && !$_GET['cid']){
                return;
            }
         $id = empty($tag['cid'])? $_GET['cid'] : $tag['cid'];
         $str = '';
         $str .= '<?php ';
         $str .= '$db = M("category");';
         if($id == 'top'){
             $str .='$data = $db->where(array("pid"=>0))->select();?>';
         }else{
             $str .='$data = $db->where(array("pid"=>'.$id.'))->select();?>';
         }
         $str.='<?php foreach($data as $field){?>';
         $str.='<?php $field["url"]=U("List/index",array(\'cid\'=>$field[\'id\']));?>';
         $str.=$content;
         $str.='<?php }; ?>';
         return $str;
     }
        
        
        
        
        
}
?>