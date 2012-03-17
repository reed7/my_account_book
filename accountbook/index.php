<?php
include("da_access.php");
include_once("setups/smarty_setup.php");
//include("checkLogin.php");

$smarty = new Smarty_AccountBook();
$smarty->display('index.tpl');
?>
