<?php
  class LoginAction extends Action{
      public function index(){
          $this->display("./Public/IndexTpl/login.html");
          $this->display("./Public/IndexTpl/endgoods.html");
      }
      public function login(){
          $uname = $_POST['uname'];
          $pwd = md5($_POST['password']);
          $db = m('user');
          $data = $db->where(array('username'=>$uname))->find();
          if(count($data)){
              if($data['password']==$pwd){
                    @session_start();
                    $_SESSION['id']=$data['id'];
                    echo 1;
              }else{
                  echo 0;
              }
          }else{
              echo 0;
          }

      }
  }

?>