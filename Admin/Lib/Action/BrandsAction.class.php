<?php
class BrandsAction extends CommonAction {
   public function index(){
       $brands = M('Brand')->select();
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
      $_POST['cid']=  implode($_POST['cid'], "|");
      $res = $db->data($_POST)->add();
       if($res){
               $this->success('添加成功',U('index'));
           }else{
               $this->error('添加失败',U('add_brand_show'));
           }

  }
  public function edit_brand_show(){
      $dbs = M('category');
      $category = $dbs->select();
      $category = recursion($category);
      $this->assign('category',$category);
      $id = $_GET['id'];
      $db = M('brand');
      $data = $db->where(array("id"=>$id))->find();
      $data['cid']=  explode("|", $data['cid']);
      $this->assign("mes", $data);
      $this->assign("id", $id);
      $this->display();

  }
  public function edit_brand(){
      $db = M('brand');
      if(empty($_POST['logo'])){
          unset($_POST['logo']);
      }
      $_POST['cid']=  implode($_POST['cid'], "|");
        $res = $db->data($_POST)->save();
       if($res){
               $this->success('修改成功',U('index'));
           }else{
               $this->error('修改失败',U('edit_brand_show?id='.$_POST['id'].''));
           }
  }
}