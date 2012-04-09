{include 'header.tpl'}
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<title>登录</title>
</head>
<body>
<form id='login' action='doLogin.php' method='post'>	
	<div class="input">
	用户名：<input type='text' name='userName' maxLength='20'/><br/>
	密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type='password' name='passwd' maxLength='20'/>
	</div>	
	<div class="submitbtndiv">
	<input class="submitbtn" type='submit' value='登录'/>	
	</div>
</form>
{if $smarty.get.msg ne ''} 
<div class="errormsg"><span class="errormsgtxt">{$smarty.get.msg}</span></div>
{/if}
{include 'footer.tpl'}