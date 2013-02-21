<?php

Class CategoryViewModel extends ViewModel {

	Protected $viewFields = array(
		'category' => array(
			'id'=>'cid', 'name'=>'cname', '_type' => 'LEFT',
			),
		'goods_type' => array(
                                                             'id'=>'tid',
			'name' => 'tname',
			'_on' => 'goods_type.id = category.tid'
			)
		);
}
?>