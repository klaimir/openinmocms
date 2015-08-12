<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminUpdate.class.php 162 2006-11-11 16:16:47Z cmil $



require_once INCLUDE_PATH."/core/include/AdminModule.class.php";

class AdminUpdate extends AdminModule
{
    var $viewTemplate = "admin/update.tpl";
    
	function AdminUpdate()
	{
		parent::AdminModule();
	}

	
	function process()
	{	
		$infos = getSystemInformation( $this->tpl );
		$db =& Db::getInstance();
		$oldVersion = $db->getVersion();
		$db->updateTables (PHPMV_VERSION);
		
		$this->tpl->assign("a_versions",array("<b>".$oldVersion."</b>", "<b>".PHPMV_VERSION."</b>"));	
		$this->tpl->clear_all_cache();
	}
}
?>