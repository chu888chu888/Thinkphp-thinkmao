<?php
   class GoodsAction extends CommonAction{
       /**
        * 商品列表
        */
       public function goods_list(){
           
       }
       /**
        * 商品添加
        */
       public function good_add(){
           
       }
       /**
        * 商品品牌
        */
       public function good_grand(){
           
       }
       /**
        * 商品分类
        */
       public function goods_cate(){
           
       }
       /**
        * 商品类型
        */
       public function good_type(){
           $db= M('goods_type');
           $good_type=$db->select();
           $this->assign("good_type",$good_type);
           $this->display();
       }
       public function add_good_type_show(){
           $this->display();
       }
       public function add_good_type(){
           $db = M('goods_type');
           $res = $db->data($_POST)->add();
           if($res){
               $this->success('添加成功',U('good_type'));
           }else{
               $this->error('添加失败',U('add_good_type_show'));
           }
       }
       public function edit_good_type_show(){
           $id = $_GET['id'];
           $db = M('goods_type');
           $data = $db->where('id = '.$id)->find();
           $this->assign('good_type_mes', $data);
           $this->display();
       }
       public function edit_good_type(){
           $db = M('goods_type');
           $res = $db->data($_POST)->save();
            if($res){
               $this->success('更新成功',U('good_type'));
           }else{
               $this->error('更新失败',U('edit_good_type_show?id=$_POST["id"]'));
           }
       }
       public function del_good_type(){
           $id = $_GET['id'];
           $db = M('goods_type');
           $res = $db->where('id = '.$id)->delete();
            if($res){
               $this->success('删除成功',U('good_type'));
           }else{
               $this->error('删除失败',U('edit_good_type_show?id=$_POST["id"]'));
           }           
       }
       /**
        * 商品属性
        */
       public function edit_good_attr_show(){
           $id = $_GET['id'];

           $this->assign("id",$id);
           $this->display();
       }
       public function  edit_good_attr(){          
           if(!$_POST['puttype']){
               $_POST['select']=0;
           }
           $tid= $_POST['id'];
            $value = $_POST['select'];          
           $value1 = trim($value);
//           $arr = explode("|", $value1);
            $arr=array(
                'name'=>$_POST['name'],
                'value'=>$value1,
                'type'=>$_POST['type'],
                'tid'=>$tid,
            );           
            $db = M('type_attr');
            $res = $db->data($arr)->add();
            if($res){
               $this->success('添加成功',U('good_type'));///--------------------------------------------------------------
           }else{
               $this->error('添加失败',U('edit_good_attr_show?id=$_POST["id"]'));
           }          
       }
   }

?>