<?php
include("da_access.php");

$userName = $_POST['userName'];
$passwd = $_POST['passwd'];

$result = getUserByUserName($userName);
$user = mysql_fetch_object($result);

if($user != null && $user->password == md5($passwd)){
	setcookie("account_user", $userName);
	echo "<script type='text/javascript'>";
	echo "window.location.href='index.php'";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "window.location.href='login.php?msg=错误的用户名/密码'";
	echo "</script>";
}
?>