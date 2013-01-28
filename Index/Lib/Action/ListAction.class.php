<?php
  class ListAction extends Action{
      public function index(){
          $this->display("../Public/top");
          $this ->display("../Public/lg_top");
         $this ->display("../Public/endgoods");
      }
  }

?>