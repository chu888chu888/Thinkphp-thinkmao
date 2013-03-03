<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
   public function index(){
              $this ->display("./Public/IndexTpl/top.html");
              $this ->display("./Public/IndexTpl/guid.html");
              $this ->display("./Public/IndexTpl/turns.html");
              $this->display("./Public/IndexTpl/goods.html");
              $this->display("./Public/IndexTpl/end.html");
   }
   public function test(){
       p(get_all_cid_select(10));
   }
}
