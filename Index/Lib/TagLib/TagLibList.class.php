<?php
import('TagLib');
Class TagLibList extends TagLib {
    protected $tags   =  array(
               // 定义标签
               'cate'=>array('attr'=>'id,row','close'=>1), // input标签

);
     public function _cate($attr,$content){
         $tag    = $this->parseXmlAttr($attr,'cate');
         $id = empty($tag['id'])? 'top' : $tag['id'];
         $str = '';
         if($id == 'top'){
             $db = M('category');
             $data = $db->where(array("pid"=>0))->select();
             
         }
     }
    
    

}
?>