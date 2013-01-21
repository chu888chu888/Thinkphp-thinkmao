<?php
  class LoginAction extends Action{
      public function index(){
          $this->display();
      }
      public function code(){
          import('ORG.Util.Image');
          Image::buildImageVerify();
      }
      public function login(){
          P($_POST);
      }
  }
?>