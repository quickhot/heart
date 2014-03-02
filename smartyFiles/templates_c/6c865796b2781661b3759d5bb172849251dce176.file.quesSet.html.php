<?php /* Smarty version Smarty-3.1.16, created on 2014-03-03 00:48:14
         compiled from "/Users/wangjin/git/heart/smartyFiles/templates/quesSet.html" */ ?>
<?php /*%%SmartyHeaderCode:492210226531347a6969169-60731800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c865796b2781661b3759d5bb172849251dce176' => 
    array (
      0 => '/Users/wangjin/git/heart/smartyFiles/templates/quesSet.html',
      1 => 1393778887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '492210226531347a6969169-60731800',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_531347a6a45361_34871459',
  'variables' => 
  array (
    'questionsList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531347a6a45361_34871459')) {function content_531347a6a45361_34871459($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>New Web Project</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajaxfileupload.js"></script>
        <script type="text/javascript" language="JavaScript">
        	function doUpload(){
        		var questionId;
        		var questionIds=document.getElementsByName("selQues");
        		
        		for(var i=0;i<questionIds.length;i++){
        			if(questionIds[i].checked) {
        				questionId = questionIds[i].value;
        				//alert(questionId);
        				}
        			}
        		//alert(questionId);
        		var selAnswer=$('#sel_'+questionId+' option:selected') .val();
        		
        		$.ajaxFileUpload
				(
					{
						url:'doajaxfileupload.php',
						secureuri:false,
						fileElementId:'questionPicture',
						dataType: 'json',
						data:{
							questionId:questionId,
							selAnswer:selAnswer},
						success: function (data, status)
						{
							if(typeof(data.error) != 'undefined')
							{
								if(data.error != '')
								{
									alert(data.error);
								}else
								{
									alert(data.msg);
								}
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
       	<div id="myPic">
       		
       	</div>
       	<div id="questionList">
       		<table>
       			<tr>
       				<td>选择</td>
       				<td>编号</td>
       				<td>问题</td>
       				<td>答案</td>
       			</tr>
       			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['question'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['question']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['name'] = 'question';
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['questionsList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['question']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['question']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['question']['total']);
?>
       			<tr>
       				<td><input type="radio" name="selQues" value="<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['id'];?>
"/></td>
       				<td><?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['id'];?>
</td>
       				<td><?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['question'];?>
</td>
       				<td><select id="sel_<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['id'];?>
">
       					<option value="A">A:<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['A'];?>
</option>
       					<option value="B">B:<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['B'];?>
</option>
       					<option value="C">C:<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['C'];?>
</option>
       					<option value="D">D:<?php echo $_smarty_tpl->tpl_vars['questionsList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['question']['index']]['D'];?>
</option>
       				</select></td>
       			</tr>
       			<?php endfor; endif; ?>
       			<tr>
       				<td colspan="4">
       					<!-- <form name="form" action="" method="post" enctype="multipart/form-data"> -->
       					添加图片：<input type="file" id="questionPicture" name="questionPicture" onchange="doUpload();"/><input type="button" value="上传" onclick="javascript:doUpload();"/>
       					<!-- </form> -->
       				</td>
       			</tr>
       			<tr>
       				<td colspan="4"><input type="button" value="添加到我的问题库" /></td>
       			</tr>
       		</table>
       	</div>
       	<div id="myquestion">
       		<table>
       			<tr>
       				<td>编号</td>
       				<td>图片</td>
       				<td>问题</td>
       				<td>答案</td>
       				<td>删除</td>
       			</tr>
       			<tr>
       				<td>1</td>
       				<td><img src=""></td>
       				<td>11?</td>
       				<td>a<br>
       					b<br>
       					c<br>
       					d<br>
       				</td>
       				<td>删除</td>
       			</tr>
       		</table>
       	</div>
    </body>
</html>

<?php }} ?>
