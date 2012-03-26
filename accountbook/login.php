<?php
require_once("setups/smarty_setup.php");

$smarty = new Smarty_AccountBook();
$smarty->display('login.tpl');
?>
