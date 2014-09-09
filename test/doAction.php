<?php 
require_once '../lib/string.func.php';
//$_FILES
header("content-type:text/html;charset=utf-8;");
// print_r($_FILES);
$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$error=$_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];
$allowExt=array("gif","jpeg","jpg","png","txt");
$maxSize=10*1024*1024;
$imgFlag=true;
//判断错误信息
if($error==UPLOAD_ERR_OK){
	$ext=getExt($filename);
	if(!in_array($ext,$allowExt)){
		exit("非法文件类型");
	}
	if($size>$maxSize){
		exit("文件过大");
	}
	if($imgFlag){
		//如何验证图片是一个真正的图片类型
		//getimagesize($filename);
		$info=getimagesize($tmp_name);
		//var_dump($info);
		if(!$info){
			exit("不是真正的图片类型");
		}
	}
	//判断文件是否是通过HTTP POST方式上传的
	//is_uploaded_file($tmp_name);
	
	$filename=getUniName().".".$ext;
	$path="uploads";
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	$destination=$path."/".$filename;
	if(is_uploaded_file($tmp_name)){
		if(move_uploaded_file($tmp_name, $destination)){
			$mes="文件上传成功";
		}else{
			$mes="文件上传失败";
		}
	}else{
		$mes="文件不是通过HTTP POST方式上传上来的";
	}
}else{
	switch($error){
		case 1:
			$mes="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
			break;
		case 2:
			$mes="超过表单设置上传文件的大小";//UPLOAD_ERR_FORM_SIZE
			break;
		case 3:
			$mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
			break;
		case 4:
			$mes="没有文件被上传";//UPLOAD_ERR_NO_FILE
			break;
		case 6:
			$mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
			break;
		case 7:
			$mes="文件不可写";//UPLOAD_ERR_CANT_WRITE
			break;
		case 8:
			$mes="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
			break;
	}
}
echo $mes;






