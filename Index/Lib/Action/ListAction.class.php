<?php
  class ListAction extends Action{
      public function index(){
          if(empty($_GET['cid'])){
              redirect(U('Index/index'));
          }else{
          $c_arr = $this->cates($_GET['cid']);
          $c_arr = array_reverse($c_arr,true);
          $this->assign("c_arr", $c_arr);
          $this->display("../Public/top");
          $this ->display("../Public/lg_top");
          $this ->display("../Public/endgoods");
          }
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
      public function select(){
          p($_GET);
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