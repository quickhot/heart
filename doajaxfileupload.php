<?php
	use DataControl\Users;
	include_once './libs/DataControl/General.class.php';
	include_once './libs/DataControl/DataConnector.class.php';
	include_once './libs/DataControl/Users.class.php';
	include_once './libs/upload.php';
	$user = new Users();
	$link = $user->link_identifier;
    $questionId = $_POST['questionId'];
    $selAnswer = $_POST['selAnswer'];
	$up = new upload('jpg|png',2048);
	$saveDir = "/media/source/";
	$up->set_dir(dirname(__FILE__).$saveDir);
	$up->field = "questionPicture";
	$fs = $up->execute();
	$flag = $fs[0]["flag"];
	session_start();
	$userId = $_SESSION['userId'];
	$retData = array();
	if ($flag==1) {//上传成功
		$fileName = $fs[0]["name"];

		$insUserQues = "INSERT INTO userAnswer(questionId,answerNo,userId,questionPicture) VALUES($questionId,'$selAnswer',$userId,'$saveDir$fileName');";
		$res = mysql_query($insUserQues,$link);
		$err = mysql_error();
		if ($res) {
			$retData['success']=1;
		} else {
			$retData['success']=0;
			$retData['errNo']=4;
			$retData['errInfo']=$user->errorInfo['4']."::".mysql_error();
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