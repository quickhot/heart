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
	$friends = $user->getFriendsByUserId($userId);
	$comers = $user->getComersByUserId($userId);
	$reachers = $user->getReacherByUserId($userId);
	
	if (!($friends['success'] && $comers['success'] && $reachers['success'])) {
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert(".$friends['errInfo'].$comers['errInfo'].$reachers['errInfo'].");";
		echo "window.location.href='index.php'</script>";
		exit();
	}
	
// 	var_dump($friends);
// 	var_dump($comers);
// 	var_dump($reachers);

	include_once 'cfg.php';
	

	$smarty->assign('friends',$friends['friendList']);
	$smarty->assign('comers',$comers['comerList']);
	$smarty->assign('reachers',$reachers['reacherList']);
	$smarty->display('friends.html');
	
}
?>