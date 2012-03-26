<?php
require_once("da_access.php");
require_once("setups/smarty_setup.php");
require_once("checkLogin.php");

$smarty = new Smarty_AccountBook();
$smarty->display('index.tpl');
?>
