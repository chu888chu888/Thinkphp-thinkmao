<?php
       /**
        * 获得所有子栏目的id
        */
   function check_all_cate($cid){
       static $arr = array();
       $arr[] = $cid;
       $db = M('category');
       $data = $db ->where(array('pid'=>$cid))->select();
       if(count($data)){
       foreach($data as $v){
               $arr[] = $v['id'];
          }
          return $arr;
       }else{
           return $arr;
       }
   }
   /**
    * 打印函数
    * @param type $arr
    */
   function p($arr){
       echo "<pre>";
       print_r($arr);
   }

   /**
    * 格式化商品页商品信息
    * @param type $arr
    * @return type
    */
     function format_goods($arr){
         $data = array();
         foreach($arr[0] as $k=>$v){
             if($k!= 'attr_price' && $k!='attr_id' && $k!='attr_name' && $k!='value' && $k!='type' && $k!='attrid'){
                 if($k == 'mini' || $k=='medium' || $k=='max'){
                     $data[$k]=  explode('|', $v);
                 }else{
                     $data[$k]=$v;
                 }
             }
         }
         $attrs = array();
         $specs = array();
         foreach ($arr as $key => $value) {
             if($value['type']==0){
               $attr=array();
               $attr['attr_id']=$value['attr_id'];
               $attr['attr_price']=$value['attr_price'];
               $attr['attr_name']=$value['attr_name'];
               $attr['value']=$value['value'];
               $attr['attrid']=$value['attrid'];
               $attr['type']=$value['type'];
               $attrs[]=$attr;
             }else if($value['type']==1){
                 $spec=array();
                 $spec['attr_id']=$value['attr_id'];
                 $spec['attr_price']=$value['attr_price'];
                 $spec['attr_name']=$value['attr_name'];
                 $spec['value']=$value['value'];
                 $spec['attrid']=$value['attrid'];
                 $spec['type']=$value['type'];
                 $specs[]=$spec;
             }
         }
         $data['attrs']=$attrs;
         $specs = format_arr($specs);
         $data['specs']=$specs;
         return $data;
}
/**
 * 格式化规格的信息
 * @param type $arr
 * @return type
 */
  function format_arr($arr){
      $farr = array();
      foreach ($arr as $v) {
           $farr[$v['attr_id']]=array();
      }
      foreach ($farr as $key => $value) {
          foreach ($arr as $val) {
              if($val['attr_id']==$key){
                  $farr[$key][]=$val;
              }
          }
      }
      return $farr;
  }
 /**
  * 获得商品的信息
  * @param type $gid
  * @return type
  */

  function get_goods_mes($gid){
       $db = D('GoodsView');
       $date = $db->where(array("gid"=>$gid))->select();
       $mes = format_goods($date);
       return $mes;
  }
 function get_spec_name($arr){
         $arrs =array();
      foreach ($arr as $key => $value) {
          $arr =array();
          $arr['attr_id']=$key;
          $arr['attr_name']=$value[0]['attr_name'];
          $arrs[]=$arr;
     }
       return $arrs;
 }

?>