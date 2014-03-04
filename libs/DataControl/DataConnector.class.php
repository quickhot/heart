<?php

namespace DataControl\Connector;
use DataControl\General\General;
//TODO: change database connection
class DataConnector extends General{
	private $DB_HOST = '192.168.2.250';
	private $DB_USER = 'root';
	private $DB_PASS = '123456';
	private $DB_NAME = 'heart';
	public $link_identifier;
	
	function __construct($dbHost=NULL, $dbName=NULL, $dbUser=NULL, $dbPass=NULL) { // 构造函数，创建数据库连接
		if (!isset($dbHost)) $dbHost=$this->DB_HOST;
		if (!isset($dbName)) $dbName=$this->DB_NAME;
		if (!isset($dbUser)) $dbUser=$this->DB_USER;
		if (!isset($dbPass)) $dbPass=$this->DB_PASS;
		
		if (($link_identifier = mysql_connect ( $dbHost, $dbUser, $dbPass )) !== false) {
			mysql_query ( 'SET NAMES utf8' );
			if (! mysql_select_db ( $dbName, $link_identifier )) {
				throw new Exception ( null, "1" );
			} else $this->link_identifier=$link_identifier;
		} else {
			throw new Exception (null, "2" );
		}
	}
	
	public function startTransAction(){
		mysql_query('BEGIN',$this->link_identifier);
	}
	
	public function commit(){
		mysql_query('COMMIT',$this->link_identifier);
	}
	
	public function rollback(){
		mysql_query('ROLLBACK',$this->link_identifier);
	}
	
	public function getLinkIdentifier(){
		return $this->link_identifier;
	}
	
	function __destruct() {
		mysql_close ( $this->link_identifier );
	}
	
	/**
	 * 更新表操作
	 * @param unknown $tableName
	 * @param unknown $arrUserInfo
	 * @param unknown $arrCondition
	 * @return multitype:number string
	 */
	public function updateTable($tableName,$arrUserInfo,$arrCondition) {
		$firstComma=1;
		$updSet='';
		foreach ($arrUserInfo as $key => $value) {
			if (!$firstComma) {
				$updSet=$updSet.',';
			}
			$firstComma=0;
			$updSet = $updSet."$key='$value'";
		}
		$updWhere="1=1";
		foreach ($arrCondition as $key => $value) {
			$updWhere=$updWhere." AND $key='$value'";
		}
		$qryUpd = "UPDATE $tableName SET $updSet WHERE $updWhere";
		$retData = array();
		if (mysql_query($qryUpd,$this->link_identifier)) {
			$retData["success"]=1;
		} else {
			$retData["success"]=0;
			$retData ['errNo'] = 5;
			$retData ['errInfo'] = $this->errorInfo ['5']."\n系统：".mysql_error($this->link_identifier);
		}
		return $retData;
	}
}