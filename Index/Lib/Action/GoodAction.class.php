<?php
  class GoodAction extends Action{
      public function index(){
          $this->display("../Public/top");
          $this->display("../Public/test_good_guid");
      }
  }

?>