<?php
 class ListGoodsAction extends CommonAction{
     public function index(){
         $goods_data = M('goods');
         $goods = $goods_data->select();
         $this->assign("goods",$goods);
         $this->display();
     }
     public function good_show(){
         $gid = $_REQUEST['id'];
         $goods = M('goods');
         $goods_mes = $goods->where(array('id'=>$gid))->select();
         $good_attr = M('goods_attr');
         $attr = $good_attr->where(array('gid'=>$gid))->select();
         $type = D('GtypeView');
         $type_all = $type->select();       
         $gt_all =array();
         foreach ($type_all as $value) {
             foreach ($attr as $k => $v) {
                 if($v['id']==$value['attr_id'] && $value['type']){
                     $value['gid']=$gid;
                     $value['value']=  explode('|', $value['value']);
                     $gt_all[]=$value;
                 }
             }
             
         }

         $this->assign('gid',$gid);
        $this->assign('attr_all',$gt_all);
         $this->display();
     }
 }
?>