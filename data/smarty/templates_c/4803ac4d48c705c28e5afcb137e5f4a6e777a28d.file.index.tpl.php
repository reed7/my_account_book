<?php /* Smarty version Smarty-3.1.8, created on 2012-03-19 11:47:01
         compiled from "D:/Works/PHP works/my_account_book/data/smarty/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135104f5c859e212194-80077059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4803ac4d48c705c28e5afcb137e5f4a6e777a28d' => 
    array (
      0 => 'D:/Works/PHP works/my_account_book/data/smarty/templates\\index.tpl',
      1 => 1331957220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135104f5c859e212194-80077059',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f5c859e28f6d4_49670985',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5c859e28f6d4_49670985')) {function content_4f5c859e28f6d4_49670985($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<title>账本</title>
</head>
<body>
	<script type="text/javascript">
		window.onload = function(){ document.getElementById("page").submit(); }
	</script>
	<form id="page" action="account_book_main.php" method="get">
		<input type="hidden" id="pageNum" name="pageNum" value="0"/>
		<input type="hidden" id="itemCount" name="itemCount" value="30"/>
	</form>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>