<?php
/**
 * Included by other php files only. 
 * Parent file must define Smarty object named $smarty
 * and get account items($accountItems), page count($pageCount) from db
 * to let this file function properly 
 */
include_once("da_access.php");

$pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 0;
$itemCount = isset($_GET['itemCount']) ? $_GET['itemCount'] : 30;

$currentDate = null;
$currentYearMonth = null;
$itemsArray;
$monthTitleArray;
$dateTitleArray;
$idx = 0;

while($row = mysql_fetch_array($accountItems)){
	$accountTimestamp = $row['account_date'];
	$accountYearMonth = date('Y-m', $accountTimestamp);
	$accountDate = date('Y-m-d', $accountTimestamp);

	// build the month title array while month changed
	if($currentYearMonth != $accountYearMonth){
		$currentYearMonth = $accountYearMonth;
		$monthlyIncome = getMonthlyIncome($accountYearMonth);
		$monthlyOutgo = getMonthlyOutgo($accountYearMonth);

		$monthTitleArray[$currentYearMonth]['income'] = $monthlyIncome;
		$monthTitleArray[$currentYearMonth]['outgo'] = $monthlyOutgo;
	}

	// build the date title array while date changed
	if($accountDate != $currentDate){
		$currentDate = $accountDate;
		$dailyIncome = getDailyIncome($accountTimestamp);
		$dailyOutgo = getDailyOutgo($accountTimestamp);

		$dateTitleArray[$currentDate]['income'] = $dailyIncome;
		$dateTitleArray[$currentDate]['outgo'] = $dailyOutgo;
	}
	
	$row['account_month'] = $accountYearMonth;
	$row['account_date'] = $currentDate;
	$itemsArray[$idx++] = $row;
}

$smarty->assign('pageNum', $pageNum);
$smarty->assign('pageCount', $pageCount);
$smarty->assign('itemCount', $itemCount);
$smarty->assign('itemsArray', $itemsArray);
$smarty->assign('monthTitleArray', $monthTitleArray);
$smarty->assign('dateTitleArray', $dateTitleArray);
$smarty->assign('parentPage', $parentPage);
?>