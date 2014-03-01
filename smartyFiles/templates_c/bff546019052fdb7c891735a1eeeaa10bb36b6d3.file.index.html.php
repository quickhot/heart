<?php /* Smarty version Smarty-3.1.16, created on 2014-02-27 15:46:21
         compiled from "D:\ec_workspace\heart\smartyFiles\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10963530eed4d831057-71141253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bff546019052fdb7c891735a1eeeaa10bb36b6d3' => 
    array (
      0 => 'D:\\ec_workspace\\heart\\smartyFiles\\templates\\index.html',
      1 => 1393404035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10963530eed4d831057-71141253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userDetail' => 0,
    'recommendList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530eed4d892f97_94121747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530eed4d892f97_94121747')) {function content_530eed4d892f97_94121747($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="JavaScript" type="text/javascript">
</script>
</head>
<body>
<div class="my" id="my">
<img src="<?php echo $_smarty_tpl->tpl_vars['userDetail']->value['picture'];?>
"  id="myPic"/>
<p>昵称：<?php echo $_smarty_tpl->tpl_vars['userDetail']->value['nickName'];?>
</p>
<p>等级：<?php echo $_smarty_tpl->tpl_vars['userDetail']->value['rank'];?>
</p>
<p>鲜花：<?php echo $_smarty_tpl->tpl_vars['userDetail']->value['flowers'];?>
</p>
<a href='friends.php'>好友</a>
<a href=''>心堡</a>
</div>
<div class="others" id="others">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['user'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['name'] = 'user';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['recommendList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total']);
?>
<span><img src="<?php echo $_smarty_tpl->tpl_vars['recommendList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['picture'];?>
" id="otherPic"/></span><br />
<span><a href="goQuestion.php?quesUserId=<?php echo $_smarty_tpl->tpl_vars['recommendList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['recommendList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['firstQuestion'];?>
</a></span><br /><br />
<?php endfor; endif; ?>

</div>
</body>
</html>
<?php }} ?>
