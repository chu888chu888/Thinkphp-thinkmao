<?php
   class GoodsAction extends CommonAction{
      
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
       public function good_attr_list(){
           $id = $_GET['id'];
           $this->assign("id", $id);
           $db = M('type_attr');
           $data = $db->where(array('tid'=>$id))->select();
           foreach ($data as $key => $value) {
               if($value['value']=='0'){
                   $data[$key]['value']='手工录入';
               }
           }          
           $this->assign("data", $data);
           $this->display();
       }
       public function edit_type_attr_show(){
           
       }
       public function del_type_attr(){
           
       }
       
       
       
       /**
        * 栏目
        */
       public function cate(){
                          $category = M('category')->select();
		$cate = recursion($category);
                          $this->assign('cate', $cate);
		$this->display();                    
       }
       public function add_top_cate_show(){
           $pid = $_REQUEST['pid'];
           $this->assign("pid",$pid);
           $db = M('goods_type');
           $data = $db->select();
           $this->assign('data',$data);
           $this->display();
       }
       public function add_cate(){
           $db = M('category');
           $res = $db->data($_POST)->add();
            if($res){
               $this->success('添加成功',U('cate'));///--------------------------------------------------------------
               }else{
               $this->error('添加失败',U('add_top_cate_show?id=$_POST["pid"]'));
             }          
       }
       public function del_cate(){
           $db = M('category');
           $arr = $db->where(array('pid' =>$_GET['id']))->select();
           if(count($arr)){
               $this->error('该栏目有子级栏目无法删除',U('cate'));
           }else{
               $res = $db->where(array('id'=>$_GET['id']))->delete();
                if($res){
               $this->success('删除成功',U('cate'));///--------------------------------------------------------------
               }else{
               $this->error('删除失败',U('cate'));
             }          
           }
       }
       public function mod_cate_c(){
            $db = M('category');          
           $res = $db->data($_POST)->save();         
            if($res){
               $this->success('更改成功',U('cate'));///--------------------------------------------------------------
               }else{
               $this->error('更改失败或未修改',U('cate'));
             }          
       }
       public function mod_cate(){
           $db = M('goods_type');
           $data = $db->select();
           $this->assign('data',$data);
           $db = M('category');
           $cate = $db->where(array('id' =>$_GET['id']))->find();
           $this->assign("cate",$cate);
           $this->display();
       }
       
   }

?>