<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户管理</title>
<link href="../css/global.css" type="text/css" rel="stylesheet"/>
<link href="../css/right.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="right">
<p class="word">问题管理</p>
<div class="tablelist" style="width:764px">
<?php
use DataControl\Connector\DataConnector;
include_once './libs/DataControl/General.class.php';
include_once './libs/DataControl/DataConnector.class.php';
$conn = new DataConnector();
$link = $conn->link_identifier;
$thisUrl = $_SERVER['PHP_SELF'];

$do		=$_GET['do'];
$doQuesId	=$_GET['id'];
$iflogin=2;
session_start();
if ($do=='logout') {
	if(session_destroy()){
		echo "<script language='javascript' type='text/javascript'>window.open('login.php');</script>";
	} else echo "退出登录失败，请重试!";
	exit();
}

if ($_SESSION['userId']==2) {

?>

<div class="tit titbar titcor"><span>配置问题</span></div>
<table class="table1" cellpadding="0" cellspacing="0" border="1" style="width:764px">
  <tr>
  	<td align="center" bgcolor="#FFFFFF">编号</td>
    <td align="center" bgcolor="#FFFFFF">问题内容</td>
    <td align="center" bgcolor="#FFFFFF">答案A</td>
    <td align="center" bgcolor="#FFFFFF">答案B</td>		
    <td align="center" bgcolor="#FFFFFF">答案C</td>
    <td align="center" bgcolor="#FFFFFF">答案D</td>
  </tr>
<?php
	
	
	if ($do=='edit') {
		$question	=$_POST['question'];
		$answerA	=$_POST['answerA'];
		$answerB	=$_POST['answerB'];
		$answerC	=$_POST['answerC'];
		$answerD	=$_POST['answerD'];

		$query	= "UPDATE questions SET `question`='$question',A='$answerA',B='$answerB',C='$answerC',D='$answerD' WHERE id='$doQuesId'";
		if (!mysql_query($query)) echo "修改失败"; else echo "修改成功"; 
	}
	
	if ($do=='delete') {
		$query = "DELETE FROM questions WHERE id='$doQuesId'";
		//echo $query;
		if (!mysql_query($query)) echo "删除失败"; else echo "删除成功";
	}
	
	if ($do=='add'){
		$question	=$_POST['question'];
		$answerA	=$_POST['answerA'];
		$answerB	=$_POST['answerB'];
		$answerC	=$_POST['answerC'];
		$answerD	=$_POST['answerD'];
		$query	="INSERT INTO questions(question,A,B,C,D) VALUES('$question','$answerA','$answerB','$answerC','$answerD')";
		if (!mysql_query($query)) echo "问题加入失败"; else echo "添加成功";
	}
	
	$query		= "SELECT * FROM questions";
	$result		= mysql_query($query);
	while ($row	= mysql_fetch_array($result)) {
		$id = $row['id'];
		$question = $row['question'];
		$answerA = $row['A'];
		$answerB = $row['B'];
		$answerC = $row['C'];
		$answerD = $row['D'];
		if ($do=='modify' && $id==$doQuesId){
		?>
		<form enctype="multipart/form-data" method="post" action="<?php echo $thisUrl;?>?do=edit&id=<?php echo $id;?>">
		  <tr>
		  	<td bgcolor="#FFFFFF"><?php echo $id;?></td>
		    <td bgcolor="#FFFFFF"><input type="text" name="question" value="<?php echo $question;?>" /></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerA" value="<?php echo $answerA;?>"/></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerB" value="<?php echo $answerB;?>"/></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerC" value="<?php echo $answerC;?>"/></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerD" value="<?php echo $answerD;?>"/></td>
			<td align="center" bgcolor="#FFFFFF"><input type="submit" value="提交" name="submit"><input type="button" value="取消" name="cancel" onClick="history.back();" /></td>
		  </tr>
		</form>
		<?php	
		} else {
	?>
	<tr>
    	<td bgcolor="#FFFFFF"><?php echo $id;?></td>
		<td bgcolor="#FFFFFF"><?php echo $question;?></td>
		<td bgcolor="#FFFFFF"><?php echo $answerA;?></td>
		<td bgcolor="#FFFFFF"><?php echo $answerB;?></td>
		<td bgcolor="#FFFFFF"><?php echo $answerC;?></td>
		<td bgcolor="#FFFFFF"><?php echo $answerD;?></td>
		<td align="center" bgcolor="#FFFFFF"><a href="<?php echo $thisUrl;?>?do=modify&id=<?php echo $id;?>">修改</a> | <a href="<?php echo $thisUrl;?>?do=delete&id=<?php echo $id;?>">删除</a></td>
	</tr>
	<?php
		}
	}
	if($do=='new'){
		?>
		<form enctype="multipart/form-data" method="post" action="<?php echo $thisUrl;?>?do=add">
		<tr>
			<td bgcolor="#FFFFFF">不填</td>
		    <td bgcolor="#FFFFFF"><input type="text" name="question" /></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerA" /></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerB" /></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerC" /></td>
			<td bgcolor="#FFFFFF"><input type="text" name="answerD" /></td>
			<td align="center" bgcolor="#FFFFFF"><input type="submit" value="提交" name="submit"><input type="button" value="取消" name="cancel" onClick="history.back();" /></td>
		</tr>
		</form>
		  <?php
	} else echo "<tr><td colspan='4' align='right'><a href='$thisUrl?do=new'>添加一行</a></td></tr>";
	?>
	</table>

	<?php 	
} else {
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('为了安全，请您登录');";
	echo "location.href='login.php';";
	echo "</script>";	
}
?>
</div>
</div>
</body>
</html>