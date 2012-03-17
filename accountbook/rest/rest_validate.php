<?php
$isValidReq = false;

$expectKey = md5("reed");
$actualKey = $_POST['validationKey'];

if($expectKey === $actualKey){
	$isValidReq = true;
}
?>