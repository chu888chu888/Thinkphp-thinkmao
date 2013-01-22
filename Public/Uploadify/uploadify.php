<?php
if (!defined('THINK_PATH')) exit();
header('Content-Type:text/html;Charset=UTF-8');
/**
 * 异步删除文件
 */
if (isset($_POST['upload_del'])) {
    $status = 1;
    foreach ($_POST['upload_del'] as $v) {
        $file = './' . ltrim(ltrim($v, __ROOT__), '/');
        $status = @unlink($file) ? 1 : 0;
    }
    echo $status;
    die;
}
/**
 * 处理图片上传
 */
import('ORG.Net.UploadFile');
$upload = new UploadFile();
$upload->maxSize = 2000000;	//上传大小（字节）
$upload->savePath = $_POST['path'];	//文件保存路径
$upload->allowExts = array('jpg', 'jpeg', 'png', 'gif');	//充许上传文件后缀
$upload->saveRule = uniqid;	//保存的文件名
$upload->autoSub = true;    //子目录保存
$upload->subType = 'date';  //子目录保存规则
$upload->dateFormat = 'Ym'; //日期保存格式
if ($_POST['width']) {
    $upload->thumb = true;  //开启缩略图
    $upload->thumbMaxWidth = $_POST['width'];   //缩略图宽
    $upload->thumbMaxHeight = $_POST['height']; //缩略图高
    $upload->thumbPrefix='max,mini'; //缩略图前缀
    $upload->thumbRemoveOrigin = false;  //删除原图
    $upload->thumbPath = $_POST['path'] . date('Ym', time()) .'/';    //缩略图保存地址
}
if ($upload->upload()) {
    $info = $upload->getUploadFileInfo();
    $path = __ROOT__ . ltrim($info[0]['savepath'], '.');
    $data['status'] = 1;
    if (!$_POST['width']) {
        $data['path'] = $path . $info[0]['savename'];
    } else {
        $thumb = explode('/', $info[0]['savename']);
        $data['path'] = array(
            $path . $info[0]['savename'],
            $path . $thumb[0] . '/max' . $thumb[1],
            $path . $thumb[0] . '/mini' . $thumb[1]
            );
    }
} else {
    $data = array(
        'status' => 0,
        'error' => $upload->getErrorMsg()
        );
}
echo json_encode($data);
?>