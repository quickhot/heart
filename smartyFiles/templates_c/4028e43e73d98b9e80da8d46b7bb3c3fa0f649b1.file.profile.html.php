<?php /* Smarty version Smarty-3.1.16, created on 2014-03-04 15:37:49
         compiled from "D:\ec_workspace\heart\smartyFiles\templates\profile.html" */ ?>
<?php /*%%SmartyHeaderCode:11639531570de346e28-39193261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4028e43e73d98b9e80da8d46b7bb3c3fa0f649b1' => 
    array (
      0 => 'D:\\ec_workspace\\heart\\smartyFiles\\templates\\profile.html',
      1 => 1393917494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11639531570de346e28-39193261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_531570de41c498_89521046',
  'variables' => 
  array (
    'message' => 0,
    'profile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531570de41c498_89521046')) {function content_531570de41c498_89521046($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>信息修改</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript">
	function modifyUser (userId) {
	    alert(userId);
		var city=$('#city option:selected').val();
		alert(city);
		var password = $('#password').val();
		alert(password);
		var nickName = $('#nickName').val();
		alert(nickName);
		
		$.ajaxFileUpload
		(
			{
				url:'doModifyProfile.php',
				secureuri:false,
				fileElementId:'picture',
				dataType: 'json',
				data:{
					city:city,
					password:password,
					nickName:nickName
					},
				success: function (data, status)
				{
					if(data.success == 1)
					{
						alert("提交成功");
						location.reload();
					} else {
						alert(data.errInfo);
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		);
		return false;
	}
</script>
</head>
<body>
<div id="message">
	<table border="1">
		<tr>
			<td>标题</td>
			<td>内容</td>
		</tr>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['mess'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['name'] = 'mess';
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['message']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['mess']['total']);
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mess']['index']]['title'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value[$_smarty_tpl->getVariable('smarty')->value['section']['mess']['index']]['content'];?>
</td>
		</tr>
		<?php endfor; endif; ?>
	</table>
</div>
<br />
<br />
<div id="profile">
	<span>账号：<?php echo $_smarty_tpl->tpl_vars['profile']->value['loginName'];?>
</span><br />
	<span>密码：<input type="password" id="password" value="" />留空不修改</span><br />
	<span>昵称：<input type="text" id="nickName" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value['nickName'];?>
" /></span><br />
	<span>等级：</span><?php echo $_smarty_tpl->tpl_vars['profile']->value['rank'];?>
<br />
	<span>鲜花：<?php echo $_smarty_tpl->tpl_vars['profile']->value['flowers'];?>
</span><br />
	<span>头像：
		<img src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['picture'];?>
"><br />
		<input type="file" id="picture" name="picture[]" /></span><br />
	<span>城市：</span><select id="city">
		<option value="010" <?php if ($_smarty_tpl->tpl_vars['profile']->value['city']=="010") {?> selected="selected" <?php }?> >北京</option>
		<option value="022" <?php if ($_smarty_tpl->tpl_vars['profile']->value['city']=="022") {?> selected="selected" <?php }?> >天津</option>
		<option value="021" <?php if ($_smarty_tpl->tpl_vars['profile']->value['city']=="021") {?> selected="selected" <?php }?> >上海</option>
	</select><br />
	<span>经验：<?php echo $_smarty_tpl->tpl_vars['profile']->value['score'];?>
</span><br />
	<a href="javascript:void(0);" onclick="modifyUser(<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
);">修改</a>
</div>
<div id="footer">
	<a href="index.php">返回</a>
</div>
</body>
</html><?php }} ?>
