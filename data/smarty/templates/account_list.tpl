<!-- List Start -->
{$currentMonth=''}{*short for {assign}*}
{$currentDate=''}
{foreach $itemsArray as $item}
	{$accountMonth=$item['account_month']}
	{$accountDate=$item['account_date']}
	
	{if $currentMonth ne $accountMonth}
	{$currentMonth=$accountMonth}
	<!-- Month title -->
	<div class='monthly_cell_title'>
		<div style='float:left'>
			<span class='account_month'>{$accountMonth}</span>
		</div>
		<div style='text-align: right; margin-right: 22px;'>
			{if $monthTitleArray[$accountMonth]['income'] ne 0} 
			<span style='margin-right: 10px; color: red; font-weight: bold'>{$monthTitleArray[$accountMonth]['income']}</span>
			{/if} 
			{if $monthTitleArray[$accountMonth]['outgo'] ne 0} 
			<span style='margin-right: 10px; color: green; font-weight: bold'>{$monthTitleArray[$accountMonth]['outgo']}</span>
			{/if}
		</div>
	</div>
	{/if}
	
	{if $currentDate ne $accountDate}
	{$currentDate=$accountDate}
	<!-- Date title -->
	<div class='daily_cell_title'>
		 <div style='float:left'>
		 	<span class='account_date'>{$accountDate}</span>
		 </div> 
		 <div style='text-align:right;margin-right:22px;'>
			 {if $dateTitleArray[$accountDate]['income'] ne 0}
			 <span style='margin-right:10px;color:red;font-weight:bold'>{$dateTitleArray[$accountDate]['income']}</span>
			 {/if}
			 {if $dateTitleArray[$accountDate]['outgo'] ne 0}
			 <span style='margin-right:10px;color:green;font-weight:bold'>{$dateTitleArray[$accountDate]['outgo']}</span>
			 {/if}
		 </div>			 
	</div>
	{/if}
	
	{if $item['type'] eq 2}
		{$fontColor='red'}
	{else}
		{$fontColor='black'}
	{/if}
		
	<div class='list_row'>
		<div class='item_name' title='{$item["name"]}'>{$item["name"]}</div>
		<span class='location' title='{$item["location"]}'>{$item["location"]}</span>
		<span class='comment' title='{$item["comment"]}'>{$item["comment"]}</span>
		<span class='balance' style='color:{$fontColor}'>{$item["balance"]}</span>
		<span class='update_item'><a href='account_item_update.php?id={$item["id"]}' target='_blank'>改</a></span>
		<span class='delete_item'><a href='del_account.php?id={$item["id"]}' onclick='javascript:return confirmDel();'>删</a></span>
	</div>
{/foreach}
<!-- List End -->

<!-- Page turnning part start -->
<div class="page_turn">
	{if $pageNum gt 0}
	<a href="javascript:return false;" onclick="javascript:goPrevPage();">上一页</a>
	{/if}
	 第 <input type='text' id='inputPageNum' value='{$pageNum+1}' style='width:28px;text-align:right;' maxlength='3'/> / {$pageCount} 页	
	<input type="button" value="GO!" onclick="javascript:go2ChosenPage();"></input>
	{if $pageNum+1 lt $pageCount}
	<a href="javascript:return false;" onclick="javascript:goNextPage();">下一页</a>
	{/if}	
</div>
<form id="page" action="{$parentPage}" method="get">
	<input type="hidden" id="pageNum" name="pageNum"/>
	<input type="hidden" id="itemCount" name="itemCount" value="{$itemCount}"/>
	<input type="hidden" id="pageCount" name="pageCount" value="{$pageCount}"/>
	<input type="hidden" id="statisticYear" name="statisticYear" value="{$year}"/>
	<input type="hidden" id="statisticMonth" name="statisticMonth" value="{$month}"/>
	<input type="hidden" id="statisticType" name="statisticType" value="{$type}"/>
</form>
<!-- Page turnning part end -->
<script type='text/javascript'>
function go2ChosenPage(){
	var pageNum = document.getElementById("inputPageNum").value;
	go2Page(pageNum-1,{$itemCount});
}

function goPrevPage(){	
	var pageNum = {$pageNum};
	var itemCount = {$itemCount};
	pageNum -= 1;
	if(pageNum < 0){
		alert("已到达第一页！");			
		return;
	}
	
	go2Page(pageNum, itemCount);
}

function goNextPage(){	
	var pageNum = {$pageNum};
	var itemCount = {$itemCount};
	var pageCount = {$pageCount};
	pageNum += 1;
	if(pageNum >= pageCount){
		alert("已到达最后一页！");
		return;
	}
	
	go2Page(pageNum, itemCount);
}

/**
 * pageNum start with 0, end with total-1
 */
function go2Page(pageNum, itemCount){
	var pageCount = {$pageCount};
	if(pageNum > pageCount-1 || pageNum < 0){
		alert("这不是一个正确的页码！");
		return false;
	}
	document.getElementById("pageNum").value = pageNum;				
	document.getElementById("page").submit();
}

function confirmDel(){
	if(confirm('确认删除？')){
		return true;
	}
	
	return false;
}
</script>