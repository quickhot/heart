<?php
use DataControl\Users;

$alias=$_POST['alias'];
$roomId=$_POST['roomId'];
$IDCard=$_POST['IDCard'];
$gender=$_POST['gender'];
$mobileNo=$_POST['mobileNo'];
$birthday=$_POST['birthday'];
$tele=$_POST['tele'];
$addr=$_POST['addr'];
$zipCode=$_POST['zipCode'];
session_start();
$ESId = $_SESSION['ESId'];

include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Users.class.php';

$user = new Users();
$linkIdentifier = $user->getLinkIdentifier();
$retData = array();

$retMobileId = $user->getMobileIdByMobileNo($mobileNo);

if ($retMobileId['success']) { //获得了新的mobileId
		$newMobileId = $retMobileId['mobileId'];
} else {//查询失败
	$retData=$retMobileId;
}

$qryInsUserInfo = "INSERT INTO userInfo(mobileId,roomId,alias,IDCardNo,gender,birthday,address,tele,zipCode,identity) VALUES($newMobileId,$roomId,'$alias','$IDCard','$gender','$birthday','$addr','$tele','$zipCode',1)";
if (mysql_query($qryInsUserInfo,$linkIdentifier)) {
	$retData['success']=1;
	$retData['userId']=mysql_insert_id($linkIdentifier);
	$retData['mobileId']=$newMobileId;
} else {
	$retData['success']=0;
	$retData['errNo']=4;
	$retData['errInfo']=$user->errorInfo['4'];
}

echo json_encode($retData);