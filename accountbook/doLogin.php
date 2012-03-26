<?php
/*
 * cache anything that will output to the broswer to make sure we can handle header correctly (setcookie()、header() etc.)
 */
ob_start();
 
require_once("da_access.php");

$userName = $_POST['userName'];
$passwd = $_POST['passwd'];

$result = getUserByUserName($userName);
$user = mysql_fetch_object($result);

if($user != null && $user->password == md5($passwd)){
	setcookie("account_user", $userName, time() + 24*60*60); // cookie expires in 24 hours by default
	header("Location:index.php");
} else {
	echo "<script type='text/javascript'>";
	echo "window.location.href='login.php?msg=错误的用户名/密码'";
	echo "</script>";
}

ob_flush();
?>