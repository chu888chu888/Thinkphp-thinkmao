<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
   public function index(){
       $this->display();
   }
   public function welcome(){
       $ip = get_client_ip(1);
       $this->assign("ip", $ip);     
       $this->display();
   }
   Public function loginOut () {
		session_unset();
		session_destroy();
		redirect('Login/index');
	}
}