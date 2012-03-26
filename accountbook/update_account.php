<?php
require_once('da_access.php');
require_once("account_item_class.php");
require_once("checkLogin.php");

$accountItem = new AccountItem();

$id = $_POST['id'];
if($id == null || $id == ''){
	echo "id is null, update can't be completed!!";
	return;
}

$accountItem->id = $id;
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

$result = updateAccountItem($accountItem);

if($result == 0){
	echo "0 record updated successfully, please check the parameters!";
} else {	
	echo "<script type='text/javascript'>"; 
	echo "window.opener.parent.document.location.reload();"; 
	echo "window.close();";
	echo "</script>";
}
?>