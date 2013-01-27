<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
   public function index(){
       header("Content-type: text/html; charset=utf-8");
       $this->display();
   }
   public function cate(){
      echo $_GET['id'];
   }
   public function brand(){
       echo $_GET['bid'];
   }
   public function test(){
       p(get_goods_mes(10));
//       $arr =  get_goods_mes(10);
//       p(get_spec_name($arr['specs']));
   }
}