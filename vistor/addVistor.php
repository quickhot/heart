<?php
use DataControl\Users;
$alias = $_POST['addAlias'];
$mobileNo = $_POST['addMobileNo'];
$reception = $_POST['addReception'];
session_start();
$ESId=$_SESSION["ESId"];

include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Users.class.php';
$retData = array();
$user = new Users();
$retMobile = $user->getMobileIdByMobileNo($mobileNo);
if ($retMobile["success"]) { //获得了新的mobileId
	$newMobileId = $retMobile["mobileId"];
	$qryInsVistor = "INSERT INTO userInfo(alias,mobileId,reception,identity,attentionESId) VALUES('$alias',$newMobileId,'$reception',2,$ESId)";
	if (mysql_query($qryInsVistor)) {
		$retData["success"]=1;
	} else {
		$retData["success"]=0;
		$retData["errNo"]=4;
		$retData["errInfo"]=$user->errorInfo["4"];
	}
} else {
	$retData=$retMobile;
}
echo $user->makeOutPut($retData,'JSON');