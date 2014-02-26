<?php

namespace DataControl;

use DataControl\Connector\DataConnector;

class Rooms extends DataConnector {
	
	public function getRoomListByESId($ESId) {
		$retData = array();
		$qryRoom = "SELECT roomId,roomName,gardenName,buildingNo,doorNo,floorNo,roomNo FROM roomNameView WHERE ESId=$ESId";
		if ($res=mysql_query($qryRoom,$this->link_identifier)) {
			$retData['success']=1;
			while ($rowRoom=mysql_fetch_array($res,MYSQL_ASSOC)) {
				$retData['roomNameView'][]=$rowRoom;
			}
		} else {
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getRoomEXTByRoomId($roomId) {
		$retData=array();
		$qryRoomEXT = "SELECT * FROM roomExtInfo WHERE roomId=$roomId";
		if ($resRoomEXT=mysql_query($qryRoomEXT,$this->link_identifier)) {
			$rowRoomEXT = mysql_fetch_array($resRoomEXT,MYSQL_ASSOC);
			$retData['success']=1;
			$retData['oneRoomEXT']=$rowRoomEXT;
		} else {//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getRoomInfoByRoomId($roomId) {
		$retData=array();
		$qryRoomInfo = "SELECT * FROM roomInfo WHERE id=$roomId";
		if ($resRoomInfo=mysql_query($qryRoomInfo,$this->link_identifier)) {
			$rowRoomInfo = mysql_fetch_array($resRoomInfo,MYSQL_ASSOC);
			$retData['success']=1;
			$retData['oneRoomInfo']=$rowRoomInfo;
		} else {//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function getAllRoomInfoByESId($ESId){
		$retData=array();
		$qryAll = "SELECT * FROM v_roomAndExtInfo WHERE ESId=$ESId";
		if ($resAll=mysql_query($qryAll,$this->link_identifier)) {
			while ($rowAll = mysql_fetch_array($resAll,MYSQL_ASSOC)) {
				$retData['roomList'][]=$rowAll;
			}
			$retData['success']=1;
		} else {//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
		return $this->makeOutPut($retData);
	}
	
	public function checkRoomIfExist($gardenName,$buildingNo,$doorNo,$floorNo,$roomNo) {
		$retData =array();
		$qryRoomExist = "SELECT id FROM roomInfo WHERE gardenName='$gardenName' AND buildingNo=$buildingNo AND doorNo=$doorNo AND floorNo=$floorNo AND roomNo=$roomNo";
		if(($resRoomExist = mysql_query($qryRoomExist))!==false){//查询成功
			$rowRoomExist = mysql_fetch_row($resRoomExist);
			$roomExist = $rowRoomExist[0];
			
		} else {//查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}
	}
	
}

?>