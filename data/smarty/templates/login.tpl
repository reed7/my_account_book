{include 'header.tpl'}
<title>登录</title>
</head>
<body>
<form id='login' action='doLogin.php' method='post'>
	用户名：<input type='text' name='userName' maxLength='20'/>
	密  码：<input type='password' name='passwd' maxLength='20'/>
	<input type='submit' value='登录'/>
</form>
{if $smarty.get.msg ne ''} 
<div><span style="color:red">{$smarty.get.msg}</span></div>
{/if}
{include 'footer.tpl'}