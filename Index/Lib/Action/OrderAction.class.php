<?php
  class OrderAction extends Action{
      public function index(){
              $this->address();
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
          $this->display("../Public/pay_top");
          $this->display("../Public/pay_start");
          $this->display("../Public/end");
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
         }

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


  public function get_total(){
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
              return $p_all;
  }

  public function add_address(){
      if(is_null($_SESSION['uid'])){
          redirect(U('Login/index'));
      }else{
       $arr=array(
             "nation"=>$_POST['nation'],
             "city"=>$_POST['city'],
             "mmes"=>$_POST['mmes'],
      );
      $_POST['address'] = serialize($arr);
      $_POST['time']=time();
      $_POST['status']=1;
      $_POST['total']=$this->get_total();
      $_POST['uid']=$_SESSION['uid'];
      $db = M("order");
      $res = $db->data($_POST)->add();
      if($res){
          redirect(U('index'));
      }else{
          echo "地址添加失败";
          sleep(3);
           redirect(U('index'));
      }
      }
  }
/**
 * 获得用户地址信息
 */
  public function address(){
     if(empty($_SESSION['uid'])){
          redirect(U('Login/index'));
      }else{
           $uid = $_SESSION['uid'];
           $db = M('order');
           $data_arr = $db->where(array("uid"=>$uid))->select();
           foreach ($data_arr as $key=>$v){
                  $arr=unserialize($v['address']);
                  $data_arr[$key]['nation']=$arr['nation'];
                  $data_arr[$key]['city']=$arr['city'];
                  $data_arr[$key]['mmes']=$arr['mmes'];
           }

           $this->assign("address",$data_arr);
      }

  }

   public function put_order(){
       $oid = $_POST['oid'];
       $uid = $_SESSION['id'];
              $good_arr = $_SESSION['cart'][$uid];
              $g_arr = array();
              foreach ($good_arr as $value) {
                    $arr = unserialize($value);
                    $data = $this->format_goods_cart($arr);
                    $g_arr[]=$data;
              }
         $quantity = count($g_arr);
         $subtotal = $this->get_total();
         $str = '';
         foreach ($g_arr as $value) {
              $str.=$value['gid']+'|';
         }
        $gid = rtrim($str, '|');
        $data = array(
            "oid"=>$oid,
            "quantity"=>$quantity,
            "subtotal"=>$subtotal,
            "gid"=>$gid
        );
        $db=M('order_list');
        $res = $db->data($data)->add();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
   }


  }

?>