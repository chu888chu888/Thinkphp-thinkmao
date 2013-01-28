<?php
  class LoginAction extends Action{
      public function index(){
          $this->display("../Public/login");
          $this->display("../Public/endgoods");
      }
  }

?>