<?php
$OutgoRes = getCategoryByType(1);
$IncomeRes = getCategoryByType(2);

$result;
$OutgoArray;
$IncomeArray;

while($row = mysql_fetch_array($OutgoRes)){
	$catId = $row['id']; $catName = $row['category_name'];
	$OutgoArray[$catId] = $catName;
}
$result[1] = $OutgoArray;

while($row = mysql_fetch_array($IncomeRes)){
	$catId = $row['id']; $catName = $row['category_name'];
	$IncomeArray[$catId] = $catName;
}
$result[2] = $IncomeArray;

?>