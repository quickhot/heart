<?php /* Smarty version Smarty-3.1.16, created on 2014-02-27 16:12:14
         compiled from "D:\ec_workspace\heart\smartyFiles\templates\friends.html" */ ?>
<?php /*%%SmartyHeaderCode:13581530eb6476502a2-43189133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d92b82dd2331b36bb223bb62f42b4a0fce49cf2' => 
    array (
      0 => 'D:\\ec_workspace\\heart\\smartyFiles\\templates\\friends.html',
      1 => 1393488720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13581530eb6476502a2-43189133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530eb64782afb4_45333478',
  'variables' => 
  array (
    'friends' => 0,
    'reachers' => 0,
    'comers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530eb64782afb4_45333478')) {function content_530eb64782afb4_45333478($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Cache-control" content="no-cache">

<title>Friends</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<div id="friends">
<p>好友列表：</p>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['friend'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['name'] = 'friend';
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['friends']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['friend']['total']);
?>
<span><img src='<?php echo $_smarty_tpl->tpl_vars['friends']->value[$_smarty_tpl->getVariable('smarty')->value['section']['friend']['index']]['picture'];?>
' /><a><?php echo $_smarty_tpl->tpl_vars['friends']->value[$_smarty_tpl->getVariable('smarty')->value['section']['friend']['index']]['nickName'];?>
</a></span>
<?php endfor; endif; ?>
</div>
<div id="reachers">
<p>我感兴趣的：</p>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['name'] = 'reacher';
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['reachers']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['reacher']['total']);
?>
<span><img src='<?php echo $_smarty_tpl->tpl_vars['reachers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reacher']['index']]['picture'];?>
' /><a><?php echo $_smarty_tpl->tpl_vars['reachers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reacher']['index']]['nickName'];?>
</a>
	<a href="javascript:void(0);" onclick="javascript:doAction(<?php echo $_smarty_tpl->tpl_vars['reachers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reacher']['index']]['reachId'];?>
,'notify');">--提醒|</a>
	<a href="javascript:void(0);" onclick="javascript:doAction(<?php echo $_smarty_tpl->tpl_vars['reachers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['reacher']['index']]['reachId'];?>
,'delete');">删除</a><br></span>
<?php endfor; endif; ?>
</div>
<div id="comers">
<p>新来的朋友：</p>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['comer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['name'] = 'comer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['comers']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['comer']['total']);
?>
<span><img src='<?php echo $_smarty_tpl->tpl_vars['comers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['comer']['index']]['picture'];?>
' /><a><?php echo $_smarty_tpl->tpl_vars['comers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['comer']['index']]['nickName'];?>
</a>
	<a href="javascript:void(0);" onclick="javascript:doAction(<?php echo $_smarty_tpl->tpl_vars['comers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['comer']['index']]['comeUserId'];?>
,'add');">--添加|</a>
	<a href="javascript:void(0);" onclick="javascript:doAction(<?php echo $_smarty_tpl->tpl_vars['comers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['comer']['index']]['comeUserId'];?>
,'refuse');">拒绝</a></span>
<?php endfor; endif; ?>
</div>
<script type="text/javascript">
function doAction(userId,action){
	//alert(notiUserId);
	$.ajax({
			type:"POST",
			url:"friendAction.php",
			data:{
				userId:userId,
				action:action
			},
			dataType:"json",
			success:function(retData,textStatus){
				//alert(retData);
				if(retData.success){
					alert("操作成功");
					location.reload();
				} else {
					alert(retData.errInfo);
				}
			},
			complete:function(){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
}
</script>
</body>
</html><?php }} ?>
