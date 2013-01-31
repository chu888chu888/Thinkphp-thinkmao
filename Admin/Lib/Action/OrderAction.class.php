<?php
  class OrderAction extends Action{
      public function index(){
          $db = M("OrderList");
          $data = $db->select();
          $db1 = M("Order");
          foreach ($data as $key => $value) {
                      $oid = $value['oid'];
                      $mes = $db1->where(array("id"=>$oid))->find();
                      $data[$key]['status']=$mes['status'];
          }
          $this->assign("mes", $data);
          $this->display();
      }
      public function mod_remark(){
          $db=M('order_list');
          $db->data($_POST)->save();

      }
      public function del_order(){
          $id = $_GET['id'];
          $db=M('order_list');
          $db->data($_POST)->delete();
          redirect(U('index'));
      }
      public function pass(){
           $id = $_GET['id'];
           $db=M('order_list');
           $mes = $db->where(array("id"=>$id))->find();
           $oid =$mes['oid'];
           $data = array(
               "id"=>$oid,
               "status"=>2,
           );
           $db2 = M('order');
           $db2->data($data)->save();
           redirect(U('index'));
      }

  }
?>