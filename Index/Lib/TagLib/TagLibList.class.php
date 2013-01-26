<?php
import('TagLib');
Class TagLibList extends TagLib {
    protected $tags   =  array(
               // 定义标签
               'cate1'=>array('attr'=>'cid,row','close'=>1,"level"=>1),
               'cate2'=>array('attr'=>'cd,row','close'=>1,"level"=>2),
               'cate3'=>array('attr'=>'cid,row','close'=>1,"level"=>3),
               'brand'=>array('attr'=>'cid,row,type','close'=>1,"level"=>1),

);
    /**
     * 读取栏目下的品牌
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
     public function _cate1($attr,$content){
              return $this->common_cate($attr, $content);
     }
     public function _cate2($attr,$content){
              return $this->common_cate($attr, $content);
     }
     public function _cate3($attr,$content){
              return $this->common_cate($attr, $content);
     }
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