<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
</head>
<body>
<form id='login' action='doLogin.php' method='post'>
	用户名：<input type='text' name='userName' maxLength='20'/>
	密  码：<input type='password' name='passwd' maxLength='20'/>
	<input type='submit' value='登录'/>
</form>
<?php
$msg = $_GET['msg'];
if('$msg' != ''){
	echo '<div><span style="color:red">' . $msg . '</span></div>';
}
?>
</body>
</html>