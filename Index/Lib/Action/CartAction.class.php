<?php
class CartAction extends Action {
   public function index(){
              $uid = $_SESSION['id'];
              $good_arr = $_SESSION['cart'][$uid];
              $g_arr = array();
              foreach ($good_arr as $value) {
                    $arr = unserialize($value);
                    $data = $this->format_goods_cart($arr);
                    $g_arr[]=$data;
              }

              $p_all = 0;
              foreach ($g_arr as $value) {
                  $p_all+=$value['all_price'];
              }
              $this->assign("p_all", $p_all);
              $goods_number = count($g_arr);
              $this->assign("goods_number",$goods_number);
              $this->assign('mes', $g_arr);
              $this ->display("./Public/IndexTpl/car.html");
   }
   /**
    * 格式化购物车商品信息
    * @param type $arr
    * @return type
    */
   private function format_goods_cart($arr){
             $data = get_goods_mes($arr['gid']);
             $arr['gname'] = $data['gname'];
             $arr['price'] = $data['price'];
             $arr['mprice']=$data['mprice'];
             $arr['lprice']=$data['mprice']-$data['price'];
             $arr['unit']=$data['unit'];
             $arr['pic']=$data['pic'];
             $arr['brand_name']=$data['brand_name'];
             $db = M('goods_attr');
             $prve_mes = $db->where('id in ('.implode(',', $arr['attr']).')')->select();
             $arr['all_prve']=$prve_mes;
            $pr = 0;
             foreach ($arr['all_prve'] as $key=>$value) {
                       $arr['all_prve'][$key]['aname']=$data['specs'][$value['aid']][$value['id']]['attr_name'];
                       $pr+=(int)$value['price'];
             }
             $pr = $pr*$arr['num']+$data['price'];
             $arr['all_price']=$pr;
             return $arr;
   }




   public function add(){
         $gid = $_GET['gid'];
         $uid = $_SESSION['id'];

         foreach ($_SESSION['cart'][$uid] as $key => $value) {
                      $value=  unserialize($value);
                      if($value['gid']==$gid){
                          if($value['num']>0){
                              $value['num']=$value['num']+1;
                          }
                      }
                     $_SESSION['cart'][$uid][$key]=  serialize($value);
//                     $_SESSION['cart'][$uid][$key]=  $value;
         }
//          p($_SESSION);
//          exit();
         redirect(U('index'));

   }


   public function less(){
         $gid = $_GET['gid'];
         $uid = $_SESSION['id'];
         foreach ($_SESSION['cart'][$uid] as $key => $value) {
                      $value=  unserialize($value);
                      if($value['gid']==$gid){
                          if($value['num']>1){
                              $value['num']=$value['num']-1;
                          }
                      }
                     $_SESSION['cart'][$uid][$key]=  serialize($value);
         }

         redirect(U('index'));
   }


  public function del(){
         $gid = $_GET['gid'];
         $uid = $_SESSION['id'];
         foreach ($_SESSION['cart'][$uid] as $key => $value) {
                      $value=  unserialize($value);
                      if($value['gid']==$gid){
                          unset($_SESSION['cart'][$uid][$key]);
                      }else{
                     $_SESSION['cart'][$uid][$key]=  serialize($value);
                      }
         }

         redirect(U('index'));
  }


  function test(){

//             $aa = check_cate_hot_goods(51);
//             p($aa);
      $aas = M("goods_attr");
      $dt = $aas->where(array("id"=>545))->find();
      p($dt['value']);

      $db = M("type_attr");
      $da = $db->where(array("id"=>22))->find();
      $aa = explode("|", $da['value']);
      p($aa['0']);
      if($dt['value']==$aa['0']){
          echo 123;
      }


  }


}