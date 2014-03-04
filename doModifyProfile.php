<?php
	use DataControl\Users;
	include_once './libs/DataControl/General.class.php';
	include_once './libs/DataControl/DataConnector.class.php';
	include_once './libs/DataControl/Users.class.php';
	include_once './libs/upload.php';
	$user = new Users();
	$link = $user->link_identifier;
    $city = $_POST['city'];
    $password = $_POST['password'];
	$sqlPass='';
	if (!password) {
		$sqlPass= ",`loginPass`=PASSWORD('$password')";
	}
	$nickName = $_POST['nickName'];
	
	$up = new upload('jpg|png',2048);
	$saveDir = "/media/source/";
	$up->set_dir(dirname(__FILE__).$saveDir);
	$up->field = "picture";
	$fs = $up->execute();
	$flag = $fs[0]["flag"];
	session_start();
	$userId = $_SESSION['userId'];
	$retData = array();
	if ($flag==1) {//上传成功
		$fileName = $fs[0]["name"];
		$updUserInfo = "UPDATE userInfo SET nickName='$nickName',city='$city',picture='$saveDir$fileName'".$sqlPass." WHERE id=$userId";
		$res = mysql_query($updUserInfo,$link);
		$err = mysql_error();
		if ($res) {
			$retData['success']=1;
			$_SESSION['userDetail']['picture']=$saveDir.$fileName;
		} else {
			$retData['success']=0;
			$retData['errNo']=20;
			$retData['errInfo']=$user->errorInfo['20']."::".mysql_error();
		}
	} else {
		$retData['success']=0;
		switch ($flag) {
			case '-1':
				$retData['errNo']=15;
				$retData['errInfo']=$user->errorInfo['15'];
				break;
			case '-2':
				$retData['errNo']=16;
				$retData['errInfo']=$user->errorInfo['16'];
				break;
			case '-3':
				$retData['errNo']=17;
				$retData['errInfo']=$user->errorInfo['17'];
				break;
			case '-4':
				$retData['errNo']=18;
				$retData['errInfo']=$user->errorInfo['18'];
				break;
			default:
				break;
		}
	}
	echo json_encode($retData);
?>