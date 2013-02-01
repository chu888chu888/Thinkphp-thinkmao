<?php
  class ListAction extends Action{
      public function index(){
          if(empty($_GET['cid'])){
              redirect(U('Index/index'));
          }else{
          $_SESSION['cid']=$_GET['cid'];
          $c_arr = $this->cates($_GET['cid']);
          $c_arr = array_reverse($c_arr,true);
          $this->assign("c_arr", $c_arr);



          import("ORG.Util.Page");
          $cids = check_cate_hot_goods($_GET['cid']);
          $count = count($cids);
          $page = new Page($count,10);
          $page->setConfig('header', '件商品');
          $page->setConfig('theme', '<ul class="uls"><li class="uppage">%upPage%</li><li class="aa">%linkPage%</li> <li class="totals">共%totalPage%页</li>  </ul>');
          $show =$page->show();
          $this->assign("page",$show);




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