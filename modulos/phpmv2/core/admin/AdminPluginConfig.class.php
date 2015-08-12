<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminPluginConfig.class.php 59 2006-08-26 05:37:04Z matthieu_ $


require_once INCLUDE_PATH."/core/include/AdminModule.class.php";
require_once INCLUDE_PATH."/core/forms/FormPluginConfig.class.php";

class AdminPluginConfig extends AdminModule
{
    var $viewTemplate = "admin/plugin_config.tpl";
    
	function AdminPluginConfig()
	{
		parent::AdminModule();
	}

	function process()
	{	
		$form = new FormPluginConfig( $this->tpl);

		$done = $form->process();
			
		if($done)
		{
			$this->setMessage( );
		}
	}
	
}
?>