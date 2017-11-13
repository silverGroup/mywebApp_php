<?php
header('Content-Type: application/json;charset=UTF-8');
require_once('../init.php');
session_start();
if(! @$_SESSION['loginUid']){
  $_SESSION['pageToJump'] = 'cart.html';
  die('{"code":300, "msg":"login required"}');
}
$arrList=[
	"province"=>[],
	"city"=>[],
	"area"=>[]
];
$sql="select * from province;";
$result=mysqli_query($conn,$sql);
if($result==true){
	$arrList["province"]=mysqli_fetch_ALL($result,MYSQLI_ASSOC);
}
$sql="select * from city;";
$result=mysqli_query($conn,$sql);
if($result==true){
	$arrList["city"]=mysqli_fetch_ALL($result,MYSQLI_ASSOC);
}
$sql="select * from area;";
$result=mysqli_query($conn,$sql);
if($result==true){
	$arrList["area"]=mysqli_fetch_ALL($result,MYSQLI_ASSOC);
}
echo json_encode($arrList);
?>