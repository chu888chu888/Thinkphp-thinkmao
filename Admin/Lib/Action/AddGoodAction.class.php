<?php
class AddGoodAction extends CommonAction  {
  public function index(){
     $cate = M('category')->select();
     $cates = recursion($cate);
     $this->assign('cate', $cates);
     $gtype = M('goods_type')->select();
     $this->assign('goods_type', $gtype);
     $this->display();
  }
  
  /**
   * 获得包括该栏目以上的所有栏目下的品牌
   * 
   */
  public function brands(){     
     $cid = (int)$_POST['cid'];
     $pcids = $this->get_parents_cid($cid);
     $brands_arr = $this->get_brands($pcids);
     echo json_encode($brands_arr);
  }
  /**
   * 得到所有父级栏目的cid
   * @staticvar array $cid_arr
   * @param type $cid
   * @return array
   */
  private function get_parents_cid($cid){
      static $cid_arr = array();      
      $cate = M('category');
      $cids = $cate->where('id = '.$cid)->field('id,pid')->find();
      if(!$cids){
          return false;
      }
      if($cids['pid']){
          $cid_arr[]=$cids[id];
          $this->get_parents_cid($cids['pid']);
      }
      return $cid_arr;
          
     }
     
     /**
      * 循环便历得到栏目下的品牌
      * @param type $cate_arr
      * @return type array
      */
   private  function get_brands($cate_arr){      
         $brands = M('brand');
         $allbrands = $brands->select();
         $se_arr = array();
         foreach ($allbrands as $key => $value) {
             foreach ($cate_arr as $v) {
                 if($v==$value['cid']){
                     $se_arr[]=$allbrands[$key];
                 }else{
                     continue;
                 }
             }
         }
         return $se_arr;
     }
     
     /**
      * 
      * 返回post过来的类型的属性值
      */
     public function attr(){
         $tid = $_POST['id'];
         $attr = M('type_attr');
         $attr_arr = array();
         $data = $attr->where("tid = ".$tid)->select();
         echo json_encode($data);
     }
     /**
      * 插入商品数据
      */
     public function put_good(){
         $cid_arr = $_POST['cid'];
         $cid_str = '';
         foreach ($cid_arr as $key => $value) {
             $cid_str .= $value;
         }
         $data = array(
             'name'=>$_POST['name'],
             'unit'=>$_POST['unit'],
             'number'=>$_POST['number'],
             'price'=>$_POST['price'],
             'pic'=>$_POST['pic'],
             'click'=>$_POST['click'],
             'recommend'=>$_POST['recommend'],
             'hot'=>$_POST['hot'],
             'time'=>time(),
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
         if(isset($_POST['spec'])){
             foreach ($_POST['spec'] as $key => $v) {
                 for($i=0;$i<count($v['value']);$i++){
                     if(empty($v['value'][i])){
                         continue;
                     }
                     $attr[] = array(
                         'value'=>$v['value'][$i],
                         'price'=>(float)$v['price'][$i],
                         'aid'=>(int)$aid
                     );
                 }
             }
         }
         $data['goods_attr']=$attr;
         	  if (D('GoodsRelation')->insert($data)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败 请重试');
		}
         
     }
     
    
}

?>