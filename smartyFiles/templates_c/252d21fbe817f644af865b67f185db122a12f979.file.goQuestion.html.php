<?php /* Smarty version Smarty-3.1.16, created on 2014-03-03 18:39:33
         compiled from "D:\ec_workspace\heart\smartyFiles\templates\goQuestion.html" */ ?>
<?php /*%%SmartyHeaderCode:2754953145be5415485-10941860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '252d21fbe817f644af865b67f185db122a12f979' => 
    array (
      0 => 'D:\\ec_workspace\\heart\\smartyFiles\\templates\\goQuestion.html',
      1 => 1393299244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2754953145be5415485-10941860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nowQuestion' => 0,
    'nowQuesId' => 0,
    'quesUserId' => 0,
    'nowAnswer' => 0,
    'lastQuestion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53145be54b3c19_59824456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53145be54b3c19_59824456')) {function content_53145be54b3c19_59824456($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>心路历程</title>
</head>
<body>
<form method="post" action="goQuestion.php">
<div>
	<p><?php echo $_smarty_tpl->tpl_vars['nowQuestion']->value;?>
</p>
	<input type="hidden" name="nowQuesId" value="<?php echo $_smarty_tpl->tpl_vars['nowQuesId']->value;?>
" />
	<input type="hidden" name="quesUserId" value="<?php echo $_smarty_tpl->tpl_vars['quesUserId']->value;?>
" />
	<input type="hidden" name="firstQuestion" value="1" />
	<input type="radio" value="A" id="b" name="answer"><?php echo $_smarty_tpl->tpl_vars['nowAnswer']->value['A'];?>
</input><br />
	<input type="radio" value="B" id="b" name="answer"><?php echo $_smarty_tpl->tpl_vars['nowAnswer']->value['B'];?>
</input><br />
	<input type="radio" value="C" id="b" name="answer"><?php echo $_smarty_tpl->tpl_vars['nowAnswer']->value['C'];?>
</input><br />
	<input type="radio" value="D" id="b" name="answer"><?php echo $_smarty_tpl->tpl_vars['nowAnswer']->value['D'];?>
</input><br />
	<input type="submit" />
</div>
</form>
<div>
	<p>其他问题：</p>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['name'] = 'questionList';
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['lastQuestion']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['questionList']['total']);
?>
	<span><img src="<?php echo $_smarty_tpl->tpl_vars['lastQuestion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['questionList']['index']]['picture'];?>
" /><br />
	<a  href="?quesUserId=<?php echo $_smarty_tpl->tpl_vars['quesUserId']->value;?>
&quesQues=<?php echo $_smarty_tpl->tpl_vars['lastQuestion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['questionList']['index']]['questionId'];?>
"><?php echo $_smarty_tpl->tpl_vars['lastQuestion']->value[$_smarty_tpl->getVariable('smarty')->value['section']['questionList']['index']]['question'];?>
</a>
	</span>
	<?php endfor; endif; ?>
</div>

</body>
</html><?php }} ?>
