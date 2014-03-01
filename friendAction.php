<?php
use DataControl\Users;


$doUserId=$_POST['userId'];//被操作的用户
$action=$_POST['action'];

session_start();
$userId=$_SESSION['userId'];//当前用户

include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';

$user = new Users();

if ($action=='notify'){
	$ret = $user->notifyUser($userId,$doUserId);
	echo json_encode($ret);
	exit();
}

if ($action=='delete') {
	$ret = $user->delReacher($userId,$doUserId);
	echo json_encode($ret);
	exit();
}

if ($action=='add') {
	$ret = $user->addComer($userId,$doUserId);
	echo json_encode($ret);
	exit();
}

if ($action=='refuse') {
	$ret = $user->delReacher($doUserId,$userId);
	if ($ret) {
		$ret = $user->sendRefuseMessage($userId, $doUserId);
	}
	echo json_encode($ret);
	exit();
}

