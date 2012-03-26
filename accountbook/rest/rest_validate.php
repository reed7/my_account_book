<?php
require_once('../lib/log4php/Logger.php');

Logger::configure('../conf/log4php.xml');
$logger = Logger::getLogger('rest_dispatcher');

$isValidReq = false;

$remotetimestamp = $_POST['timestamp'];
$localtimestamp = time();
$delay = $localtimestamp - $remotetimestamp;

if($delay <= 5){ // allow 5 secs delay
	$expectKey = md5("reed" . $remotetimestamp);
	$actualKey = $_POST['validationKey'];
	
	if($expectKey === $actualKey){
		$isValidReq = true;
	} else {
		$logger->warn("Got an illegal access to rest api.Actual key doesn't match the expect key:remote["
				. $actualKey . "], local[" . $expectKey . "]");		
	}
} else {
	$logger->warn("Got an illegal access to rest api.Time stamp not match:remote["
			. $remotetimestamp . "], local[" . $localtimestamp . "]");
}
?>