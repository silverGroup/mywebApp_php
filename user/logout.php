<?php
/**
* 退出登录，销毁用户的所有登录相关数据
* 返回数据形如：{"code":200, "msg":"logout succ"}
*/
header('Content-Type: application/json;charset=UTF-8');
//header('Access-Control-Allow-Credentials:true');
//header('Access-Control-Allow-Origin:http://localhost:3000');
require('../init.php');
session_start();
session_destroy();

echo '{"code":200, "msg":"logout succ"}';