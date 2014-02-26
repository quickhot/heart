<?php
//header("Content-Type: application/json; charset=utf-8");
use DataControl\Connector\DataConnector;
$userId=$_POST['userId'];
include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
$connect = new DataConnector();
$linkIdentifier = $connect->getLinkIdentifier();
$retData = array();
$qryMobile = "DELETE FROM userInfo WHERE id='$userId'"; //查询此手机号是不是在表中
if ($resMobile=mysql_query($qryMobile,$linkIdentifier)) {//查询成功
	$retData['success']=1;
} else {//查询失败
	$retData['success']=0;
}
echo json_encode($retData);
