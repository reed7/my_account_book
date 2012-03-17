<?php
/**
 * parent page can use a $result variable to retrieve the operating result
 */
include_once('da_access.php');
include_once("account_item_class.php");

$accountItem = new AccountItem();

$accountItem->name = $_POST['account_name'];
$accountItem->type = $_POST['account_type'];
$accountItem->categoryId = $_POST['category_id'];
$accountItem->balance = $_POST['balance'];
$accountItem->location = $_POST['location'];
$accountItem->comment = $_POST['comment'];

#proccessing date informationg
$year = strtok($_POST['account_date'], "-");
$month = strtok("-");
$day = strtok("-");
$accountItem->accountDate = mktime(0,0,0,$month,$day,$year);

$result = createNewAccountItem($accountItem);
?>