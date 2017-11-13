<?php
header('Content-Type: application/json;charset=UTF-8');
require_once('../init.php');
session_start();
if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
$n=$_REQUEST['receiver'];
$province=$_REQUEST['province'];
$city=$_REQUEST['city'];
$county=$_REQUEST['county'];
$address=$_REQUEST['address'];
$cellphone=$_REQUEST['cellphone'];
$isdefault=$_REQUEST['isdefault'];
//检查数据库是否存在默认的地址，如果存在，则修改其isdefault为1
$sql = "SELECT * FROM xz_receiver_address WHERE is_default=1 AND      user_id=$_SESSION[loginUid]";
$result = mysqli_query($conn, $sql);
$list = mysqli_fetch_assoc($result);
if($isdefault==1&&$list){
	$sql="UPDATE xz_receiver_address SET is_default=0 WHERE is_default=1 AND user_id=$_SESSION[loginUid]";
	$result = mysqli_query($conn, $sql);
	if($result==true){
		$sql = "INSERT INTO xz_receiver_address (user_id,receiver,province,city,county,address,cellphone,is_default) VALUES( $_SESSION[loginUid],'$n','$province','$city','$county','$address','$cellphone',$isdefault)";
		$result = mysqli_query($conn, $sql);
		if($result==true){
			echo '{"code":200,"msg":"插入成功"}';
		}else{
			echo '{"code":500,"msg":"插入失败"}';
		}
	}
}else{
$sql="INSERT INTO xz_receiver_address (user_id,receiver,province,city,county,address,cellphone,is_default) VALUES($_SESSION[loginUid],'$n','$province','$city','$county','$address','$cellphone',$isdefault)";
	$result = mysqli_query($conn, $sql);
	if($result==true){
		echo '{"code":200,"msg":"插入成功"}';
	}else{
		echo '{"code":400,"msg":"插入失败"}';
	}
}
