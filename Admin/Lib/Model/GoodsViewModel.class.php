<?php
Class GoodsViewModel extends ViewModel {
	Protected $viewFields = array(
		'goods' => array(
                                        'sell_num',
			'id'=>'gid',
                                        'name'=>'gname',
                                        'unit',
                                        'number',
                                        'price',
                                        'pic',
                                        'click',
                                        'recommend',
                                        'hot',
                                        'time',
                                        'cid',
                                        'bid',
                                         'tid',
                                         'mprice',
                                        '_type' => 'LEFT',
			),
                          'goods_attr'=>array(
                                        'id'=>'attrid',
                                        'value',
                                        'price'=>'attr_price',
                                         '_on'=>'goods_attr.gid =goods.id',
                                         '_type' => 'LEFT',
                           ),
		'type_attr' => array(
                                        'id'=>'attr_id',
			'name' => 'attr_name',
//                                        'value'=>'attr_value',
                                         'type',
			'_on' => 'goods_attr.aid = type_attr.id',
			),
                           'brand'=>array(
                                     'name'=>'brand_name',
                                     'logo',
                                     'hot'=>'hot_brand',
                                     '_on' => 'goods.bid = brand.id',
                           ),
                           'goods_intro'=>array(
                                   'mini',
                                   'medium',
                                   'max',
                                   'intro',
                                   'service',
                                    '_on' => 'goods.id = goods_intro.gid',
                           ),
                          'goods_list'=>array(
                                  'id'=>'in_id',
                                  'inventory',
                                  'attr'=>'attr_com',
                                  'number'=>'in_number',
                                  'series'=>'series',
                                  'price'=>'in_price',
                                   '_on' => 'goods.id = goods_list.gid',
                          )

		);
}
?>