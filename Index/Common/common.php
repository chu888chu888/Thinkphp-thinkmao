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


?>