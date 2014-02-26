<?php
namespace DataControl\Admin;

use DataControl\Connector\DataConnector;

class Admin extends DataConnector{
	
	/**
	 * 根据登用管理员用户名和密码，返回响应数据
	 * @param unknown $inputName
	 * @param unknown $inputPass
	 * @return Ambigous <string, unknown>
	 * array('success'=>0|1,'errNo'=>1|2|3,'errInfo'='用户名不存在|密码不正确|数据查询失败')
	 */
	public function adminLogin($inputName,$inputPass){
		$retData = array();
		$qryAdminLogin = "SELECT id,adminName,adminPass,`level` FROM admin WHERE adminName='$inputName'";
		if (!$retAdminLogin=mysql_query($qryAdminLogin,$this->link_identifier)) {//如果查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		} else { //查询成功
			$rowAdminLogin = mysql_fetch_row($retAdminLogin);
			$adminPass = $rowAdminLogin[2];
			if (!$adminPass) { //用户名不存在
				$retData['success']=0;
				$retData['errNo']=1;
				$retData['errInfo']=$this->errorInfo['1'];
			} else {//用户名存在
				if (md5($inputPass)==$adminPass) {//密码正确
					$retData['success']=1;
					$retData['adminId']=$rowAdminLogin[0];
					$retData['adminName']=$rowAdminLogin[1];
					$retData['adminLevel']=$rowAdminLogin[3];
				} else {//密码错误
					$retData['success']=0;
					$retData['errNo']=2;
					$retData['errInfo']=$this->errorInfo['2'];
				}
			}
		}
		return $this->makeOutPut($retData);
	}
	/**
	 * 通过adminId获取权限
	 * @param unknown $adminId
	 * @return Ambigous <string, unknown>
	 */
	public function adminRights($adminId){
		$retData=array();
		//$qryRights = "SELECT DISTINCT(parName),parent_id FROM permissionInfoView WHERE adminId=$adminId ORDER BY parent_id";
		$qryRights = "SELECT DISTINCT(menu.`id`),menu.`name`,permissionInfoView.`adminId` FROM menu LEFT JOIN permissionInfoView ON permissionInfoView.parent_id=menu.id AND permissionInfoView.`adminId`=$adminId WHERE menu.parent_id=0";
		if (!$resRight=mysql_query($qryRights,$this->link_identifier)) { //查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		} else {//查询成功
			$retData['success']=1;
			//var_dump($resRight);
			while ($rowRight=mysql_fetch_array($resRight,MYSQL_ASSOC)){
				$retData['rights'][]=$rowRight;
			}
		}
		return $this->makeOutPut($retData);
	}
	
	/**
	 * 通过adminId获取estateInfo的信息
	 * @param int $adminId
	 * 
	 */
	public function getEstateInfoByAdminId($adminId){
		$retDate=array();
		$qryEstateInfo = "SELECT estateInfo.* FROM estateInfo LEFT JOIN admin ON estateInfo.`id`=admin.`ESId` WHERE admin.id=$adminId";
		if (!$resEstateInfo=mysql_query($qryEstateInfo,$this->link_identifier)) { //查询失败
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		} else {//查询成功
			$retData['success']=1;
			$retData['estateInfo']=mysql_fetch_assoc($resEstateInfo);
		}
		return $this->makeOutPut($retData);
	}

	/**
	 * 通过ESId获得所有管理员信息
	 * BY Nico
	 * @param int $ESId
	 * @return Ambigous <string, unknown>
	 */
	public function getAllAdmin($ESId){
		$sql = "SELECT `id`,`adminName`,`level` FROM `admin` WHERE `ESId`=$ESId ORDER BY `level` DESC";
		if(!$query = mysql_query($sql,$this->link_identifier)){
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}else{
			while ($allAdmin = mysql_fetch_assoc($query)){
				$retData[] = $allAdmin;
			}
		}
		return $this->makeOutPut($retData);
	}
	
	/**
	 * 获取所有菜单
	 * BY Nico
	 */
	public function getAllMenu(){
		if(!$query = mysql_query("SELECT `id`,`name`,`parName` FROM `v_listMenus`",$this->link_identifier)){
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}else{
			while ($allMenu = mysql_fetch_assoc($query)){
				$retData[$allMenu['parName']][$allMenu['id']] = $allMenu['name'];
			}
		}
		return $this->makeOutPut($retData);
	}
	
	/**
	 * 获取管理员权限
	 * BY Nico
	 * @param int $adminId
	 * @return Ambigous <string, unknown>
	 */
	public function adminAccess($adminId){
		$sql = "SELECT `menuId` FROM `accessControl` WHERE `adminId`=$adminId";
		if(!$query = mysql_query($sql,$this->link_identifier)){
			$retData['success']=0;
			$retData['errNo']=3;
			$retData['errInfo']=$this->errorInfo['3'];
		}else{
			while ($allAdmin = mysql_fetch_row($query)){
				$retData[] = $allAdmin;
			}
		}
		return $this->makeOutPut($retData);
	}
	
	/**
	 * 修改管理员密码
	 * BY Nico
	 * @param unknown $adminId
	 * @param unknown $superPassword
	 * @return Ambigous <\DataControl\Connector\multitype:number, multitype:number string >
	 */
	public function edtPassword($adminId,$password){
		$setfiled['adminPass'] = $password;
		$condition['id'] = $adminId;
		return $this->updateTable('admin', $setfiled, $condition);
	}
	
	public function addAdmin($ESId,$adminCount,$adminPassword,$access){
		$password = md5($adminPassword);
		$sql = "INSERT INTO `admin`(`ESId`,`adminName`,`adminPass`,`level`) VALUES ($ESId,'$adminCount','$password',0)";
		if(mysql_query($sql,$this->link_identifier)){
			$adminId = mysql_insert_id($this->link_identifier);
			if(count($access)){
				foreach ($access AS $value){
					$accessSql .= "($adminId,$value),";
				}
				$accessSql = "INSERT INTO `accessControl`(`adminId`,`menuId`) VALUES ".rtrim($accessSql,',');
				if(!mysql_query($accessSql,$this->link_identifier)){
					$res['success'] = 3;
				}
			}
			$res['adminId'] = $adminId;
			$res['adminName'] = $adminCount;
			$res['success'] = 1;
		}else {
			$res['success'] = 2;
		}
		return $res;
	}
	
	/**
	 * 修改普通管理员权限，账号密码
	 * BY Nico
	 * @param unknown $adminId
	 * @param unknown $access
	 * @param unknown $adminCount
	 * @param string $adminPassword
	 * @return 1:操作成功;2:账号重名;3:数据库操作失败
	 */
	public function edtAdminAccess($adminId,$access,$adminCount,$adminPassword = ''){
		if($adminPassword){
			$password = md5($adminPassword);
			$sql = "UPDATE `admin` SET `adminName`='$adminCount',`adminPass`='$password' WHERE `id`=$adminId";
			if(!mysql_query($sql,$this->link_identifier)){
				return 2;
			}
		}
		try{
			$this->startTransAction();
			mysql_query("DELETE FROM `accessControl` WHERE `adminId`=$adminId;",$this->link_identifier);
			if(count($access)){
				foreach ($access AS $value){
					$accessSql .= "($adminId,$value),";
				}
				$accessSql = "INSERT INTO `accessControl`(`adminId`,`menuId`) VALUES ".rtrim($accessSql,',');
				mysql_query($accessSql,$this->link_identifier);
			}
			$this -> commit();
		}catch(Exception $e){
			$this -> rollBack();
			return 3;
		}
		return 1;
	}
	
	public function delAdmin($adminId){
		$sql = "DELETE FROM `admin` WHERE id=$adminId";
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}
	}
}