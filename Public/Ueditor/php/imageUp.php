<?php

header("Content-Type: text/html; charset=utf-8");
error_reporting( E_ERROR | E_WARNING );
$title = htmlspecialchars( $_POST[ 'pictitle' ] , ENT_QUOTES );
import('ORG.Net.UploadFile');
$upload = new UploadFile();
$upload->maxSize = 2000000; //上传大小（字节）
$upload->savePath = $_GET['path']; //文件保存路径
$upload->allowExts = array('jpg', 'jpeg', 'png', 'gif');    //充许上传文件
$upload->saveRule = uniqid; //保存的文件名
$upload->thumb = false;  //开启缩略图
$upload->autoSub = true;    //子目录保存
$upload->subType = 'date';  //子目录保存规则
$upload->dateFormat = 'Ym'; //日期保存格式
if (!$upload->upload()) {
    echo $upload->getErrorMsg();
} else {
    $info = $upload->getUploadFileInfo();
    echo '{"url":"' . ltrim($info[0]['savepath'], '.') . $info[0]['savename'] . '", "title":"' . $title . '", "original":"' . $info[0]['name'] . '", "state":"SUCCESS"}';
} 
?>