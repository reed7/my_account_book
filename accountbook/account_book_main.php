<?php
require_once("da_access.php");
require_once("setups/smarty_setup.php"); 
require_once("account_item_class.php");
//include("checkLogin.php");

$smarty = new Smarty_AccountBook();

include('category_div.php');

/*
 * arguments for account_list.php
 */
$pageNum = $_GET['pageNum'];
$itemCount = $_GET['itemCount'];
$accountItems = getAccountItemByPage($pageNum, $itemCount);
$pageCount = getPageCount();
$parentPage = 'account_book_main.php';
include('account_list.php');

$smarty->display('account_book_main.tpl');
?>