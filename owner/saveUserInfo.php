<?php
//header("Content-Type: application/json; charset=utf-8");
use DataControl\Users;
$alias=$_POST['alias'];
$userId=$_POST['userId'];
$IDCardNo=$_POST['IDCardNo'];
$mobileId=$_POST['mobileId'];
$gender=$_POST['gender'];
$mobileNo=$_POST['mobileNo'];
$birthday=$_POST['birthday'];
$tele=$_POST['tele'];
$address=$_POST['address'];
$zipCode=$_POST['zipCode'];

include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Users.class.php';
$retData = array();
$user = new Users();
$retMobile = $user->getMobileIdByMobileNo($mobileNo);
	if ($retMobile["success"]) { //获得了新的mobileId
		$newMobileId = $retMobile["mobileId"];
		$updUser = array(
				'alias'=>$alias,
				'IDCardNo'=>$IDCardNo,
				'mobileId'=>$newMobileId,
				'gender'=>$gender,
				'birthday'=>$birthday,
				'tele'=>$tele,
				'address'=>$address,
				'zipCode'=>$zipCode
		);
		$updUserCon = array(
			'id'=>$userId	
		);
		$retUpdUser = $user->updateUserInfo($updUser, $updUserCon);
		$retData=$retUpdUser;
	} else {
		$retData=$retMobile;
	}
echo json_encode($retData);
