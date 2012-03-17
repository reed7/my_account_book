<?php
include('save_account_service.php');

echo "<script type='text/javascript'>" . PHP_EOL; 
if($result == 0){
	echo "alert('0 record inserted successfully, please check the parameters!');" . PHP_EOL;
}
echo "window.location.href='index.php';" . PHP_EOL; 
echo "</script>";
?>