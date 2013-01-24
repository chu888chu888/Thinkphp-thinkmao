<?php
Class GtypeViewModel extends ViewModel {
             Protected $tableName = 'good_type';
	Protected $viewFields = array(
		'goods_type' => array(
			'_type' => 'LEFT',
			),
		'type_attr' => array(
                                        'id'=>'attr_id',
			'name' => 'attr_name',
                                        'value',
                                         'type',                    
			'_on' => 'goods_type.id = type_attr.tid',
			)
		);
}
?>