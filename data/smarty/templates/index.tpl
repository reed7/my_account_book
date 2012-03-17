{include 'header.tpl'}
<title>账本</title>
</head>
<body>
	<script type="text/javascript">
		window.onload = function(){ document.getElementById("page").submit(); }
	</script>
	<form id="page" action="account_book_main.php" method="get">
		<input type="hidden" id="pageNum" name="pageNum" value="0"/>
		<input type="hidden" id="itemCount" name="itemCount" value="30"/>
	</form>
{include 'footer.tpl'}
