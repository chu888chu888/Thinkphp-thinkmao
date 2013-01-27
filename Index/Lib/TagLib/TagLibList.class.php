<?php
import('TagLib');
Class TagLibList extends TagLib {
    protected $tags   =  array(
               // 定义标签
               'cate1'=>array('attr'=>'cid,row','close'=>1,"level"=>1),
               'cate2'=>array('attr'=>'cd,row','close'=>1,"level"=>2),
               'cate3'=>array('attr'=>'cid,row','close'=>1,"level"=>3),
               'brand'=>array('attr'=>'cid,row,type','close'=>1,"level"=>1),
               'attr'=>array('attr'=>'gid,row','close'=>1,"level"=>1),
               'specname'=>array('attr'=>'gid,row','close'=>1,"level"=>1),
               'specvalue'=>array('attr'=>'aid,row,gid','close'=>1,"level"=>1),
               'inven'=>array('attr'=>'gid','close'=>1,"level"=>1),
               'goods'=>array('attr'=>'gid','close'=>1),
               'imgs'=>array('attr'=>'gid,type,row','close'=>1),
               'chgoods'=>array('attr'=>'cid,type,row','close'=>1),

);
    public function _chgoods($attr,$content){
           $tag = $this->parseXmlAttr($attr,'imgs');
                if(!$tag['cid'] && !$_GET['cid']){
                return;
              }
           $rows = empty($tag['rows'])? 10 : $tag['rows'];
           $type = empty($tag['type'])? "hot" : $tag['type'];
           $cid = empty($tag['cid']) ? $_GET['cid'] : $tag['cid'];
           $str.='';
           $str.='<?php ';
           $str.='$cids = check_cate_hot_goods('.$cid.',"'.$type.'");';
           $str.='foreach($cids as $k=>$field){';
           $str.= 'if($k<'.$rows.'){ ?>';
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
         $rows = empty($tag['rows'])? 20 : $tag['rows'];
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
         $rows = empty($tag['rows'])? 40 : $tag['rows'];
               $aid = $tag['aid'];
               $str.='<?php ';
               $str.='$good_mes_all = get_goods_mes('.$gid.');';
               $str.='$specs = $good_mes_all["specs"]['.$aid.'];';
               $str.='foreach($specs as $k=>$field){';
               $str.= 'if($k<'.$rows.'){ ?>';
               $str.=  $content;
               $str.='<?php } ?>';
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
               $rows = empty($tag['rows'])? 200 : $tag['rows'];
               $str='';
               $str.='<?php ';
               $str.='$good_mes_all = get_goods_mes('.$gid.');';
               $str.='$attrs = $good_mes_all["attrs"];';
               $str.='foreach($attrs as $k=>$field){';
               $str.= 'if($k<'.$rows.'){ ?>';
               $str.=  $content;
               $str.='<?php } ?>';
               $str.='<?php } ?>';
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
            if(!$tag['cid']){
                return;
            }
            $rows = empty($tag['rows'])? 10 : $tag['rows'];
            if(empty($tag['type'])){
                $type = 0;
            }

            $cid = $tag['cid'];
            $str  = '';
            $str .= '<?php ';
            $str .='$db=M("brand");';
            $str .='$all_cid = check_all_cate('.$cid.');';
            $str .= '$cids =  implode(",",$all_cid);';
            if($type == 1){
            $str .= '$data = $db->where("cid in ($cids) and hot = 1")->select();';
            }else{
            $str .= '$data = $db->where("cid in ($cids)")->select();';
            }
            $str .= 'foreach($data as $k=>$field){';
            $str .= 'if($k<'.$rows.'){ ?>';
            $str .='<?php $field["url"]=U("brand",array(\'bid\'=>$field[\'id\']));?>';
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
      * 读取栏目公共函数
      * @param type $attr
      * @param type $content
      * @return string
      */
     private  function common_cate($attr,$content,$name){
         $tag    = $this->parseXmlAttr($attr,$name);
         $id = empty($tag['cid'])? 'top' : $tag['cid'];
         $str = '';
         $str .= '<?php ';
         $str .= '$db = M("category");';
         if($id == 'top'){
             $str .='$data = $db->where(array("pid"=>0))->select();?>';
         }else{
             $str .='$data = $db->where(array("pid"=>'.$id.'))->select();?>';
         }
         $str.='<?php foreach($data as $field){?>';
         $str.='<?php $field["url"]=U("cate",array(\'id\'=>$field[\'id\']));?>';
         $str.=$content;
         $str.='<?php }; ?>';
         return $str;
     }
}
?>