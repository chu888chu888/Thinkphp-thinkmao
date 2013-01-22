<?php
/*
 * 公共的类
 */
  class CommonAction extends Action{
      /*
       * 验证登陆
       */
      public function _initialize(){
          if(!isset($_SESSION['uid']) || !isset($_SESSION['username'])){
              redirect(U("Login/index"));
          }
      } 
      Public function uploadify () {
		include './Public/Uploadify/uploadify.php';
	}
  }
?>