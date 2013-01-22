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
          $admin =$db->where(array(lock=>'否',username=>$_POST['username'],password=>md5($_POST['password'])))->find();
          if(count($admin)!=0){            
            if($_SESSION['verify']==md5($_POST['verify'])){
                session('uid', $admin['id']);
                session('username', $admin['username']);
                redirect(U('Index/index'));
            }else{
                $this->error('验证码错误',U("index"));
            }
          }else{
              $this->error('查询无此管理员用户',U("index"));
          }
      }
  }
?>