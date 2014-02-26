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
	$quesUser = $_REQUEST['quesUserId'];//出问题的用户的id
	$quesQues = $_REQUEST['quesQues'];//出问题的questionId
	//$questionId = $_POST['questionId'];//
	$firstQuestion = $_REQUEST['firstQuestion']; //是否是第一个问题，如果获取到了，那就说明不是第一个
	$answer = $_POST['answer'];//用户回答的答案
	$answerQuesId = $_POST["nowQuesId"];//用户回答的问题的id
	
	
	echo $answer."<br />";
	echo $answerQuesId."<br />";
	echo $quesUser."<br />";
	if ($quesUser && $answerQuesId && $answer) { //回答问题
		$ifDone = $user->checkAnswer($quesUser, $answerQuesId, $answer);
		if ($ifDone['answer']) {
			for ($j = 0; $j < count($_SESSION['questions']); $j++) {
				if ($_SESSION['questions'][$j]['questionId']==$answerQuesId) {
					$_SESSION['questions'][intval($j)]['done']='1';
					break;
				}
			}
		} else {
			unset($_SESSION['questions']);
			echo "<script language='javascript' type='text/javascript'>alert('错误');window.location.href='login.php';</script>";
			exit();
		}
	}
	
	
	
	
	if (!$firstQuestion) {
		$questions = $user->getQuestionsByUserId($quesUser);
		if ($questions['success']) {
			$_SESSION['questions']=$questions['questionList'];
		} else {
			echo "<script language='javascript' type='text/javascript'>alert('".$questions['errInfo']."')</script>";
		}
	}

		if ($quesQues) {//有问题的id，那么就把该问题列出来，其他的放到一起
			for ($i=0;$i<count($_SESSION['questions']);$i++){
				if ((!$_SESSION['questions'][$i]['done']) && (!$getShowQuestion) && $_SESSION['questions'][$i]['questionId']==$quesQues) {
					$nowQuesId = $_SESSION['questions'][$i]['questionId'];
					$nowQuestion = $_SESSION['questions'][$i]['question'];
					$arrayId = $i;
					$nowAnswer = array(
							'A'=>$_SESSION['questions'][$i]['A'],
							'B'=>$_SESSION['questions'][$i]['B'],
							'C'=>$_SESSION['questions'][$i]['C'],
							'D'=>$_SESSION['questions'][$i]['D']
					);
					$nowPicture = $_SESSION['questions'][$i]['picture'];
					$getShowQuestion = true;
				} else if (!$_SESSION['questions'][$i]['done']) {
					$lastQuestion[] = $_SESSION['questions'][$i];
				}
			}
		} else {	
			for ($i=0;$i<count($_SESSION['questions']);$i++){
				if ((!$_SESSION['questions'][$i]['done']) && (!$getShowQuestion)) {
					$nowQuesId = $_SESSION['questions'][$i]['questionId'];
					$nowQuestion = $_SESSION['questions'][$i]['question'];
					$arrayId = $i;
					$nowAnswer = array(
							'A'=>$_SESSION['questions'][$i]['A'],
							'B'=>$_SESSION['questions'][$i]['B'],
							'C'=>$_SESSION['questions'][$i]['C'],
							'D'=>$_SESSION['questions'][$i]['D']
					);
					$nowPicture = $_SESSION['questions'][$i]['picture'];
					$getShowQuestion = true;
				} else if (!$_SESSION['questions'][$i]['done']) {
					$lastQuestion[] = $_SESSION['questions'][$i];
				}
			}
		}

		if(!$nowQuestion){
			//TODO:添加心堡好友
			$addUser=$user->addFriend($userId,$quesUser);
			if ($addUser['success']){
				echo "<script language='javascript' type='text/javascript'>alert('您已经通过该好友的心路历程,请等待对方添加您为好友。');</script>";
				unset($_SESSION['questions']);
			} else echo "<script language='javascript' type='text/javascript'>alert('".$addUser['errInfo']."')</script>";
			echo "<script language='javascript' type='text/javascript'>window.location.href='login.php';</script>";
			exit();
		}
	
	

		include_once 'cfg.php';

		$smarty->assign('nowQuestion',$nowQuestion);
		$smarty->assign('nowAnswer',$nowAnswer);
		$smarty->assign('nowPicture',$nowPicture);
		$smarty->assign('nowQuesId',$nowQuesId);
		$smarty->assign('quesUserId',$quesUser);
		$smarty->assign('lastQuestion',$lastQuestion);
		$smarty->display('goQuestion.html');
}
?>