<?php
  class SelectAction extends Action{
         public function index(){
          if(!empty($_GET['bid'])){
                 $bid = $_GET['bid'];
                 $cid = $_SESSION['cid'];
                 $goods = check_cate_hot_goods($cid);
                 $db = M("goods");
                 $mes_goods = $db->where(array("bid"=>$bid))->field("id")->select();
                 $gid_arr =array();
                 foreach ($mes_goods as $v) {
                       if(!in_array($v, $goods)){
                           $gid_arr[]=$v['id'];
                       }
                 }
             }else if(!empty($_GET['aid']) && !empty($_GET['num'])){
                 $cid = $_SESSION['cid'];
                 $aid = $_GET['aid'];
                 $num = $_GET['num'];
                 $gid_arr = $this->get_gid_arr($aid,$num,$cid);
             }
          $good_str = implode(",", $gid_arr);
          $this->assign("cid", $_SESSION['cid']);
          $this->assign("gid_str", $good_str);
          $c_arr = $this->cates($_SESSION['cid']);
          $c_arr = array_reverse($c_arr,true);
          $this->assign("c_arr", $c_arr);
          $this->display("../Public/top");
          $this ->display("../Public/lg_top_1");
          $this ->display("../Public/endgoods");
         }

/**
 * 属性筛选器
 * @param type $aid
 * @param type $num
 * @param type $cid
 * @return type
 */
         private function get_gid_arr($aid,$num,$cid){
             $gid_arr = check_cate_hot_goods($cid);
             $db1 = M("type_attr");
             $mes = $db1->where(array("id"=>$aid))->find();
             $mxs = explode("|", $mes['value']);
             $mxs = $mxs[$num];
             $arrs = array();
             $db = M("goods_attr");
             $data = $db->where(array("aid"=>$aid,"value"=>$mxs))->select();
             foreach ($data as $value) {
                    $arrs[]=$value['gid'];
             }
            return $arrs;
         }






              /**
       * 得到所有的父级栏目的名称数组
       * @staticvar array $arr
       * @param type $cid
       * @return type
       */
      private function cates($cid){
              static $arr =array();
              $db = M('category');
              $data = $db->where(array('id'=>$cid))->find();
              $arr[$data['id']]=$data['name'];
              $pid = $data['pid'];
              if($pid!=0){
               $this->cates($pid);
              }
              $arr = array_reverse($arr,true);
              return $arr;

      }

      public function get_middle(){
          $gid = $_POST['gid'];
          $num = $_POST['num'];
          $data = get_goods_mes($gid);
          $mid_url = $data['medium'][$num];
//          p($mid_url);
          echo json_encode($mid_url);
      }
  }

?>