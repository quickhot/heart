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
	$profile = $user->getUserDetailById($userId);
	$messages = $user->getUserMessageById($userId);

	if ($profile['success'] && $messages['success']) {
		$userProfile = $profile['userDetail'];
		$userMessage = $messages['userMessage'];
		var_dump($userMessage);
		$smarty->assign('message',$userMessage);
		$smarty->assign('profile',$userProfile);
		$smarty->display('profile.html');
	} else {
		echo $profile['errInfo'];
		echo $messages['errInfo'];
	}
	
}
?>