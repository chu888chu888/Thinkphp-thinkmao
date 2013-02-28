<?php
   class GoodsAction extends CommonAction{

       /**
        * 商品类型
        */
       public function good_type(){
           $db= M('goods_type');
           import("ORG.Util.Page");
           $count = $db->count();           
           $Page= new Page($count,17);
           $show= $Page->show();
           $this->assign('page',$show);
           $good_type=$db->limit($Page->firstRow.','.$Page->listRows)->select();
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
           import("ORG.Util.Page");
           $count = $db->where(array('tid'=>$id))->count();           
           $Page= new Page($count,17);
           $show= $Page->show();
           $this->assign('page',$show);
           $data = $db->where(array('tid'=>$id))->limit($Page->firstRow.','.$Page->listRows)->select();
           foreach ($data as $key => $value) {
               if($value['value']=='0'){
                   $data[$key]['value']='手工录入';
               }
           }
           $this->assign("data", $data);
           $this->display();
       }
       //修改商品属性显示页面
       public function edit_type_attr_show(){
           $id = $_GET['id'];
           $db = M("type_attr");
           $data = $db->where(array("id"=>$id))->find();
           $this->assign("data",$data);               
           $this->display();     
       }
       //修改商品属性
       public function edit_type_attr(){       
             $data =array();
             $data['id']=$_POST['id'];
             $data['name']=$_POST['name'];
             $data['value']=$_POST['select']?$_POST['select']:0;
             $data['type']=$_POST['type'];
             $data['gselect']=$_POST['gselect'];
             $db = M("type_attr");
             $res = $db->data($data)->save();
             if($res){
              $this->success("属性修改成功",U('good_type'));
             }else{
              $this->success("属性修改失败",U('edit_type_attr_show',array("id"=>$_POST['id'])));
             }            
       }
       //获得套餐属性与套餐id数组；
       private function getinventmes(){
                  $db3 = M("goods_list");
                  $data1 = $db3->field(array("id","attr"))->select();
                  $arr=array();
                  foreach ($data1 as $value) {
                    $arrt=explode("|", $value['attr']);
                    foreach ($arrt as $k => $v) {
                      $tmp=explode(",",$v);                      
                      $arr[$value['id']][]=$tmp['0'];
                    }
                  }
                  return $arr;     
       }
       public function del_type_attr(){
                 $id = $_GET['id'];
                 $db = M("type_attr");
                 $db2 = M("goods_attr");
                 $res1 = $db2->where(array("aid"=>$id))->delete();
                 $data = $db->where(array("id"=>$id))->find();
                 $res = $db->where(array("id"=>$id))->delete();
                 if($data['type']==0){
                    if($res1 && $res){
                      echo 1;
                    }else{
                      echo 0;
                    }
                 }else{
                  $result =array();
                  $db = M("goods_list");
                  $arr = $this->getinventmes();
                  foreach ($arr as $key => $value) {
                    if(in_array($id,$value)){
                      $tmp = $db->where(array("id"=>$key))->delete();
                      $result[] = $tmp;
                    }
                    if(!in_array(false, $result) && $res1 && $res){
                      echo 1;
                    }else{
                      echo 0;
                    }
                  }
                 }
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
           $dbs = M('goods_type');
           $data = $dbs->select();
           $this->assign('data',$data);
           $db = M('category');
           $cateall = $db->where("id != ".$_GET['id'])->select();
           $cateall = recursion($cateall);
           $this->assign("cateall",$cateall);
           $cate = $db->where(array('id' =>$_GET['id']))->find();
           $tid = $cate['tid'];
           $mes =$dbs->where(array('id' =>$tid))->find();
           $this->assign("mes", $mes);
           $pcate = $db->where(array('id' =>$cate['pid']))->find();
           $this->assign("pcate", $pcate);
           $this->assign("cate",$cate);
           $this->display();
       }

   }

?>