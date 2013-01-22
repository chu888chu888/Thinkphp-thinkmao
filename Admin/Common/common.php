<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 自动载入
 */
  function P($arr){
      echo "<pre>";
      print_r($arr);
  }
  /**
 * 商品无限级分类
 * @param  [type]  $arr   [description]
 * @param  integer $type  [description]
 * @param  integer $pid   [description]
 * @param  integer $level [description]
 * @return [type]         [description]
 */
function recursion ($arr, $type=1, $pid=0, $level=1) {
	if (!is_array($arr)) return;
	switch ($type) {
		case 1 :
			static $array = array();
			static $id = -1;
			$id++;
			foreach ($arr as $v) {
				if ($v['pid'] == $pid) {
					$array[$id] = $v;
					$array[$id]['html'] = $pid ? '|' . str_repeat('-', $level) : '';
					recursion($arr, $type, $v['id'], $level + 2);
				}
			}
			return $array;

		case 2 :

		case 3 :
	}
}


?>
