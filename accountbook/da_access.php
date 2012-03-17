<?php
include_once("account_item_class.php");

$ITEMS_EVERY_PAGE=30;

$dbConf = parse_ini_file('conf/database.ini');

$con = mysql_connect($dbConf['host'],$dbConf['user'],$dbConf['passwd']);

if (!$con)
{
  die('Could not connect: ' . mysql_error());
} else {		
	mysql_select_db($dbConf['database'], $con);	
	mysql_query("set names 'utf8'"); // need to indicate the charset explicitly
}

function getUserByUserName($userName){
	$sql = "select * from users where user_name = '$userName'";
	return mysql_query($sql);
}

function getCategoryByType($account_type){
	$sql = "select * from account_category where account_type = $account_type and is_delete = 0 order by category_name asc";
	return mysql_query($sql);
}

/**
 * Get items by the given page number
 * @param integer $pageNum 
 * @param integer $itemCount items per page
 */
function getAccountItemByPage($pageNum, $itemCount){
	global $ITEMS_EVERY_PAGE;
	
	if($pageNum == null) $pageNum = 0;
	if($itemCount == null) $itemCount = $ITEMS_EVERY_PAGE;
	
	$startIdx = $pageNum * $itemCount;
	$sql = "select * from account_items order by account_date desc limit $startIdx, $itemCount";	
	return mysql_query($sql);
}

function getAccountItemByTimePeriod($pageNum, $itemCount, $type, $categoryId, $timeStart, $timeEnd){
	global $ITEMS_EVERY_PAGE;
	
	if($pageNum == null) $pageNum = 0;
	if($itemCount == null) $itemCount = $ITEMS_EVERY_PAGE;
	
	$startIdx = $pageNum * $itemCount;
	
	$sql = "select * from account_items where ";
	if($type > 0){
		$sql .= "type = $type and ";
	}
	if($categoryId != null || $categoryId != ""){
		$sql .= "categoryId = $categoryId and ";
	}
	$sql .= "account_date >= $timeStart and account_date <= $timeEnd order by account_date desc limit $startIdx, $itemCount";

	return mysql_query($sql);
}

/**
 * Get the total page number of items
 */
function getPageCount(){
	global $ITEMS_EVERY_PAGE;
	
	$sql = "select id from account_items";
	$countRes = mysql_query($sql);	
	return ceil(mysql_num_rows($countRes) / $ITEMS_EVERY_PAGE);
}

/**
 * Get the total page number of items in a time range
 * @param unknown_type $timeStart
 * @param unknown_type $timeEnd
 * @return number
 */
function getPageCountByTimePeriod($timeStart, $timeEnd){
	global $ITEMS_EVERY_PAGE;
	
	$sql = "select id from account_items where account_date >= $timeStart and account_date <= $timeEnd";
	$countRes = mysql_query($sql);
	return ceil(mysql_num_rows($countRes) / $ITEMS_EVERY_PAGE);
}

function createNewAccountItem($accountItem){
	
	$sql = "insert into account_items (name, account_date, balance, category_id, location, comment, type) " .
		"values('$accountItem->name', '$accountItem->accountDate', '$accountItem->balance', '$accountItem->categoryId', '$accountItem->location'," .
		"'$accountItem->comment', '$accountItem->type');";
	
	mysql_query($sql) or die("Invalid query: " . mysql_error() . "<br/>" . $sql);
	
	return mysql_affected_rows();
}

function updateAccountItem($accountItem){
	
	$sql = "update account_items set " .
		"name = '$accountItem->name', account_date = $accountItem->accountDate, balance = $accountItem->balance, ".
		"category_id = $accountItem->categoryId, location = '$accountItem->location', comment = '$accountItem->comment', type = $accountItem->type " .
		"where id = $accountItem->id;";
	
	mysql_query($sql) or die("Invalid query: " . mysql_error() . "<br/>" . $sql);
	
	return mysql_affected_rows();
}

function delItemById($id){
	$sql = "delete from account_items where id = $id";
	
	mysql_query($sql) or die("Invalid query: " . mysql_error() . "<br/>" . $sql);
	
	return mysql_affected_rows();
}

function getAccountItemById($id){
	$sql = "select * from account_items where id = $id";
	return mysql_query($sql);	
}

function getCategoryNameById($id){
	$sql = "select category_name from account_category where id = $id";
	return mysql_query($sql);
}

function getDailyIncome($timestamp){
	return getDailyBalanceByType($timestamp, 2);
}

function getDailyOutgo($timestamp){
	return getDailyBalanceByType($timestamp, 1);
}

function getDailyBalanceByType($timestamp, $type){
	$sql = "select round(sum(balance),2) from account_items where account_date = $timestamp and type = $type";
	return mysql_result(mysql_query($sql), 0, 0);
}

function getMonthlyIncome($currentYearMonth){
	return getMonthlyBalanceByType($currentYearMonth, 2);
}

function getMonthlyOutgo($currentYearMonth){
	return getMonthlyBalanceByType($currentYearMonth, 1);
}

/**
 * 
 * @param string $currentYearMonth format of this argument should be 'yyyy-mm'
 * @param integer $type account type : 1|2
 */
function getMonthlyBalanceByType($currentYearMonth, $type){
	$currentMonth = substr($currentYearMonth, 5, 7);
	$currentYear = substr($currentYearMonth, 0, 4);
	
	$firstDateTimestamp = mktime(0, 0, 0, $currentMonth, 1, $currentYear);
	$lastDateTimestamp = mktime(0, 0, 0, $currentMonth + 1, 1, $currentYear);
	
	$sql = "select round(sum(balance), 2) from account_items where account_date >= $firstDateTimestamp" .
	       " and account_date < $lastDateTimestamp " .
		   " and type = $type";
		   
	return mysql_result(mysql_query($sql), 0, 0);
}

function getAllYearStatistic($type){
	$sql = "select category_id, round(sum(balance), 2) sum, type from account_items ";
	if($type > 0){
		$sql .= "where type = $type";
	}
	$sql .= " group by category_id order by sum desc";
	
	return mysql_query($sql);
}

function getStatisticByTimePeriod($type, $timeStart, $timeEnd){
	$sql = "select category_id, round(sum(balance), 2) sum, type from account_items where ";
	if($type > 0){
		$sql .= "type = $type and ";
	}
	$sql .= "account_date >= $timeStart and account_date <= $timeEnd group by category_id order by sum desc";

	return mysql_query($sql);
}
?>