<?php
use DataControl\Rooms;
use DataControl\Users;
include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Rooms.class.php';
include_once '../libs/DataControl/Users.class.php';
include_once '../libs/sessions/LHCSession.class.php';

session_start ();
$adminId = $_SESSION ['adminId'];
$adminName = $_SESSION['adminName'];
$adminLevel = $_SESSION ['adminLevel'];
$ESId = $_SESSION['ESId'];
if ($adminId && $adminLevel == '0') { // 登录成功，且具有adminId                                                                                                
	
	$room = new Rooms();
	$roomInfoAll = $room->getAllRoomInfoByESId($ESId);
	
	if (!$roomInfoAll['success']) {
		$room->jsAlert($roomInfoAll['errInfo']);
		exit();
	}
	
	$user = new Users();
	
	$roomList =$roomInfoAll['roomList'];
	
	for ($i=0;$i<count($roomList);$i++) {
		$roomId = $roomList[$i]['roomId'];
		 $retUser = $user->getUsersInfoByRoomId($roomId);
		 if ($retUser['success']) {
		 	$roomList[$i]['users'] = $retUser['userList'];
		 } else {
		 	$user->jsAlert($retUser['errInfo']);
		 	continue;
		 }
	}
	//echo "<pre>";
	//var_dump($roomList);
	//echo "</pre>";	
	include_once '../cfg.php';
	$smarty->assign('adminName',$adminName);
 	$smarty->assign ( 'roomList', $roomList );
// 	$smarty->assign ( 'adminName', $adminName );
// 	$smarty->assign ( 'adminRights', $adminRights );
	$smarty->display ( 'ownerData.html' );
} else
	echo "<script language='javascript' type='text/javascript'>window.location.href='/login.php'</script>"?>
