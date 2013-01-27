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

);
    /**
     * 获取规格的id与name
     * @param type $attr
     * @param type $content
     * @return string
     */
    public function _specname($attr,$content){
         $tag = $this->parseXmlAttr($attr,'cate');
         if(!$tag['gid']){
                return;
         }
         $rows = empty($tag['rows'])? 20 : $tag['rows'];
               $gid = $tag['gid'];
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
    public function _specvalue($attr,$content){
         $tag = $this->parseXmlAttr($attr,'cate');
         if(!$tag['aid']){
                return;
         }
         if(!$tag['gid']){
                return;
         }
         $rows = empty($tag['rows'])? 40 : $tag['rows'];
               $aid = $tag['aid'];
               $gid = $tag['gid'];
               $str='';
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
              $tag = $this->parseXmlAttr($attr,'cate');
              if(!$tag['gid']){
                return;
               }
               $rows = empty($tag['rows'])? 200 : $tag['rows'];
               $gid = $tag['gid'];
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
     * @param type $attr
     * @param type $content
     * @return string
     */
     public function _brand($attr,$content){
            $tag = $this->parseXmlAttr($attr,'cate');
            if(!$tag['cid']){
                return;
            }
            $rows = empty($tag['rows'])? 10 : $tag['rows'];
            if(empty($tag['type'])){
                $type = 0;
            }

            $cid = $tag['cid'];
            $str = '';
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
              return $this->common_cate($attr, $content);
     }
     /**
      * 读取二级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate2($attr,$content){
              return $this->common_cate($attr, $content);
     }
     /**
      * 读取三级栏目
      * @param type $attr
      * @param type $content
      * @return type
      */
     public function _cate3($attr,$content){
              return $this->common_cate($attr, $content);
     }
     /**
      * 读取栏目公共函数
      * @param type $attr
      * @param type $content
      * @return string
      */
     private  function common_cate($attr,$content){
         $tag    = $this->parseXmlAttr($attr,'cate');
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