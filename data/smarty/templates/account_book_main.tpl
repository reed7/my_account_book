﻿{*let's make some change and commit*}
{include 'header.tpl'}
<title>账本</title>
<script type="text/javascript" src="/accountbook/js/calendarDateInput.js">
/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/
</script>
<script type="text/javascript" src="/accountbook/js/main.js"></script>
</head>
<body>
<div><!-- outer -->
<!-- Left side START -->
<div class="left_part">
	<div class="edit_title"><span class="edit_title_txt">新增账单</span></div>
	<div class="edit_form">
		<form id="record_account" action="save_account.php" method="post">
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">记账项目:</span>
				<input type='text' id='account_name' name='account_name' required></input>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">账目类型:</span>
				<input type='radio' name='account_type' value='1' checked onclick='javascript:selectCategory(1);'><span style='color:black;font-size:13px'>支出</span></input>
				<input style='margin-left:20px' type='radio' name='account_type' value='2' onclick='javascript:selectCategory(2);'><span style='color:black;font-size:13px'>收入</span></input>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">所属类别:</span>
				<input type='text' id='category_name' value="正餐" style="display:inline;width:100px" readonly='true' onclick='javascript:showCategory(1);' required/>
				<input type='hidden' id="category_id" name="category_id" value="16"/>				
				{include 'category_div.tpl'}
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">账目金额:</span><input type="text" id="balance" name="balance" required></input>
			</div>
			<div class="edit_input">
				<span style="color:red">*</span><span class="edit_label">发生日期:</span><script>DateInput('account_date', true, 'yyyy-mm-dd')</script>
			</div>
			<div class="edit_input">
				&nbsp;&nbsp;<span class="edit_label">发生地点:</span><input type="text" id="location" name="location"></input>
			</div>
			<div class="edit_input">
				&nbsp;&nbsp;<span class="edit_label">备&nbsp;&nbsp;&nbsp;&nbsp;注:</span><br/>
				&nbsp;&nbsp;<textarea rows='5' cols='30' id="comment" name="comment"></textarea>
			</div>
			<div class="edit_input">
				<input type='submit' value='保存'></input>
			</div>
		</form>
	</div>
	<div class="edit_title"><span class="edit_title_txt">查看账目统计</span></div>
	<div id="statisticForm" style="padding-top:10px">
		<form action="statistic.php" method="get" target="_blank">
			<div>
			时间：&nbsp;<select id="statisticYear" name="statisticYear">
				<option value="0">年</option>
				<option value="2008">2008</option>
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012" selected="selected">2012</option>
			</select>
			<select id="statisticMonth" name="statisticMonth">
				<option value="0">月</option>
				<option value="1">Jan.</option>
				<option value="2">Feb.</option>
				<option value="3">Mar.</option>
				<option value="4">Apr.</option>
				<option value="5">May</option>
				<option value="6">Jun.</option>
				<option value="7">Jul.</option>
				<option value="8">Aug.</option>
				<option value="9">Sep.</option>
				<option value="10">Oct.</option>
				<option value="11">Nov.</option>
				<option value="12">Dec.</option>
			</select>
			</div>
			<div>
			收/支：<select id="statisticType" name="statisticType">
				<option value="0">收支</option>
				<option value="1">支出</option>
				<option value="2">收入</option>
			</select>
			</div>
			<div>
			<input type="submit" value="猛击查看统计！"></input>
			</div>
		</form>
	</div>
</div>

<div class='item_list_part'>
{include 'account_list.tpl'}
</div>

</div><!-- outer end -->
{include 'footer.tpl'}