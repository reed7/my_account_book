function selectCategory(type){
	if(1 == type){
		closeMe('income_cat_list');			
	} else {
		closeMe('outgo_cat_list');
	}
	
	setCategoryElementsValue('', '');
	document.getElementById('category_name').onclick = new Function("showCategory(" + type + ")");
}

function showCategory(type){
	if(1 == type){
		show = 'outgo_cat_list';
		hide = 'income_cat_list';
	} else {
		show = 'income_cat_list';
		hide = 'outgo_cat_list';
	}
	
	document.getElementById(show).style.display = 'block';
	document.getElementById(hide).style.display = 'none';
}

function closeMe(id){
	document.getElementById(id).style.display = 'none';
}

function setCatValue(type, cat_id, cat_name){	
	if(1 == type){
		closeMe('outgo_cat_list');	
	} else {
		closeMe('income_cat_list');				
	}
	
	setCategoryElementsValue(cat_id, cat_name);	
}

function setCategoryElementsValue(cat_id, cat_name){
	document.getElementById('category_id').value = cat_id;
	document.getElementById('category_name').value = cat_name;			
}
