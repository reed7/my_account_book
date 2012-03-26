<?php /* Smarty version Smarty-3.1.8, created on 2012-03-26 13:36:31
         compiled from "D:/Works/PHP works/my_account_book/data/smarty/templates\account_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245414f5c859e882929-99048721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae86e5c0ae11c929a34566fb96101a79ff62d572' => 
    array (
      0 => 'D:/Works/PHP works/my_account_book/data/smarty/templates\\account_list.tpl',
      1 => 1332768769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245414f5c859e882929-99048721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f5c859ea6ba62_50352950',
  'variables' => 
  array (
    'itemsArray' => 0,
    'item' => 0,
    'currentMonth' => 0,
    'accountMonth' => 0,
    'monthTitleArray' => 0,
    'currentDate' => 0,
    'accountDate' => 0,
    'dateTitleArray' => 0,
    'fontColor' => 0,
    'pageNum' => 0,
    'pageCount' => 0,
    'parentPage' => 0,
    'itemCount' => 0,
    'year' => 0,
    'month' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5c859ea6ba62_50352950')) {function content_4f5c859ea6ba62_50352950($_smarty_tpl) {?><!-- List Start -->
<?php $_smarty_tpl->tpl_vars['currentMonth'] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars['currentDate'] = new Smarty_variable('', null, 0);?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itemsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars['accountMonth'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['account_month'], null, 0);?>
	<?php $_smarty_tpl->tpl_vars['accountDate'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['account_date'], null, 0);?>
	
	<?php if ($_smarty_tpl->tpl_vars['currentMonth']->value!=$_smarty_tpl->tpl_vars['accountMonth']->value){?>
	<?php $_smarty_tpl->tpl_vars['currentMonth'] = new Smarty_variable($_smarty_tpl->tpl_vars['accountMonth']->value, null, 0);?>
	<!-- Month title -->
	<div class='monthly_cell_title'>
		<div style='float:left'>
			<span class='account_month'><?php echo $_smarty_tpl->tpl_vars['accountMonth']->value;?>
</span>
		</div>
		<div style='text-align: right; margin-right: 22px;'>
			<?php if ($_smarty_tpl->tpl_vars['monthTitleArray']->value[$_smarty_tpl->tpl_vars['accountMonth']->value]['income']!=0){?> 
			<span style='margin-right: 10px; color: red; font-weight: bold'><?php echo $_smarty_tpl->tpl_vars['monthTitleArray']->value[$_smarty_tpl->tpl_vars['accountMonth']->value]['income'];?>
</span>
			<?php }?> 
			<?php if ($_smarty_tpl->tpl_vars['monthTitleArray']->value[$_smarty_tpl->tpl_vars['accountMonth']->value]['outgo']!=0){?> 
			<span style='margin-right: 10px; color: green; font-weight: bold'><?php echo $_smarty_tpl->tpl_vars['monthTitleArray']->value[$_smarty_tpl->tpl_vars['accountMonth']->value]['outgo'];?>
</span>
			<?php }?>
		</div>
	</div>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['currentDate']->value!=$_smarty_tpl->tpl_vars['accountDate']->value){?>
	<?php $_smarty_tpl->tpl_vars['currentDate'] = new Smarty_variable($_smarty_tpl->tpl_vars['accountDate']->value, null, 0);?>
	<!-- Date title -->
	<div class='daily_cell_title'>
		 <div style='float:left'>
		 	<span class='account_date'><?php echo $_smarty_tpl->tpl_vars['accountDate']->value;?>
</span>
		 </div> 
		 <div style='text-align:right;margin-right:22px;'>
			 <?php if ($_smarty_tpl->tpl_vars['dateTitleArray']->value[$_smarty_tpl->tpl_vars['accountDate']->value]['income']!=0){?>
			 <span style='margin-right:10px;color:red;font-weight:bold'><?php echo $_smarty_tpl->tpl_vars['dateTitleArray']->value[$_smarty_tpl->tpl_vars['accountDate']->value]['income'];?>
</span>
			 <?php }?>
			 <?php if ($_smarty_tpl->tpl_vars['dateTitleArray']->value[$_smarty_tpl->tpl_vars['accountDate']->value]['outgo']!=0){?>
			 <span style='margin-right:10px;color:green;font-weight:bold'><?php echo $_smarty_tpl->tpl_vars['dateTitleArray']->value[$_smarty_tpl->tpl_vars['accountDate']->value]['outgo'];?>
</span>
			 <?php }?>
		 </div>			 
	</div>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']==2){?>
		<?php $_smarty_tpl->tpl_vars['fontColor'] = new Smarty_variable('red', null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['fontColor'] = new Smarty_variable('black', null, 0);?>
	<?php }?>
		
	<div class='list_row'>
		<div class='item_name' title='<?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
</div>
		<span class='location' title='<?php echo $_smarty_tpl->tpl_vars['item']->value["location"];?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value["location"];?>
</span>
		<span class='comment' title='<?php echo $_smarty_tpl->tpl_vars['item']->value["comment"];?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value["comment"];?>
</span>
		<span class='balance' style='color:<?php echo $_smarty_tpl->tpl_vars['fontColor']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value["balance"];?>
</span>
		<span class='update_item'><a href='account_item_update.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
' target='_blank'>改</a></span>
		<span class='delete_item'><a href='del_account.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
' onclick='javascript:return confirmDel();'>删</a></span>
	</div>
<?php } ?>
<!-- List End -->

<!-- Page turnning part start -->
<div class="page_turn">
	<?php if ($_smarty_tpl->tpl_vars['pageNum']->value>0){?>
	<a href="javascript:return false;" onclick="javascript:goPrevPage();">上一页</a>
	<?php }?>
	 第 <input type='text' id='inputPageNum' value='<?php echo $_smarty_tpl->tpl_vars['pageNum']->value+1;?>
' style='width:28px;text-align:right;' maxlength='3'/> / <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
 页	
	<input type="button" value="GO!" onclick="javascript:go2ChosenPage();"></input>
	<?php if ($_smarty_tpl->tpl_vars['pageNum']->value+1<$_smarty_tpl->tpl_vars['pageCount']->value){?>
	<a href="javascript:return false;" onclick="javascript:goNextPage();">下一页</a>
	<?php }?>	
</div>
<form id="page" action="<?php echo $_smarty_tpl->tpl_vars['parentPage']->value;?>
" method="get">
	<input type="hidden" id="pageNum" name="pageNum"/>
	<input type="hidden" id="itemCount" name="itemCount" value="<?php echo $_smarty_tpl->tpl_vars['itemCount']->value;?>
"/>
	<input type="hidden" id="pageCount" name="pageCount" value="<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
"/>
	<input type="hidden" id="statisticYear" name="statisticYear" value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"/>
	<input type="hidden" id="statisticMonth" name="statisticMonth" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"/>
	<input type="hidden" id="statisticType" name="statisticType" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"/>
</form>
<!-- Page turnning part end -->
<script type='text/javascript'>
function go2ChosenPage(){
	var pageNum = document.getElementById("inputPageNum").value;
	go2Page(pageNum-1,<?php echo $_smarty_tpl->tpl_vars['itemCount']->value;?>
);
}

function goPrevPage(){	
	var pageNum = <?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>
;
	var itemCount = <?php echo $_smarty_tpl->tpl_vars['itemCount']->value;?>
;
	pageNum -= 1;
	if(pageNum < 0){
		alert("已到达第一页！");			
		return;
	}
	
	go2Page(pageNum, itemCount);
}

function goNextPage(){	
	var pageNum = <?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>
;
	var itemCount = <?php echo $_smarty_tpl->tpl_vars['itemCount']->value;?>
;
	var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
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
	var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
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
</script><?php }} ?>