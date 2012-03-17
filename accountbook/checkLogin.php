<?php
include_once("da_access.php");

$userName = $_COOKIE['account_user'];
if($userName == null){
	echo "<script type='text/javascript'>"; 
	echo "window.location.href='login.php?msg=请先登录'"; 
	echo "</script>";
}

$result = getUserByUserName($userName);
if(mysql_fetch_object($result) == null){
	echo "<script type='text/javascript'>"; 
	echo "window.location.href='login.php?msg=请先登录'"; 
	echo "</script>";
}
?>