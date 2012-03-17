<?php
include_once('../da_access.php');
include_once('rest_validate.php');
include_once('../lib/log4php/Logger.php');

Logger::configure('../conf/log4php.xml');
$logger = Logger::getLogger("rest_get_newly_create.php");

if($isValidReq == true){
	$items = getAccountItemByPage(0, $_POST['itemCount']);
		
	while($row = mysql_fetch_array($items)){
		$accountId = $row['id']; $itemName = $row['name'];	
		$accountTimestamp = $row['account_date'];		
		$accountYearMonth = date('Y-m-d', $accountTimestamp);
		$accountArray[$accountId] = $accountYearMonth . ' ' . $itemName;	
	}	

	$logger->info('Got last 5 create items: ');
	$logger->info($accountArray);
	
	echo "{\"error\":\"0\",\"msg\":".json_encode($accountArray)."}";
} else {
	echo "{\"error\":\"1\",\"msg\":\"This request has failed to pass the validation!\"}";
}
?>