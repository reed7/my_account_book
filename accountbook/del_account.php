<?php
include('da_access.php');

$id = $_GET['id'];
$result = delItemById($id);

if($result == 0){
	echo "0 record deleted successfully, please check your parameter!";
} else {	
	echo "<script type='text/javascript'>"; 
	echo "window.location.href='index.php'"; 
	echo "</script>";
}
?>