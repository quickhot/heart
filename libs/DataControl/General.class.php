<?php

namespace DataControl\General;

class General {
	public $errorInfo = array (
			'1' => '用户或密码不正确',
			'2' => '该用户没有设置心堡历程',
			'3' => '数据库查询失败',
			'4'=> '插入数据失败',
			'5'=>'更新表失败',
			'6'=>'删除用户数据失败',
			'7'=>'添加好友失败',
			'8'=>'查询好友失败',
			'9'=>'查询到达您心堡用户失败',
			'10'=>'查询您到的心堡用户失败',
			'11'=>'查询用户资料失败',
			'12'=>'发送用户消息失败',
			'13'=>'删除好友失败',
			'14'=>'该用户已经放弃添加您为好友，添加失败'
	);
	
	/**
	 * 输出数据，根据输出类型，进行返回
	 * 
	 * @param unknown $data        	
	 * @param string $type
	 *        	JSON,XML,JSONP
	 *        	type为空时，按数据原有格式返回
	 */
	public function makeOutPut($data, $type = '') {
		switch (strtoupper ( $type )) {
			case 'JSON' :
				// 返回JSON数据格式到客户端 包含状态信息
				header ( 'Content-Type:application/json; charset=utf-8' );
				return json_encode ( $data );
			case 'XML' :
				// 返回xml格式数据
				header ( 'Content-Type:text/xml; charset=utf-8' );
				return xml_encode ( $data );
			case 'JSONP' :
				// 返回JSON数据格式到客户端 包含状态信息
				header ( 'Content-Type:application/json; charset=utf-8' );
				$handler = isset ( $_GET [C ( 'VAR_JSONP_HANDLER' )] ) ? $_GET [C ( 'VAR_JSONP_HANDLER' )] : C ( 'DEFAULT_JSONP_HANDLER' );
				return $handler . '(' . json_encode ( $data ) . ');';
			case 'EVAL' :
				// 返回可执行的js脚本
				header ( 'Content-Type:text/html; charset=utf-8' );
				return $data;
			default :
				// 原样返回
				return $data;
		}
	}
	
	public function jsAlert($string){
		echo "<script type=\"text/javascript\">";
		echo "alert(\"$string\")";
		echo "</script>";
	}
}