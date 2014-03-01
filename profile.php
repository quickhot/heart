<?php
use DataControl\Users;
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';
include_once './libs/sessions/LHCSession.class.php';

session_start();
$userId = $_SESSION['userId'];
if ($userId) { //登录成功，且具有userId
	$user = new Users();
	
	
	
	include_once 'cfg.php';
	
	//$smarty->assign('userId',$userId);
	$smarty->assign('friends',$friends['friendList']);
	$smarty->assign('comers',$comers['comerList']);
	$smarty->assign('reachers',$reachers['reacherList']);
	$smarty->display('friends.html');
	
}
?>