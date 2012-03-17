<?php /* Smarty version Smarty-3.1.8, created on 2012-03-11 10:59:42
         compiled from "D:/Works/PHP works/my_account_book/data/smarty/templates\category_div.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224524f5c859e7bed34-49368179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '492a3afd2eeb1d08146cc667d1768150f8b9d53d' => 
    array (
      0 => 'D:/Works/PHP works/my_account_book/data/smarty/templates\\category_div.tpl',
      1 => 1331435199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224524f5c859e7bed34-49368179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'outgoCats' => 0,
    'outgoCat' => 0,
    'incomeCats' => 0,
    'incomeCat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f5c859e86fb74_45586307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5c859e86fb74_45586307')) {function content_4f5c859e86fb74_45586307($_smarty_tpl) {?>
<div id='outgo_cat_list'
	class='outgo_cat_list'>
	<div>
		<span class='edit_cat_list_close'><a href='javascript:return false;'
			onclick='javascript:closeMe("outgo_cat_list");'>x</a> </span>
	</div>
	<!-- The outgo categories list  -->
	<?php  $_smarty_tpl->tpl_vars['outgoCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['outgoCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['outgoCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['outgoCat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['outgoCat']->key => $_smarty_tpl->tpl_vars['outgoCat']->value){
$_smarty_tpl->tpl_vars['outgoCat']->_loop = true;
 $_smarty_tpl->tpl_vars['outgoCat']->index++;
?> <?php if ($_smarty_tpl->tpl_vars['outgoCat']->index%5==0){?>
	<div class='edit_cat_list_line'>
		<?php }?>
		<div class='edit_cat_list_ele'>
			<a href='javascript:return false;'
				onclick='javascript:setCatValue(1, <?php echo $_smarty_tpl->tpl_vars['outgoCat']->value["id"];?>
, this.innerHTML);'><?php echo $_smarty_tpl->tpl_vars['outgoCat']->value["category_name"];?>
</a>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['outgoCat']->index%5==0){?>
	</div>
	<?php }?> <?php } ?>
</div>
<div id='income_cat_list'
	class='income_cat_list'>
	<div>
		<span class='edit_cat_list_close'><a href='javascript:return false;'
			onclick='javascript:closeMe("income_cat_list");'>x</a> </span>
	</div>
	<!-- The income categories list  -->
	<?php  $_smarty_tpl->tpl_vars['incomeCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['incomeCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['incomeCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['incomeCat']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['incomeCat']->key => $_smarty_tpl->tpl_vars['incomeCat']->value){
$_smarty_tpl->tpl_vars['incomeCat']->_loop = true;
 $_smarty_tpl->tpl_vars['incomeCat']->index++;
?> <?php if ($_smarty_tpl->tpl_vars['incomeCat']->index%5==0){?>
	<div class='edit_cat_list_line'>
		<?php }?>
		<div class='edit_cat_list_ele'>
			<a href='javascript:return false;'
				onclick='javascript:setCatValue(2, <?php echo $_smarty_tpl->tpl_vars['incomeCat']->value["id"];?>
, this.innerHTML);'><?php echo $_smarty_tpl->tpl_vars['incomeCat']->value["category_name"];?>
</a>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['incomeCat']->index%5==0){?>
	</div>
	<?php }?> <?php } ?>
</div>
<?php }} ?>