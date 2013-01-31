<?php
  class OrderAction extends Action{
      public function index(){
          $db = M("OrderList");
          $data = $db->select();
          $db1 = M("Order");

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
           $db=M('order_list');
           $data = array(
               "id"=>$id,
               "status"=>2,
           );
           $db->data($data)->save();
           redirect(U('index'));
      }

  }
?>