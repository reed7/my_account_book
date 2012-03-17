<?php
require_once("da_access.php");
require_once("setups/smarty_setup.php");

/*
 *  retrieves the catagories from db and gets 
 *  ready to pass them to the template for render
 */
$count = 0;
$outgoCats;
$incomeCats;
$categories = getCategoryByType("1");
while($row = mysql_fetch_array($categories)){
	$outgoCats[$count++] = $row;
}

$categories = getCategoryByType("2");
$count = 0;
while($row = mysql_fetch_array($categories)){
	$incomeCats[$count++] = $row;
}

$smarty->assign('outgoCats', $outgoCats);
$smarty->assign('incomeCats', $incomeCats);

?>