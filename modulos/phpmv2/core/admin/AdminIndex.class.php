<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminIndex.class.php 160 2006-11-08 19:53:43Z cmil $



require_once INCLUDE_PATH."/core/include/AdminModule.class.php";

class AdminIndex extends AdminModule
{
    var $viewTemplate = "admin/index.tpl";
    
	function AdminGeneralConfig()
	{
		parent::AdminModule();
	}

	
	function process()
	{
		$installedPlugin = &PmvConfig::getInstance("plugin.php", false);
		foreach ($installedPlugin->content as $key => $value) {
			if (($value['type'] == "admin") || ($value['type'] == "all")) {
				if ((isset($value['langPath'])) && ($value['langPath'] != "")) {
					Lang::addPluginLangFile ($key."/".$value['langPath'], $value['defaultLang']);
				}
			}
		}
		$this->tpl->assign ("installedPlugin", $installedPlugin->content);
	}
}
?>