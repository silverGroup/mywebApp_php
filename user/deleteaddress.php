<?php
header('Content-Type: application/json;charset=UTF-8');
require_once('../init.php');
session_start();
if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
$aid=$_REQUEST['aid'];
$sql="DELETE FROM xz_receiver_address WHERE aid=$aid AND user_id=$_SESSION[loginUid]";
$result = mysqli_query($conn, $sql);
if($result==true){
	echo '{"code":200,"msg":"删除成功"}';
}else{
	echo '{"code":400,"msg":"删除失败"}';
}
?>