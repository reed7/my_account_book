{include 'header.tpl'}
<title>账本-修改账目</title>
<script type="text/javascript" src="/accountbook/js/calendarDateInput.js">
/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/
</script>
<script type="text/javascript" src="/accountbook/js/main.js"></script>
<script type='text/javascript'>
function getDefaultDate(){	
	var date = new Date({$accountItem->account_date} * 1000);
	var dateStr = date.getFullYear() + '-' + (date.getMonth()+1)/*月份从0开始的！*/ + '-' + date.getDate();
	return dateStr;
}
</script>
<title>账本-修改账目</title>
</head>
<body>
<div class="edit_form">
		<form id="record_account" action="update_account.php" method="post">
			<input type='hidden' name='id' value='{$itemId}'/>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">记账项目:</span>
				<input type='text' id='account_name' name='account_name' value='{$accountItem->name}'/>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">账目类型:</span>
				<input type='radio' name='account_type' value='1' {if $accountItem->type eq 1}checked{/if} onclick='javascript:selectCategory(1);'><span style='color:black;font-size:13px'>支出</span></input>
				<input style='margin-left:20px' type='radio' name='account_type' value='2' {if $accountItem->type eq 2}checked{/if} onclick='javascript:selectCategory(2);'><span style='color:black;font-size:13px'>收入</span></input>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">所属类别:</span>
				<input type='text' id='category_name' value='{$categoryName}' style="display:inline;width:100px" readonly='true' onclick='javascript:showCategory({$accountItem->type});'/>
				<input type='hidden' id="category_id" name="category_id" value='{$accountItem->category_id}'/>				
				{include 'category_div.tpl'}				
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">账目金额:</span><input type="text" id="balance" name="balance" value='{$accountItem->balance}'/>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">发生日期:</span><script>DateInput('account_date', true, 'yyyy-mm-dd', getDefaultDate())</script>
			</div>
			<div class="edit_input">
				&nbsp;&nbsp;<span class="edit_label">发生地点:</span><input type="text" id="location" name="location" value='{$accountItem->location}'/>
			</div>
			<div class="edit_input">
				&nbsp;&nbsp;<span class="edit_label">备&nbsp;&nbsp;&nbsp;&nbsp;注:</span><br/>
				&nbsp;&nbsp;<textarea rows='5' cols='30' id="comment" name="comment">{$accountItem->comment}</textarea>
			</div>
			<div class="edit_input">
				<input type='submit' value='提交修改'/>
			</div>
		</form>
	</div>
{include 'footer.tpl'}