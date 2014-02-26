<?php
include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
include_once '../libs/DataControl/Admin.class.php';
include_once '../libs/sessions/LHCSession.class.php';
use DataControl\Admin\Admin;
session_start();
$superId = $_SESSION['adminId'];
$adminLevel = $_SESSION['adminLevel'];
$ESId = $_SESSION['ESId'];
if($adminLevel == 1){//判断是否是超管
	$admin = new Admin();
	if($_GET['act'] == 1){//修改超管密码
		$superPassword = md5($_POST['superPassword']);
		$res = $admin -> edtPassword($superId,$superPassword);
		echo $admin -> makeOutPut($res,'JSON');
	}elseif ($_GET['act'] == 2){//修改或添加，以是否存在adminAccessId为依据
		$adminId = $_POST['adminAccessId'];
		$adminCount = $_POST['adminCount'];
		$adminPassword = $_POST['adminPassword'];
		if($adminId){//修改普管权限及密码
			$res['success'] = $admin -> edtAdminAccess($adminId,$_POST['access'],$adminCount,$adminPassword);
			echo $admin -> makeOutPut($res,'JSON');
		}else{//添加普管
			$res = $admin -> addAdmin($ESId,$adminCount,$adminPassword,$_POST['access']);
			echo $admin -> makeOutPut($res,'JSON');
		}
	}elseif ($_GET['act'] == 3){//获取普管权限，在修改弹出层中显示
		$adminAccess = $admin -> adminAccess($_POST['adminId']);
		echo $admin -> makeOutPut($adminAccess,'JSON');
	}elseif($_GET['act'] == 4){//删除管理员
		$adminId = $_POST['adminId'];
		echo $admin -> delAdmin($adminId);
	}
}