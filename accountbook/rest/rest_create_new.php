<?php
include_once('../da_access.php');
include_once('rest_validate.php');
if($isValidReq == true){
	include('../save_account_service.php');

	echo "{\"error\":\"";
	if($result == 0){
		echo "1\", \"msg\":\"0 inserted into DB, check the arguments please!";
	} else {
		echo "0\", \"msg\":\"ok";
	}
	echo "\"}";
} else {
	echo "{\"error\":\"1\",\"msg\":\"This request has failed to pass the validation!\"}";
}
?>