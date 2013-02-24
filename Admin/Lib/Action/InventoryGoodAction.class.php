<?php
   class InventoryGoodAction extends CommonAction{
         public function index(){
             $arr = get_goods_mes(11);
             p($arr);
             $this->display();
         }
   }
?>