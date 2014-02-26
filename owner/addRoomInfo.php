<?php
use DataControl\Users;

$alias=$_POST['alias'];
$gardenName=$_POST['gardenName'];
$buildingNo=$_POST['buildingNo'];
$doorNo=$_POST['doorNo'];
$floorNo=$_POST['floorNo'];
$roomNo=$_POST['roomNo'];
$lounge=$_POST['lounge'];
$hall=$_POST['hall'];
$kitchen=$_POST['kitchen'];
$bathroom=$_POST['bathroom'];
$areaNo=$_POST['areaNo'];
$mobileNo=$_POST['mobileNo'];
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

$user->startTransAction();
$qryAddRoom = "INSERT INTO roomInfo(gardenName,buildingNo,doorNo,floorNo,roomNo,lounge,hall,kitchen,bathroom,areaNo,ESId) VALUES('$gardenName',$buildingNo,$doorNo,$floorNo,$roomNo,$lounge,$hall,$kitchen,$bathroom,$areaNo,$ESId)";
if (mysql_query($qryAddRoom,$linkIdentifier)) {
	$roomId = mysql_insert_id($linkIdentifier);
	$qryInsRoomExt = "INSERT INTO roomExtInfo(roomId) VALUES($roomId)";
	if (mysql_query($qryInsRoomExt,$linkIdentifier)) {
		$roomExtId=mysql_insert_id($linkIdentifier);
		$qryInsUserInfo = "INSERT INTO userInfo(mobileId,roomId,alias,identity) VALUES($newMobileId,$roomId,'$alias',1)";
		if (mysql_query($qryInsUserInfo,$linkIdentifier)) {
			$retData['success']=1;
		} else {
			$retData['success']=0;
			$retData['errNo']=4;
			$retData['errInfo']=$user->errorInfo['4'];
		}
	} else {
		$retData['success']=0;
		$retData['errNo']=4;
		$retData['errInfo']=$user->errorInfo['4'];
	}
} else {
	$retData['success']=0;
	$retData['errNo']=4;
	$retData['errInfo']=$user->errorInfo['4'];
}

if ($retData['success']==1) {
	$user->commit();
} else {
	$user->rollback();
}

echo json_encode($retData);