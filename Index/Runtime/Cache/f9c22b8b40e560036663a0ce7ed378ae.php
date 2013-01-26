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

    <?php $db=M("brand");$all_cid = check_all_cate(16);$cids = implode(",",$all_cid);$data = $db->where("cid in ($cids)")->select();foreach($data as $k=>$field){if($k<10){ $field["url"]=U("brand",array('bid'=>$field['id']));?><h3 ss="{}">
            <a href="<?php echo ($field['url']); ?>"><?php echo ($field['name']); ?></a>
        </h3><?php } } ?>

</body>
</html>