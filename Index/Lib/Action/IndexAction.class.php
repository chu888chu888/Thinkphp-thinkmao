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
       $all_cid = check_all_cate(15);
       $cids = implode(",",$all_cid);
       $str_cid = "(".$cids.")";
       p($str_cid);
   }
}