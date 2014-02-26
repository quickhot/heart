<?php
use DataControl\Users;
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';
include_once './libs/sessions/LHCSession.class.php';

session_start();
$userId = $_SESSION['userId'];
if ($userId) { //登录成功，且具有userId
	$userDetail = $_SESSION['userDetail'];
	$city = $userDetail['city'];
	$user = new Users();
	
	$showListUser = $user->getRecommendUsersByCity($city);//TODO: 翻页
	$recommendList = $showListUser['userList']; 
	//var_dump($showListUser);
	if ($showListUser['success']){
		include_once 'cfg.php';
		//var_dump($userDetail);
		//var_dump($recommendList);
		$smarty->assign('userDetail',$userDetail);
		$smarty->assign('recommendList',$recommendList);
		$smarty->display('index.html');
	} else {
		echo "<script language='javascript' type='text/javascript'>alert('$showListUser[errInfo]')</script>";
	}
}
else echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>"
?>