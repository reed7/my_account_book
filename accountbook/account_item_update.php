<?php
include("da_access.php");
require_once("setups/smarty_setup.php");
//include("checkLogin.php");

$result = getAccountItemById($_GET['id']);
$accountItem = mysql_fetch_object($result);
$categoryName = mysql_result(getCategoryNameById($accountItem->category_id), 0);

$smarty = new Smarty_AccountBook();

include('category_div.php');

$smarty->assign('accountItem', $accountItem);
$smarty->assign('categoryName', $categoryName);
$smarty->assign('itemId', $_GET['id']);

$smarty->display('account_item_update.tpl');
	