<?php
header('Content-Type: application/json;charset=UTF-8');
require_once('../init.php');
session_start();
if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
$aid=$_REQUEST['aid'];
$sql="SELECT * FROM  xz_receiver_address WHERE aid=$aid AND user_id=$_SESSION[loginUid];";
$result = mysqli_query($conn, $sql);
if($result==true){
	$row=mysqli_fetch_assoc($result);
	if($row){
		echo json_encode($row);
	}
}
?>