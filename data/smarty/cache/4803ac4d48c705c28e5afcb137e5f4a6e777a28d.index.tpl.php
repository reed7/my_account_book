<?php /*%%SmartyHeaderCode:9724f52f612b5c574-00611734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4803ac4d48c705c28e5afcb137e5f4a6e777a28d' => 
    array (
      0 => 'D:/Works/PHP works/my_account_book/data/smarty/templates\\index.tpl',
      1 => 1330838203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9724f52f612b5c574-00611734',
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f533a2e61bdd7_51351698',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f533a2e61bdd7_51351698')) {function content_4f533a2e61bdd7_51351698($_smarty_tpl) {?>﻿
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账本</title>
</head>
<body>
	<script type="text/javascript">
		window.onload = function(){ document.getElementById("page").submit(); }
	</script>
	<form id="page" action="account_book_main.php" method="get">
		<input type="hidden" id="pageNum" name="pageNum" value="0"/>
		<input type="hidden" id="itemCount" name="itemCount" value="30"/>
		<input type="hidden" id="pageCount" name="pageCount" value="56"/>
	</form>
</body>
</html>
<?php }} ?>