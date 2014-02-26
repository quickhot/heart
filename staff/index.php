<?php

use DataControl\Users;
include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Users.class.php';
include_once '../libs/sessions/LHCSession.class.php';

session_start ();
$adminId = $_SESSION ['adminId'];
$adminName = $_SESSION['adminName'];
$adminLevel = $_SESSION ['adminLevel'];
$ESId = $_SESSION['ESId'];
if ($adminId && $adminLevel == '0') { // 登录成功，且具有adminId                                                                                                
	
	$user = new Users();
	$staffs = $user->getStaffsByESId($ESId);
	
	if (!$staffs['success']) {
		$user->jsAlert($staffs['errInfo']);
		exit();
	}

	$staffsList = $staffs["staffsList"];
	//echo "<pre>";
	//var_dump($staffs);
	//echo "</pre>";	
	include_once '../cfg.php';
	include_once '../libs/smarty/Smarty.class.php';
	$smarty = new Smarty ();
	
	$smarty->template_dir = WEBROOT . 'smartyFiles/templates/';
	$smarty->compile_dir = WEBROOT . 'smartyFiles/templates_c/';
	$smarty->config_dir = WEBROOT . 'smartyFiles/configs/';
	$smarty->cache_dir = WEBROOT . 'smartyFiles/cache/';
	$smarty->caching = false;
	$smarty->assign('adminName',$adminName);
 	$smarty->assign ( 'staffList', $staffsList );
// 	$smarty->assign ( 'adminName', $adminName );
// 	$smarty->assign ( 'adminRights', $adminRights );
	$smarty->display ( 'staff.html' );
} else
	echo "<script language='javascript' type='text/javascript'>window.location.href='/login.php'</script>"?>
