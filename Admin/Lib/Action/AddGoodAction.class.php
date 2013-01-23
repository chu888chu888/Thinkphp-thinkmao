<?php
class AddGoodAction extends CommonAction  {
  public function index(){
     $cate = M('category')->select();
     $cates = recursion($cate);
     $this->assign('cate', $cates);
     $gtype = M('goods_type')->select();
     $this->assign('goods_type', $gtype);
     $this->display();
  }
  
  /**
   * 获得包括该栏目以上的所有栏目下的品牌
   * 
   */
  public function brands(){     
     $cid = (int)$_POST['cid'];
     $pcids = $this->get_parents_cid($cid);
     $brands_arr = $this->get_brands($pcids);
     echo json_encode($brands_arr);
  }
  /**
   * 得到所有父级栏目的cid
   * @staticvar array $cid_arr
   * @param type $cid
   * @return array
   */
  private function get_parents_cid($cid){
      static $cid_arr = array();      
      $cate = M('category');
      $cids = $cate->where('id = '.$cid)->field('id,pid')->find();
      if(!$cids){
          return false;
      }
      if($cids['pid']){
          $cid_arr[]=$cids[id];
          $this->get_parents_cid($cids['pid']);
      }
      return $cid_arr;
          
     }
     
     /**
      * 循环便历得到栏目下的品牌
      * @param type $cate_arr
      * @return type array
      */
   private  function get_brands($cate_arr){      
         $brands = M('brand');
         $allbrands = $brands->select();
         $se_arr = array();
         foreach ($allbrands as $key => $value) {
             foreach ($cate_arr as $v) {
                 if($v==$value['cid']){
                     $se_arr[]=$allbrands[$key];
                 }else{
                     continue;
                 }
             }
         }
         return $se_arr;
     }
     
     /**
      * 
      * 返回post过来的类型的属性值
      */
     public function attr(){
         $tid = $_POST['id'];
         $attr = M('type_attr');
         $attr_arr = array();
         $data = $attr->where("tid = ".$tid)->select();
         echo json_encode($data);
     }
  
}

?>
