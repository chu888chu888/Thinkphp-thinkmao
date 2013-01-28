<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
   public function index(){
              $this ->display("../Public/top");
              $this ->display("../Public/guid");
              $this ->display("../Public/turns");
              $this->display("../Public/goods");
              $this->display("../Public/end");
   }
   public function cate(){
      echo $_GET['id'];
   }
   public function brand(){
       echo $_GET['bid'];
   }
   public function test(){
//       p(get_goods_mes(10));
//       $db = M("goods");
//       $data = $db->where(array("id"=>10))->select();
//       p($data);
//       foreach($data as $k=>$field){
//           echo ($field['name']);
//       }
//       p($data);
//       $arr =  get_goods_mes(10);
//       p(get_spec_name($arr['specs']));
//       $good_mes_all = get_goods_mes(10);
//       $mini = $good_mes_all["mini"];
//       $medium = $good_mes_all["medium"];
//       $max = $good_mes_all["max"];
//       $img["mini"]=$mini;
//       $img["medium"]=$medium;
//       $img["max"]=$max;
//       foreach($img[middle] as $key=>$field){if($key<3){
//           echo ($field);
//       }
//   }

//
//       $cids = check_cate_hot_goods(15,"hot");foreach($cids as $k=>$field){if($k<10){
//
//
//         echo ($field)."<br/>";
//
//
//
//
//       }
//
//       }
//       p(check_all_cate("14"));

//       $daat = check_cate_hot_goods('14');
//       echo $daat;
//          p($daat);
//       p(get_all_cate_hg('15'));
//         p(format_goods_cid());
//        p(check_cate_hot_goods(14));
//       p(get_goods_mes(12));
//       p($_SERVER);
//        $good_mes_all = get_goods_mes(10);
//        $specs = $good_mes_all["specs"];
//        p($specs);
//        $specsx = get_spec_name($specs);
//        p($specsx);
//        p(get_goods_mes(10));
//       $good_mes_all = get_goods_mes(11);
//       p($good_mes_all['specs']['37']);
//       $specs = $good_mes_all["specs"][$field['attr_id']];
//       p($specs);
//       foreach($specs as $k=>$field){if($k<40){
//
//
//
//
//       }
                                $good_mes_all = get_goods_mes(11);
                                $specs = $good_mes_all["specs"];
                                $specsx = get_spec_name($specs);
                                foreach($specsx as $k=>$field){
                                    if($k<20){
                                                 echo ($field['attr_name']);

                                              $good_mes_all = get_goods_mes(11);
                                              $specs = $good_mes_all["specs"][$field['attr_id']];
//                                              p($specs[$field['attr_id']]);
//                                              p($specs);
//                                              $specs = $specs[$field['attr_id']];
                                              foreach($specs as $k=>$field){
                                                  p($field);
//                                                  p($field);
//                                                   echo ($field['value']);
                                                  }
                                    }
                                    }


   }
}
