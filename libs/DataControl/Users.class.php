<?php

namespace DataControl;

use DataControl\Connector\DataConnector;

class Users extends DataConnector {

	/**
	 * 用户登录
	 * @param unknown $loginName
	 * @param unknown $loginPass
	 * @return Ambigous <string, unknown>
	 */
	public function userLogin($loginName,$loginPass) {
		$retData = array();
		$qryUserInfo = "SELECT * FROM userInfo WHERE loginName='$loginName' AND loginPass=password('$loginPass')";
		if($resUserInfo = mysql_query($qryUserInfo,$this->link_identifier)) {
			$rowUserInfo = mysql_fetch_assoc($resUserInfo);
			$userId = $rowUserInfo['id'];
			if ($userId) {
				//登录成功
				$retData['success']=1;
				$retData['userDetail']=$rowUserInfo;
			} else {
				//用户或密码不正确
				$retData['success']=0;
				$retData['errNo']=1;
				$retData['errInfo']=$this->errorInfo['1'];
			}
		} else {
			//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}

	/**
	 *获取排序后的用户列表。
	 */
	public function getRecommendUsersByCity($city,$size=7,$page=1) {
		$retData = array();
		$start = ($page-1)*$size;
		$qryRecom = "SELECT * FROM userInfo WHERE city='$city' ORDER BY score DESC LIMIT $start, $size";
		//echo $qryRecom;
		if($resRecom = mysql_query($qryRecom,$this->link_identifier)){
			while ($rowRecom=mysql_fetch_array($resRecom,MYSQL_ASSOC)) {
				$userId = $rowRecom['id']; //获取用户id
				$userQuestions = $this->getQuestionsByUserId($userId);//获取该用户的问题们
				$firstQuestion = $userQuestions['questionList'][0]['question'];//获取该用户的第一个问题。
				if (!$firstQuestion) {
					$firstQuestion=$this->errorInfo['2'];
				}
				$rowRecom['firstQuestion']=$firstQuestion; 
				$retData['userList'][]=$rowRecom;
			} 
			$retData['success']=1;
		} else {
			//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	//获取用户的问题
	public function getQuestionsByUserId($userId) {
		$retData = array();
		$qryQuestions = "SELECT * FROM v_userAnswer WHERE userId=$userId";
		if($resQuestions = mysql_query($qryQuestions,$this->link_identifier)) {
			$retData['success']=1;
			while ($rowQuestions=mysql_fetch_array($resQuestions,MYSQL_ASSOC)){
				$retData['questionList'][]=$rowQuestions;
			}
		} else {
			//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData); 
	}
	
	public function checkAnswer($userId,$questionId,$answer) {
		$retData = array();
		$qryAnswer = "SELECT count(*) FROM v_userAnswer WHERE userId=$userId AND questionId=$questionId AND answerNo='$answer'";
		if($resAnswer = mysql_query($qryAnswer,$this->link_identifier)) {
			$retData['success']=1;
			$rowAnswer = mysql_fetch_row($resAnswer);
			if ($rowAnswer[0]) {
				$retData['answer']=true;
			} else $retData['answer']=false;
		} else {
			//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function addFriend($userId,$friendUserId) {
		$retData=array();
		$qryAdd = "INSERT IGNORE INTO friends(userId,friendId) VALUES($userId,$friendUserId)";
		//echo $qryAdd;
		if(($resAdd = mysql_query($qryAdd,$this->link_identifier))!==false) {
			$retData['success']=1;
		} else {
			//查询失败
			$retData['success']=0;
			$retData['errNo']=7;
			$retData['errInfo']=$this->errorInfo['7'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getFriendsByUserId($userId)
	{
		$retData= array();
		$qryFriends = "SELECT * FROM v_friendsList WHERE userId=$userId";
		//echo $qryFriends;
		if ($resFriends=mysql_query($qryFriends,$this->link_identifier)) {
			$retData['success']=1;
			while ($rowFriends = mysql_fetch_array($resFriends,MYSQL_ASSOC)) {
				$retData['friendList'][]=$rowFriends;
			}
		} else {
			$retData['success']=0;
			$retData['errNo']=8;
			$retData['errInfo']=$this->errorInfo['8'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getComersByUserId($userId)
	{
		$retData= array();
		$qryFriends = "SELECT * FROM v_comeUser WHERE myId=$userId";
		//echo $qryFriends;
		if ($resFriends=mysql_query($qryFriends,$this->link_identifier)) {
			$retData['success']=1;
			while ($rowFriends = mysql_fetch_array($resFriends,MYSQL_ASSOC)) {
				$retData['comerList'][]=$rowFriends;
			}
		} else {
			$retData['success']=0;
			$retData['errNo']=9;
			$retData['errInfo']=$this->errorInfo['9'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getReacherByUserId($userId)
	{
		$retData= array();
		$qryFriends = "SELECT * FROM v_reachUser WHERE myId=$userId";
		//echo $qryFriends;
		if ($resFriends=mysql_query($qryFriends,$this->link_identifier)) {
			$retData['success']=1;
			while ($rowFriends = mysql_fetch_array($resFriends,MYSQL_ASSOC)) {
				$retData['reacherList'][]=$rowFriends;
			}
		} else {
			$retData['success']=0;
			$retData['errNo']=10;
			$retData['errInfo']=$this->errorInfo['10'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function notifyUser($userId,$doUserId)
	{
		$retData=array();
		$userDetail = $this->getUserDetailById($userId);
		
		if($userDetail['success']){
			$userName = $userDetail['userDetail']['nickName'];
			$title = '提醒您添加友好';
			$content = $userName.'来到您的心堡，希望和您做个好朋友，赶快添加他吧';
			$retData = $this->sendMessage($title, $content, $doUserId);
		} else {
			$retData['success']=0;
			$retData['errNo']=$userDetail['errNo'];
			$retData['errInfo']=$userDetail['errInfo'];
		}
		return $this->makeOutPut($retData);
	}

	public function getUserDetailById($userId){
		$retData = array();
		$qryUserDetail = "SELECT * FROM userInfo WHERE id=$userId";
		if ($resUserDetail=mysql_query($qryUserDetail,$this->link_identifier)) {
			$retData['success']=1;
			$rowUserDetail=mysql_fetch_assoc($resUserDetail);
			$retData['userDetail']=$rowUserDetail;
		} else {
			$retData['success']=0;
			$retData['errNo']=11;
			$retData['errInfo']=$this->errorInfo['11'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function delReacher($userId,$doUserId)
	{
		$retData = array();
		$qryDeleteReacher = "DELETE FROM friends WHERE userId=$userId AND friendId=$doUserId";
		if (mysql_query($qryDeleteReacher,$this->link_identifier)) {
			$retData['success']=1;
		} else {
			$retData['success']=0;
			$retData['errNo']=13;
			$retData['errInfo']=$this->errorInfo['13'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function addComer($userId,$doUserId)
	{
		$retData = array();
		$qryComer = "SELECT COUNT(*) FROM friends WHERE userId=$doUserId AND friendId=$userId";
		if($resComer = mysql_query($qryComer,$this->link_identifier)){
			$rowComer = mysql_fetch_row($resComer);
			if ($rowComer[0]) {
				$retData = $this->addFriend($userId,$doUserId);
				// $qryAddComer = "INSERT INTO friends(userId,friendId) VALUES($userId,$doUserId)";
				// if (mysql_query($qryAddComer,$this->link_identifier)) {
					// $retData['success']=1;
				// } else {
					// $retData['success']=0;
					// $retData['errNo']=7;
					// $retData['errInfo']=$this->errorInfo['7'];
				// }
			} else {
				$retData['success']=0;
				$retData['errNo']=14;
				$retData['errInfo']=$this->errorInfo['14'];
			}
		} else {
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function sendMessage($title,$content,$userId)
	{
		$retData = array();
		$addMessage = "INSERT INTO messages(title,content,userId,sendTime) VALUES('$title','$content',$userId,now());";
		if (mysql_query($addMessage,$this->link_identifier)) {
			$retData['success']=1;
		} else {
			$retData['success']=0;
			$retData['errNo']=12;
			$retData['errInfo']=$this->errInfo['12'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function sendRefuseMessage($userId,$doUserId)
	{
		$retData=array();
		$userDetail = $this->getUserDetailById($userId);
		
		if($userDetail['success']){
			$userName = $userDetail['userDetail']['nickName'];
			$title = '添加友好被拒绝';
			$content = $userName.'拒绝了您进入心堡，继续努力哦';
			$retData = $this->sendMessage($title, $content, $doUserId);
		} else {
			$retData['success']=0;
			$retData['errNo']=$userDetail['errNo'];
			$retData['errInfo']=$userDetail['errInfo'];
		}
		return $this->makeOutPut($retData);
	}
    
    public function getAllQuestionList()
    {
        $retData=array();
        $questionsList = "SELECT * FROM questions";
        if ($resQuestionsList=mysql_query($questionsList,$this->link_identifier)) {
            $retData['success']=1;
            while ($rowQuestionList=mysql_fetch_array($resQuestionsList,MYSQL_ASSOC)) {
                $retData['questionsList'][]=$rowQuestionList;
            }
        } else {
            $retData['success']=0;
            $retData['errNo']=3;
            $retData['errInfo']=$this->errInfo['3'];
        }
        return $this->makeOutPut($retData);
        
    }
}

?>