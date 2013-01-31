<?php
/**
 * 得到某个栏目下所有商品品牌id数组
 * @param type $cid
 * @return type 品牌id数组
 */
function cate_good_brand($cid){
    $arrs =array();
    $db =M("goods");
          $arrgood = check_cate_hot_goods($cid);
          foreach ($arrgood as $v) {
                $data = $db->where(array("id"=>$v))->field("bid")->find();
                if(!in_array($data['bid'],$arrs)){
                    $arrs[]=$data['bid'];
                }
          }
  return $arrs;

}

/**
 * 得到栏目下的品牌
 * @param type $arr  栏目数组
 */
  function cate_brand($arr){
      $db = M("brand");
      $data = $db->field("id,cid")->select();
      $brand_arr = array();
      foreach ($data as $value) {
             $brand_arr[$value['id']]=  explode("|", $value['cid']);
      }
      $barr = array();
      foreach ($brand_arr as $k => $v) {
          foreach ($arr as $value) {
                 if(in_array($value, $v) && !in_array($k, $barr)){
                     $barr[] = $k;
                 }
          }
      }
      return $barr;
  }
/**
 * 查找孙子级栏目
 * @param type $cid
 * @return type
 */
function next_cate($cid){
     $db = M('category');
     $data = $db ->where(array('pid'=>$cid))->field("id")->select();
     $arr = array();
     foreach ($data as $v) {
           $arr[] = $v['id'];
     }
     $arrs = array();
     foreach ($arr as $value) {
         $data = $db ->where(array('pid'=>$value))->field("id,name")->select();
         foreach ($data as $v) {
            $mes['id'] = $v['id'];
            $mes['name'] = $v['name'];
           $arrs[] = $mes;
        }
     }
    return $arrs;
}





/**
 * 拆分品牌名称
 * @param type $str
 * @return type
 */
function slice_brand($str){
        $arr = explode("/", $str);
        return $arr[0];
}

/**
 * 获取莫栏目下的所有的类型的筛选属性
 * @param type $cid
 */
function get_all_cid_select($cid){
    $cid_arr =  check_all_cate($cid);
    $cid_str = implode(',', $cid_arr);
     $db = M("category");
     $all_data = $db->where('id in ('.$cid_str.')')->field('tid')->select();
     $tid_arr = array();
     foreach ($all_data as $value) {
          if(!in_array($value['tid'], $tid_arr) && $value['tid']!=0){
              $tid_arr[]=$value['tid'];
          }
     }
     $tid_str = implode(',', $tid_arr);
     $db2 = M('type_attr');
     $data = $db2->where('tid in ('.$tid_str.') and gselect = "1"')->select();
     foreach ($data as $key=>$value) {
                 $data[$key]['value']=  explode('|', $value['value']);
     }
     return $data;
}
/**
 * 格式化相册
 * @param type $arr1
 * @param type $arr2
 * @param type $arr3
 * @return type
 */
function format_gellery($arr1,$arr2,$arr3){
     $num = count($arr1);
     $arrs = array();
     for($i=0;$i<$num;$i++){
         $arr =array();
         $arr['min']=$arr1[$i];
         $arr['mid']=$arr2[$i];
         $arr['max']=$arr3[$i];
         $arrs[]=$arr;
     }
     return $arrs;
}
/**
 * 返回某个栏目下所有子栏目以及本身的所有热卖或推荐商品的id
 * @param type $cid
 * @param type $type
 * @return type
 */
 function check_cate_hot_goods($cid,$type=0){
      $cid_arr =check_all_cate($cid);
      $allarr = array();
      foreach ($cid_arr as $v) {
            $arr =get_all_cate_hg($v,$type);
            foreach ($arr as $value) {
                  if(count($value['id']) && !in_array($value['id'], $allarr)){
                     $allarr[]=$value['id'];
                 }
            }

      }
      return $allarr;
 }
 /**
  * 格式化栏目与商品
  * 将商品的cid字符串格式化为数组
  */
 function format_goods_cid(){
     $db=M('goods');
     $data = $db->field('id,cid')->select();
     $arr =array();
     foreach ($data as $k=>$v) {

           $arr[$v['id']]=  explode('|', $v['cid']);

     }
     return$arr;
 }
 /**
  * 获得该栏目下的热卖商品
  * @param type $cid
  */
 function get_all_cate_hg($cid,$type){
     $all_id = format_goods_cid();
     $gids =array();
     foreach ($all_id as $k => $v){
              if(in_array($cid, $v)){
                 $gids[]=$k;
              }
     }
     $gidsstr = implode(',', $gids);
     $arr =array();
     $db=M('goods');
     if($type){
     $data = $db->where('id in ('.$gidsstr.') and '.$type.' = 1')->field('id')->select();
     }else{
     $data = $db->where('id in ('.$gidsstr.')')->field('id')->select();
     }
     return $data;
 }
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
           check_all_cate($v['id']);
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
             if($k!= 'attr_price' && $k!='attr_id' && $k!='attr_name' && $k!='value' && $k!='type' && $k!='attrid' && $k!='in_id' && $k!='inventory' && $k!='attr_com' && $k!='in_number' && $k!='series' && $k!='in_price'){
                 if($k == 'mini' || $k=='medium' || $k=='max' || $k=='cid'){
                     $data[$k]=  explode('|', $v);
                 }else{
                     $data[$k]=$v;
                 }
             }
         }
         $attrs = array();
         $specs = array();
         foreach ($arr as $key => $value) {
             if($value['type']==0 && count($attrs[$value['attrid']])==0){
               $attr=array();
               $attr['attr_id']=$value['attr_id'];
               $attr['attr_price']=$value['attr_price'];
               $attr['attr_name']=$value['attr_name'];
               $attr['value']=$value['value'];
               $attr['attrid']=$value['attrid'];
               $attr['type']=$value['type'];
               $attrs[$value['attrid']]=$attr;
             }else if($value['type']==1 && count($specs[$value['attrid']])==0){
                 $spec=array();
                 $spec['attr_id']=$value['attr_id'];
                 $spec['attr_price']=$value['attr_price'];
                 $spec['attr_name']=$value['attr_name'];
                 $spec['value']=$value['value'];
                 $spec['attrid']=$value['attrid'];
                 $spec['type']=$value['type'];
                 $specs[$value['attrid']]=$spec;
             }
         }
         $data['attrs']=$attrs;
         $specs = format_arr($specs);
         $data['specs']=$specs;
         $data['inven']=format_inven($arr);
         return $data;
}
/**
 * 格式化库存以及套餐信息
 * @param type $arr
 * @return type
 */
function format_inven($arr){
    $farr = array();
    foreach ($arr as $v) {
           $farr[$v['in_id']]=array();
      }
    foreach ($farr as $key => $value) {
          foreach ($arr as $val) {
              if($val['in_id']==$key && count($value)==0){
                  $farr[$key]['in_id']=$val['in_id'];
                  $farr[$key]['inventory']=$val['inventory'];
                  $farr[$key]['attr_com']=$val['attr_com'];
                  $farr[$key]['in_number']=$val['in_number'];
                  $farr[$key]['series']=$val['series'];
                  $farr[$key]['in_price']=$val['in_price'];
              }
          }
      }
      return $farr;
}
/**
 * 获取总的库存数目
 * @param type $gid
 */
function get_all_number($gid){
     $db = M("goods_list");
     $data = $db->where(array("gid"=>$gid))->field('id,inventory,attr')->select();
     $arrs = array();
     foreach($data as $k=>$v){
         $arr = array();
         $arr['inven']=$v['inventory'];
         $arr['attr']=  explode('|', $v['attr']);
         $arr['attr']= explode(',', $arr['attr'][0]);
         $arr['attr']=$arr['attr'][1];
         $arrs[$arr['attr']]=$arr['inven'];
     }
     $num=0;
     foreach ($arrs as $value) {
          $num+=$value;
     }
     return $num;
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
              if($val['attr_id']==$key && count($farr[$key][$val['attrid']])==0){
                  $farr[$key][$val['attrid']]=$val;
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
//        $date = $db->where(array("gid"=>15))->select();
//       p($date);
//              exit();
       $mes = format_goods($date);
       return $mes;
  }
 function get_spec_name($arr){
         $arrs =array();
      foreach ($arr as $key => $value) {
          $arr =array();
          $arr['attr_id']=$key;
          foreach ($value as $v) {
                 $arr['attr_name']=$v['attr_name'];
                 break;
          }

          $arrs[]=$arr;
     }
       return $arrs;
 }

?>