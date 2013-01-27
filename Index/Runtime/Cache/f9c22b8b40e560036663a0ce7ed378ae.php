<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title></title>
    </head>
    <body>
        <?php $db = M("category");$data = $db->where(array("pid"=>0))->select(); foreach($data as $field){ $field["url"]=U("cate",array('id'=>$field['id']));?><a  ss="{}" href="<?php echo ($field['url']); ?>" style="height:30px;line-height: 30px;display:block">
                <?php echo ($field['name']); ?> </a>
            <div>
                <ul>
                    <?php $db = M("category");$data = $db->where(array("pid"=>$field['id']))->select(); foreach($data as $field){ $field["url"]=U("cate",array('id'=>$field['id']));?><li ss="{}">
                            <a href="<?php echo ($field['url']); ?>">
                                <?php echo ($field['name']); ?>
                            </a>
                            <ul>
                                <?php $db = M("category");$data = $db->where(array("pid"=>$field['id']))->select(); foreach($data as $field){ $field["url"]=U("cate",array('id'=>$field['id']));?><li ss="{}">
                                        <a href="<?php echo ($field['url']); ?>">
                                            <?php echo ($field['name']); ?>
                                        </a>
                                    </li><?php }; ?>
                            </ul>
                        </li><?php }; ?>
                </ul>
            </div><?php }; ?>

        <?php $db=M("brand");$all_cid = check_all_cate(15);$cids = implode(",",$all_cid);$data = $db->where("cid in ($cids)")->select();foreach($data as $k=>$field){if($k<10){ $field["url"]=U("brand",array('bid'=>$field['id']));?><h3 ss="{}">
                <a href="<?php echo ($field['url']); ?>"><?php echo ($field['name']); ?></a>
            </h3><?php } } ?>


        <ul>
        <?php $good_mes_all = get_goods_mes(10);$attrs = $good_mes_all["attrs"];foreach($attrs as $k=>$field){if($k<200){ ?><li ss='{}'>
                <?php echo ($field['attr_name']); ?>:<?php echo ($field['value']); ?>
            </li><?php } } ?>
        </ul>
        <br/>
        <br/>



        <?php $good_mes_all = get_goods_mes(10);$specs = $good_mes_all["specs"];$specsx = get_spec_name($specs);foreach($specsx as $k=>$field){if($k<20){ ?><h3 ss="{}"> <?php echo ($field['attr_name']); ?></h3>
            <ul>
                <?php $good_mes_all = get_goods_mes(10);$specs = $good_mes_all["specs"][$field['attr_id']];foreach($specs as $k=>$field){if($k<40){ ?><li ss='{}'>
                        <?php echo ($field['value']); ?>:<?php echo ($field['attr_price']); ?>
                    </li><?php } } ?>
            </ul><?php } } ?>














    </body>
</html>