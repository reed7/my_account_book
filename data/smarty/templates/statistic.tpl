{include 'header.tpl'}
<title>账本-账目统计</title>
<link rel="stylesheet" href="/accountbook/css/account_book.css" type="text/css"></link>
</head>
<body>
<div class="left_part">
	<div style='margin-left:15px;'>
		<span>
		{if $year eq 0}
		全部年份的{$titleType}统计信息 
		{elseif $month eq 0} 
		{$year}年的{$titleType}统计信息 
		{else} 
		{$year}年{$month}月的{$titleType}统计信息
		{/if}
		</span>
	</div>
	{if $numRows eq 0}
	<span>没有数据，请重新选择！</span>
	{else}
	<table border='1' cellspacing='0' style='margin-left:10px'>
		{$totalOut=0}{$totalIn=0}
		{foreach $staticCategories as $row}
			{$balance=$row['sum']}
			{if $row['type'] eq 1}
				{$totalOut=$totalOut+$balance}
			{else}
				{$totalIn=$totalIn+$balance}
			{/if}
			<tr><td style='width:150px;'><span class='statistic_cat_name'>{$row['categoryName']}</span></td>
			{if $row['type'] eq 1}
			{$className='statistic_cat_value_out'}
			{else}
			{$className='statistic_cat_value_in'}
			{/if}
			<td style='width:100px;text-align:right'><span class='{$className}'>{$balance}</span></td></tr>
			
		{/foreach}
		{if $type eq 1 || $type eq 0}
		<tr><td><span class='statistic_cat_name'>总支出</span></td><td style='width:100px;text-align:right'><span class='statistic_cat_value_out'>{$totalOut}</span></td></tr>
		{/if}		 
		{if $type eq 2 || $type eq 0}
		<tr><td><span class='statistic_cat_name'>总收入</span></td><td style='width:100px;text-align:right'><span class='statistic_cat_value_in'>{$totalIn}</span></td></tr>
		{/if}
		</table>
	{/if}
</div>

<div class="item_list_part"> 
{include "account_list.tpl"}
</div>
{include 'footer.tpl'}
