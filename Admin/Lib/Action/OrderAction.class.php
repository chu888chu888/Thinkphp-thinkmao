<?php
  class OrderAction extends Action{
      public function index(){
           $db = M("OrderList");
           import("ORG.Util.Page");
           $count = $db->count();
           $Page= new Page($count,11);
           $show= $Page->show();
           $this->assign('page',$show);
           $data = $db->limit($Page->firstRow.','.$Page->listRows)->select();
           $this->assign("mes", $data);
           $this->display();
      }
      public function mod_remark(){
          $db=M('order_list');
          p($_POST);
          $db->data($_POST)->save();

      }
      public function del_order(){
          $db=M('order_list');
          $db->data($_GET)->delete();
          redirect(U('index'));
      }
      public function pass(){
           $id = $_GET['id'];
           $status = $_GET['status'];
           $db=M('order_list');
           $data = array(
               "id"=>$id,
               "status"=>$status,
           );
           $db->data($data)->save();
           redirect(U('index'));
      }
      public function step1(){
          $db = M("OrderList");
          import("ORG.Util.Page");
           $count = $db->where(array("status"=>2))->count();
           $Page= new Page($count,11);
           $show= $Page->show();
           $this->assign('page',$show);
          $data = $db->where(array("status"=>2))->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign("mes", $data);
          $this->display();
      }
      public function step2(){
          $db = M("OrderList");
           import("ORG.Util.Page");
           $count = $db->where(array("status"=>3))->count();
           $Page= new Page($count,11);
           $show= $Page->show();
           $this->assign('page',$show);
          $data = $db->where(array("status"=>3))->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign("mes", $data);
          $this->display();
      }
      public function step3(){
          $db = M("OrderList");
           import("ORG.Util.Page");
           $count = $db->where(array("status"=>4))->count();
           $Page= new Page($count,11);
           $show= $Page->show();
           $this->assign('page',$show);
          $data = $db->where(array("status"=>4))->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign("mes", $data);
          $this->display();
      }

  }
?>