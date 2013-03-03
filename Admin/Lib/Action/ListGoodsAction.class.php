<?php
 class ListGoodsAction extends CommonAction{
     public function index(){
         $goods_data = M('goods');
         import("ORG.Util.Page");
         $count = $goods_data->count();
         $Page= new Page($count,10);
         $show= $Page->show();
         $this->assign('page',$show);
         $goods = $goods_data->limit($Page->firstRow.','.$Page->listRows)->select();
         foreach ($goods as $k=>$v){
             $goods[$k]['pic_thumb']=thumb_admin($v['pic'],"100","100");
         }
         $this->assign("goods",$goods);
         $this->display();
     }
     /**
      *
      * 将商品的规格分配到模版中
      */
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
     //商品修改模板显示
     public function viewedite(){
        $id = $_GET["id"];            
        $mes = get_goods_mes($id);
        $this->assign("allmes",$mes);
        $this->display();
     }
     //商品修改
     public function good_modify(){
         $cid_arr = $_POST['cid'];
         $cid_str = '';
         foreach ($cid_arr as $key => $value) {
             $cid_str .= $value.'|';
         }
         $cid_str = rtrim($cid_str, '|');
         $data = array(
             'name'=>$_POST['name'],
             'unit'=>$_POST['unit'],
             'number'=>$_POST['number'],
             'price'=>(float)$_POST['price'],
             'pic'=>$_POST['pic'],
             'click'=>(int)$_POST['click'],
             'recommend'=>isset($_POST['recommend']) ? 1 : 0,
             'hot'=>isset ($_POST['hot']) ? 1 :0,
             'time'=>$_SERVER['REQUEST_TIME'],
             'cid'=>$cid_str,
             'bid'=>$_POST['bid'],
              'tid'=>$_POST['tid'],
              'aid'=>$_SESSION['uid'],
             'mprice'=>$_POST['mprice'],
             'goods_intro'=>array(
                'mini' => implode('|', $_POST['img'][2]),
                'medium' => implode('|', $_POST['img'][1]),
                'max' => implode('|', $_POST['img'][0]),
                'intro' => $_POST['intro'],
                'service' => $_POST['service']
             )
         );
         $attr = array();
         /**
          * 组合属性
          */
         if(isset($_POST['attr'])){
         foreach ($_POST['attr'] as $key => $value) {
             if(empty($_POST['attr'][$key]))
                                  continue;
             $attr[]=array(
                 'aid'=>$key,
                 'value'=>$value
                );
            }
         }
         /**
          * 组合规格
          */
         if(isset($_POST['spec'])){
             foreach ($_POST['spec'] as $key => $v) {
                 for($i=0;$i<count($v["value"]);$i++){
                     if(empty($v['value'][$i])){
                         continue;
                     }
                     $attr[] = array(
                         'value'=>$v['value'][$i],
                         'price'=>(float)$v['price'][$i],
                         'aid'=>(int)$key
                     );
                 }
             }
         }
         $data['goods_attr']=$attr;

      if (D('GoodsRelation')->modify($data)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败 请重试');
		}
     }

     /**
      * 首次添加商品库存
      */
     public function good_show(){
         $this->gs();
         $this->display();
     }
     /**
      * 插入库存数据
      */
     public function put_number(){
         $data =$_POST;
         /**
          * $key为商品的id
          * $value为id的属性库存集和
          */
         foreach ($data as $key => $value) {
             $gid = $key;
             $arr_all = $this->arr($value,$gid);
               foreach ($arr_all as $value) {
             $db = M('goods_list');
             $res = $db->data($value)->add();
             if(!$res){
                 $this->error('操作失败',U('index'));
             }
         }
         $this->success('操作成功',U('index'));

         }
     }

     /**
      * 格式化成可插入数据表的数据
      * @param type $arr
      * @param type $gid
      * @return type  $arr
      */
     private function arr ($arr,$gid){
         $arr1 = array();
         foreach ($arr as $key => $value) {
             if(is_numeric($key)){
                 $arr1[$key]=$value;
             }
         }
         foreach ($arr1 as $k2 => $v2) {
             $num = count($v2);
             break;
         }
         $arr_all=array();
         $arre =array();
         for($i=0;$i<$num;$i++){
              $str = '';
             foreach ($arr1 as $k => $v) {
                 $str .= $k.','.$v[$i].'|';
             }
             $arre['inventory'] = $arr['number'][$i];
             $arre['number']=$arr['num'][$i];
             $arre['series']=$arr['series'][$i];
             $arre['price']=$arr['price'][$i];
             $arre['attr']= $str;
             $arre['attr']=  rtrim($arre['attr'],'|');
             $arre['gid']=$gid;
             $arr_all[]=$arre;
         }
       return $arr_all;
     }



     public function good_attr_edit_show(){
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
     /**
      * 插入更改的数据
      */

     public function attr_modify(){
         foreach ($_POST as $gid => $arrs) {
             $db = M('goods_list');
             $data = $db->where(array("gid"=>$gid))->select();
             if(count($data)){
                 $res = $db->where(array("gid"=>$gid))->delete();
                 if($res){
                     $arr = $this->arr($arrs,$gid);
//                     p($arr);exit();
                     $this->put_data_in($arr,$gid);
                 }else{
                     $this->error('操作失败',U("good_attr_edit_show?id=$gid"));
                 }
             }else{
                  $arr = $this->arr($arrs,$gid);
                  $this->put_data_in($arr,$gid);
             }
         }
     }

     private function put_data_in($arr,$gid){
         $db = M('goods_list');
          foreach ($arr as $mes) {

                         $ress = $db->data($mes)->add();
                         if(!$ress){
                             $this->error('操作失败',U("good_attr_edit_show?id=$gid"));
                         }
                     }
           $this->success('操作成功',U("good_attr_edit_show?id=$gid"));
     }
     /**
      * 删除商品
      */
     public function good_del(){         
         $id = $_GET['id'];
         $imglist = M('goods');
         $datalist = $imglist->where(array('id'=>$id))->find();
         unlink($_SERVER['DOCUMENT_ROOT'].$datalist['pic']);
         $img = M('goods_intro');
         $data = $img->where(array('id'=>$id))->find();
         foreach ($data as $key => $value) {
             switch ($key) {
                 case 'mini':
                     unlink($_SERVER['DOCUMENT_ROOT'].$value);
                 case 'medium':
                     unlink($_SERVER['DOCUMENT_ROOT'].$value);
                 case 'max':
                    unlink($_SERVER['DOCUMENT_ROOT'].$value);
             }
         }
         $db = D('GoodsRelation');
         $res = $db->relation(true)->delete($id);
         if($res){
             echo 1;
         }else{
              echo 0;
         }


     }

 }
?>