<?php
use DataControl\Users;
$userId = $_POST["userId"];

include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Users.class.php';
$retData = array();
$user = new Users();

	$qryInsVistor = "DELETE from userInfo WHERE id=$userId";
	if (mysql_query($qryInsVistor)) {
		$retData["success"]=1;
	} else {
		$retData["success"]=0;
		$retData["errNo"]=6;
		$retData["errInfo"]=$user->errorInfo["6"];
	}
echo json_encode($retData);
//echo $user->makeOutPut($retData,'JSON');