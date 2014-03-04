<?php
use DataControl\Users;
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';

session_start();
$userId = $_SESSION['userId'];
if ($userId) { //登录成功，且具有userId
    $user = new Users();

    $quesList = $user->getAllQuestionList();
    if ($quesList['success']==1) {
        $questionsList = $quesList['questionsList'];
        include_once 'cfg.php';
        $smarty->assign('questionsList',$questionsList);
        $smarty->assign('comers',$comers['comerList']);
        $smarty->assign('reachers',$reachers['reacherList']);

    } else {
        echo "获取问题列表失败".$quesList['errInfo'];
    }
	
    $myQuesList = $user->getMyQuesList($userId);
	if ($myQuesList['success']==1) {
		$myQuestionList = $myQuesList['myQuesList'];
		//var_dump($myQuesList);
		$smarty->assign('myQuestionsList',$myQuestionList);
	} else {
		echo "获取用户列表失败".$myQuesList['errInfo'];
	}
	if ($myQuesList['success'] && $quesList['success']) {
		$smarty->display('quesSet.html');
	}
}
?>