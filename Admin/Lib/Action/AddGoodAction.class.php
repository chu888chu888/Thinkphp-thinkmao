<?php
class AddGoodAction extends CommonAction  {
  public function index(){
     $cate = M('category')->select();
     $cates = recursion($cate);
     $this->assign('cate', $cates);
     $this->display();
  }
}

?>
