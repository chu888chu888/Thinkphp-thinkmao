<?php

Class OrderListViewModel extends ViewModel {

	Protected $viewFields = array(
		'order_list' => array(
			'id','quantity','subtotal','remark','gid', '_type' => 'LEFT',
			),
		'order' => array(
                                        'status',
			'_on' => 'order_list.oid = order.id',
			)
		);
}
?>