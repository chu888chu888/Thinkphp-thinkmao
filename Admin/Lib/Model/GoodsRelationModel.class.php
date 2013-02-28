<?php
class GoodsRelationModel extends RelationModel{
    Protected $tableName = 'goods';
    protected $_link=array(
        'goods_intro'=>array(
            'mapping_type'=>HAS_ONE,
            'foreign_key'=>'gid'
        ),
        'goods_attr'=>array(
            'mapping_type'=>HAS_MANY,
            'foreign_key'=>'gid'
        )
    );
    Public function insert ($data = NULL) {
		$data = is_null($data) ? $_POST : $data;
		return $this->relation(true)->add($data);
	}
    Public function modify($data = NULL){
                                        $data = is_null($data) ? $_POST : $data;
		return $this->relation(true)->save($data);
    }
}

?>
