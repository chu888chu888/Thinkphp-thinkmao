<?php
class BrandsAction extends CommonAction {
   public function index(){
       $brands = D('BrandView')->select();      
       $this->assign('brands',$brands);
       $this->display();
   }
  public function add_brand_show(){      
      $db = M('category');
      $category = $db->select();
      $category = recursion($category);
      $this->assign('category',$category);     
      $this->display();
  }
  public function add_brand(){
      $db = M('brand');
      $res = $db->data($_POST)->add();
       if($res){
               $this->success('添加成功',U('index'));
           }else{
               $this->error('添加失败',U('add_brand_show'));
           }
      
  }
}