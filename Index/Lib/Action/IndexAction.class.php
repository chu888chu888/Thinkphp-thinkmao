<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
   public function index(){
              $this ->display("../Public/top");
              $this ->display("../Public/guid");
              $this ->display("../Public/turns");
              $this->display("../Public/goods");
              $this->display("../Public/end");
   }
   public function test(){
    p(get_all_cid_select(15));
   }
}
