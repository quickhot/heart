<?php
include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Admin.class.php';
include_once '../libs/sessions/LHCSession.class.php';
use DataControl\Admin\Admin;
session_start();
$adminId = $_SESSION['adminId'];
$adminLevel = $_SESSION['adminLevel'];
if($adminId && $adminLevel==1){
	$admin = new Admin();
	$allAdminInfo = $admin -> getAllAdmin($_SESSION['ESId']);
	//var_dump($allAdminInfo);
	$menuInfo = $admin -> getAllMenu();
	//var_dump($menuInfo);
	include_once '../cfg.php';
	$smarty -> assign('adminName',$_SESSION['adminName']);
	$smarty -> assign('allAdminInfo',$allAdminInfo);
	$smarty -> assign('menuInfo',$menuInfo);
	$smarty -> display('super.html');
}