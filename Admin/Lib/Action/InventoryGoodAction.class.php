<?php
   class InventoryGoodAction extends CommonAction{
         public function index(){
         	 $db = M("goods");
             import("ORG.Util.Page");
             $count = $db->count();
             $Page= new Page($count,10);
             $show= $Page->show();
             $this->assign('page',$show);
         	 $data = $db->field("id")->limit($Page->firstRow.','.$Page->listRows)->select();
         	 $arr = array();
         	 foreach ($data as $v) {
         	 	$tmparr = get_goods_mes($v['id']);
         	 	$arr[$v['id']]= $tmparr;
                $invent = 0;
         	 	foreach ($tmparr['inven'] as $value) {
         	 		$invent += $value['inventory'];
         	 	}
         	 }
             $arr[$v['id']]['inventnum'] = $invent;           
             $this->assign("goods_mes",$arr);                                   
             $this->display();
         }
         public function invent(){
             $this->gs();
             $db = M ('goods_list');
             $gid = $_REQUEST['id'];
             $data = $db->where('gid = '.$gid)->select();
             foreach ($data as $key=>$value) {
                 $data[$key]['attr'] = explode("|", $value['attr']);
                 foreach ($data[$key]['attr'] as $k=> $v) {
                     $data[$key]['attr'][$k]=  explode(',', $v);
                 }
             }
             $this->assign('data',$data);
             $this->display();
         }
          private function gs(){
                 $gid = $_GET['id'];
                 $goods = M('goods');
                 $goods_mes = $goods->where(array('id'=>$gid))->select();
                 $this->assign("goods_mes", $goods_mes);


                 $good_attr = M('goods_attr');
                 $attr = $good_attr->where(array('gid'=>$gid))->group('aid')->field('aid')->select();
                 $data =$good_attr->where(array('gid'=>$gid))->select();

                 $type = M('type_attr');
                 $type_all = $type->select();

                 $gt_all =array();
                 foreach ($type_all as $value) {
                     foreach ($attr as $v) {
                         if($v['aid']==$value['id'] && $value['type']!=0 ){
                             $value['gid']=$gid;
        //                     $value['value']=  explode('|', $value['value']);
                             $tmp =array();
                            foreach ($data as $val){
                                   if($value['id']==$val['aid']){
                                       $tmp[$val['id']]=$val['value'];
        //                               echo $val['id']."<br/>";
        //                               echo $val['value']."<br/>";
                                   }
                            }
                            $value['value']=$tmp;
                             $gt_all[]=$value;
                         }
                     }

                 }
                 $this->assign('gid',$gid);
                 $this->assign('attr_all',$gt_all);
        //         p($gt_all);
           }
   }
?>