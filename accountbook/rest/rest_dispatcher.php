<?php
/**
 * Rest dispatcher, all rest call starts here.
 */
require_once('../da_access.php');
require_once('rest_validate.php');
require_once('../lib/log4php/Logger.php');

Logger::configure('../conf/log4php.xml');
$logger = Logger::getLogger('rest_dispatcher');

if($isValidReq == true){
	$command = $_POST['command'];

	$logger->info("Get command " . $command . " from remote client.");
	
	switch($command){
		case "create_new":
			include('../save_account_service.php');
			break;
		case "get_category":
			include('rest_get_category.php');
			break;
		case "get_newly_create":
			include('rest_get_newly_create.php');
			break;
		default:
			echo "1\", \"msg\":\"Unknow command " . $command . "!";		
	}
	
	if(!is_null($result)){	
		echo "{\"error\":\"0\",\"msg\":".json_encode($result)."}";
	}
} else {
	$logger->warn("Got an illegal access to rest api.");
	echo "{\"error\":\"1\",\"msg\":\"This request has failed to pass the validation!\"}";
}
?>