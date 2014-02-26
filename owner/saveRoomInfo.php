<?php
//header("Content-Type: application/json; charset=utf-8");
use DataControl\Connector\DataConnector;
$roomId = $_POST['roomId'];
$dealDate=$_POST['dealDate'];
$signDate=$_POST['signDate'];
$downPayment=$_POST['downPayment'];
$finalPayment=$_POST['finalPayment'];
$deedTax=$_POST['deedTax'];
$areaNo=$_POST['areaNo'];

include_once '../libs/DataControl/General.class.php';
include_once '../libs/DataControl/DataConnector.class.php';
$connect = new DataConnector();
$linkIdentifier = $connect->getLinkIdentifier();
$retData = array();
$retData = $_POST;
mysql_query("BEGIN");
$updRoomExtInfo = "UPDATE v_roomAndExtInfo SET dealDate='$dealDate',signDate='$signDate',downPayment=$downPayment,finalPayment=$finalPayment,deedTax=$deedTax WHERE roomId=$roomId";
$updRoomInfo = "UPDATE roomInfo SET  areaNo=$areaNo WHERE id=$roomId";
if (mysql_query($updRoomInfo,$linkIdentifier) && mysql_query($updRoomExtInfo,$linkIdentifier)) {
	mysql_query("COMMIT",$linkIdentifier);
	$retData['success']=1;
} else {
	mysql_query("ROLLBACK",$linkIdentifier);
	$retData['success']=0;
}

echo json_encode($retData);

