<?php
require_once("da_access.php");
require_once("setups/smarty_setup.php");

$year = $_GET['statisticYear'];
$month = $_GET['statisticMonth'];
$type = $_GET['statisticType'];
$categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : null;
$pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 0; // should be started from the 1st page

if($type == 1){
	$titleType = "支出";
} else if ($type == 2){
	$titleType = "收入";
} else {
	$titleType = "收支";
}

// get account items and statistic summaries according to the statistic period
$items;
$pageCount;
$itemCount = $ITEMS_EVERY_PAGE;
if($year == 0){ // whole period 
	$pageCount = getPageCount();
	$statisticByCat = getAllYearStatistic($type);
	$accountItems = getAccountItemByPage($pageNum, $itemCount);
} else {
	if ($month == 0) { // whole year	
		$timeStart = mktime(0, 0, 0, 1, 1, $year);
		$timeEnd = mktime(23, 59, 59, 12, 31, $year);
	} else { // whole month
		$timeStart = mktime(0, 0, 0, $month, 1, $year);
		$timeEnd = mktime(0, 0, 0, $month+1, 1, $year);
	}
	$statisticByCat = getStatisticByTimePeriod($type, $timeStart, $timeEnd);
	$pageCount = getPageCountByTimePeriod($timeStart, $timeEnd);
	$accountItems = getAccountItemByTimePeriod($pageNum, $itemCount, $type, $categoryId, $timeStart, $timeEnd);
}

$idx = 0;
$staticCategories;
while($row = mysql_fetch_array($statisticByCat)){
	$row['categoryName'] = mysql_result(getCategoryNameById($row['category_id']), 0);
	$staticCategories[$idx++] = $row;
}

$num_rows = mysql_num_rows($accountItems);
$parentPage = 'statistic.php';

$smarty = new Smarty_AccountBook();
$smarty->assign('year', $year);
$smarty->assign('month', $month);
$smarty->assign('type', $type);
$smarty->assign('staticCategories', $staticCategories);
$smarty->assign('numRows', $num_rows);
$smarty->assign('titleType', $titleType);
$smarty->assign('pageCount', $pageCount);

include("account_list.php");

$smarty->display('statistic.tpl');
?>
