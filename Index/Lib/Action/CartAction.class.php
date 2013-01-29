<?php
class CartAction extends Action {
   public function index(){
              $uid = $_SESSION['id'];
              $good_arr = $_SESSION['cart'][$uid];
              $g_arr = array();
              foreach ($good_arr as $value) {
                    $arr = unserialize($value);
                    $data = $this->format_goods_cart($arr);
                    $g_arr[]=$arr;
              }

                            exit();
              $this ->display("../Public/car");
   }
   private function format_goods_cart($arr){
             $data = get_goods_mes($arr['gid']);
             $arr['price'] = $data['price'];
             $arr['mprice']=$data['mprice'];
             $arr['pic']=$data['pic'];
             $arr['brand_name']=$data['brand_name'];
             $db = M('goods_attr');
             $prve_mes = $db->where('id in ('.implode(',', $arr['attr']).')')->select();
             $arr['all_price']=$data['specs'];
            p($arr);
            p(get_goods_mes($arr['gid']));
   }

}