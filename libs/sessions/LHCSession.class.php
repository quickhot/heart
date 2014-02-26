<?php

namespace Sessions;

class LHCSession {
	private $adminId;
	private $estateId;
	/**
	 * 构造函数，如果有sessionId那么就置session，否则新建一个
	 */
	function __construct($sessionId = '') {
		if ($sessionId != '') { // 是否传送了session id
			$this->sessionId = $sessionId;
			session_id ( $sessionId );
			session_start ();
			if (isset ( $_SESSION ['adminId'] )) { // session正确
				$this->adminId = $_SESSION ['adminId'];
				$this->estateId = $_SESSION ['estateId'];
			} else {
				session_destroy ();
				throw new Exception ( null, '4' );
			}
		} else { // 没有传送session id，那么就生成一个新的。
			session_start ();
			session_destroy ();
			session_start ();
			session_regenerate_id ( true );
			$this->sessionId = session_id ();
		}
	}
	public function getAdminId() {
		return $this->adminId;
	}
	public function setAdminId($adminId) {
		$_SESSION ['adminId'] = $adminId;
		$this->adminId = $adminId;
		return $this;
	}
	public function getEstateId() {
		return $this->estateId;
	}
	public function setEstateId($estateId) {
		$_SESSION ['estateId'] = $estateId;
		$this->estateId = $estateId;
		return $this;
	}
	public function destroy() {
		session_destroy ();
	}
	
	// php执行完毕的时候都会执行这个，所以要保留session的话，就不要在这里把session毁掉
	public function __destruct() {
		// session_destroy();
	}
}