<?php
use DataControl\Users;
$alias = $_POST['modiAlias'];
$mobileNo = $_POST['modiMobileNo'];
$reception = $_POST['modiReception'];
$userId = $_POST['modiUserId'];
$mobileId = $_POST['modiMobileId'];

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
			'mobileId'=>$newMobileId,
	);
	$updUserCon = array(
			'id'=>$userId
	);
	$retUpdUser = $user->updateUserInfo($updUser, $updUserCon);
	$retData=$retUpdUser;
} else {
	$retData=$retMobile;
}
echo $user->makeOutPut($retData,'JSON');