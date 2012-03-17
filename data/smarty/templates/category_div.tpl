{*Present the category list div for category choosing. Use together with category_div.php*}
<div id='outgo_cat_list'
	class='outgo_cat_list'>
	<div>
		<span class='edit_cat_list_close'><a href='javascript:return false;'
			onclick='javascript:closeMe("outgo_cat_list");'>x</a> </span>
	</div>
	<!-- The outgo categories list  -->
	{foreach $outgoCats as $outgoCat} {if $outgoCat@index%5 eq 0}
	<div class='edit_cat_list_line'>
		{/if}
		<div class='edit_cat_list_ele'>
			<a href='javascript:return false;'
				onclick='javascript:setCatValue(1, {$outgoCat["id"]}, this.innerHTML);'>{$outgoCat["category_name"]}</a>
		</div>
		{if $outgoCat@index%5 eq 0}
	</div>
	{/if} {/foreach}
</div>
<div id='income_cat_list'
	class='income_cat_list'>
	<div>
		<span class='edit_cat_list_close'><a href='javascript:return false;'
			onclick='javascript:closeMe("income_cat_list");'>x</a> </span>
	</div>
	<!-- The income categories list  -->
	{foreach $incomeCats as $incomeCat} {if $incomeCat@index%5 eq 0}
	<div class='edit_cat_list_line'>
		{/if}
		<div class='edit_cat_list_ele'>
			<a href='javascript:return false;'
				onclick='javascript:setCatValue(2, {$incomeCat["id"]}, this.innerHTML);'>{$incomeCat["category_name"]}</a>
		</div>
		{if $incomeCat@index%5 eq 0}
	</div>
	{/if} {/foreach}
</div>
