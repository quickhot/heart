<?php
use DataControl\Users;

$questionId = $_POST['questionId'];
session_start();
$userId = $_SESSION['userId'];
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';
$user = new Users();
$linkIdentifier = $user->getlinkIdentifier();
$retData = array();
$qryDelUserQuestion = "DELETE FROM userAnswer WHERE questionId=$questionId AND userId=$userId";
if (mysql_query($qryDelUserQuestion,$linkIdentifier)) {
	$retData['success']=1;
} else {
	$retData['success']=0;
	$retData['errNo']=19;
	$retData['errInfo']=$user->errorInfo['19'];
}

echo json_encode($retData);
?>
