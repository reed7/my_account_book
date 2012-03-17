<?php
// The setup.php file is a good place to load
// required application library files, and you
// can do that right here.

// load Smarty library
require('lib/Smarty-3.1.8/Smarty.class.php');

$envConf = parse_ini_file('conf/env.ini'); 
$smartyDirs = $envConf['smarty.req.dirs.root'];


class Smarty_AccountBook extends Smarty {

	function __construct()
	{
		// Class Constructor.
		// These automatically get set with each new instance.
		parent::__construct();

		$this->setTemplateDir($GLOBALS['smartyDirs'] . '/templates/');
		$this->setCompileDir($GLOBALS['smartyDirs'] . '/templates_c/');
		$this->setConfigDir($GLOBALS['smartyDirs'] . '/configs/');
		$this->setCacheDir($GLOBALS['smartyDirs'] . '/cache/');

		$this->caching = Smarty::CACHING_OFF;
		$this->assign('app_name', 'My Account Book');
	}

}
?>
