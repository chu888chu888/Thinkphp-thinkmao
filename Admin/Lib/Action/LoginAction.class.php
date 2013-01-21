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
          $db = M("admin");
          $admin =$db->where(array(lock=>'否',username=>$_POST['username'],password=>md5($_POST['password'])))->select();
          if(count($admin)!=0){
              $this->success("登陆成功");
          }else{
              $this->error('登陆失败');
          }
      }
  }
?>