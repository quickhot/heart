<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/css.css" />

<title>登陆</title>
<script language="javascript" src="js/jquery.min.js"></script>
<script>
$(function(){
	$('#uname').blur(function(){
		$(".ico-user").css("background-image","url(images/ico-user.png)");
		if($(this).val()==""){
			$('#msg').html("<img src='images/no.png' width='10' height='10' align='absbottom'> 用户名不能为空");
			return false;
		}
		else{
			$('#msg').html(" ");
		}
	});
	$('#pwd').blur(function(){
		$(".ico-pwd").css("background-image","url(images/ico-pwd.png)");
		if($(this).val()==""){
			$('#msg1').html("<img src='images/no.png' width='10' height='10' align='absbottom'> 密码不能为空");
			return false;
		}
		else{
			$('#msg1').html(" ");
		}
	});
	$("#forget").click(function(){
		$("#msg2").toggle();
	});
	$('.submit').click(function(){
		if($('#uname').val()==""){
			$('#msg').html("<img src='images/no.png' width='10' height='10' align='absbottom'> 用户名不能为空");
			return false;
		}
		if($('#pwd').val()==""){
			$('#msg1').html("<img src='images/no.png' width='10' height='10' align='absbottom'> 密码不能为空");
			return false;
		}
	});
	
	$("#uname").focus(function(){
		$(".ico-user").css("background-image","url(images/ico-user1.png)");
	});
	$("#pwd").focus(function(){
		$(".ico-pwd").css("background-image","url(images/ico-pwd1.png)");
	});
});
</script>
</head>
<body bgcolor="#f2f2f2">
<?php
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
include_once './libs/DataControl/Users.class.php';

use DataControl\Users;

$logined = 0;
$inputName = $_POST ['uname'];
$inputPass = $_POST ['pwd'];

session_start ();

// echo $inputName."<br />".$inputPass;
if ($inputName && $inputPass) {
	$user = new Users();
	$output = $user->userLogin( $inputName, $inputPass );
}

//var_dump($output);

if ($output ['success']) {
	$_SESSION ['userId'] = $output ['userDetail']['id'];
	$_SESSION['userDetail']=$output['userDetail'];
	$logined = 1;
}
if ($_SESSION ['userId']) {
	$logined = 1;
}
if ($logined == 0) {
	?>
<div class="login">
		<div class="login-logo"></div>
		<div class="login-title">用户登录</div>
		<form action="login.php" method="post" name="checklogin">
			<div class="txt">
				<input type="text" class="txt-1 ico-user" name="uname" id="uname" /><span
					id="msg" class="tips">
   	</span>
			</div>
			<div class="txt">
				<input type="password" class="txt-1 ico-pwd" name="pwd" id="pwd" /><span
					id="msg1" class="tips">
    <?php if ($output['errNo']==1) echo "<img src='images/no.png' width='10' height='10' align='absbottom'> ".$output['errInfo'];?>
    </span>
			</div>
			<div class="txt">
				<span><a href="#" id="forget">忘记密码?</a></span><input type="submit"
					class="submit" value="登陆" />
			</div>
			<span id="msg2" class="tips">用户您好,为确保数据安全,密码保护程度较高,请致电<strong>58513589</strong>核实身份后,由技术人员修改。
			</span>
		</form>
	</div>
<?php
} else {
		echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>";
}
?>
</body>
</html>
