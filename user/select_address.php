<?php
header('Content-Type: application/json;charset=UTF-8');
require_once('../init.php');
session_start();
if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
//获取总记录数
$sql = "SELECT * FROM xz_receiver_address WHERE user_id=$_SESSION[loginUid]";
$result = mysqli_query($conn, $sql);
$list = mysqli_fetch_ALL($result,MYSQLI_ASSOC);
if($result==true){
	if($list){
		echo json_encode($list);
	}else{
		echo '{"code":400, "msg":"err msg"}';
	}
}
?>