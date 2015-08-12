<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminSiteGeneral.class.php 198 2007-01-17 16:47:59Z matthieu_ $


require_once INCLUDE_PATH."/core/include/AdminModule.class.php";
require_once INCLUDE_PATH."/core/forms/FormSiteGeneral.class.php";
require_once INCLUDE_PATH . "/core/include/SiteConfigDb.class.php";	

class AdminSiteGeneral extends AdminModule
{
    var $viewTemplate = "admin/sitegeneral.tpl";
    
	function AdminSiteGeneral()
	{
		parent::AdminModule();
		
	}

	function process()
	{				
		$this->tpl->assign( 'action', $this->request->getActionName() );
		
		switch( $this->request->getActionName() )
		{
			case 'add':
				$form = new FormSiteGeneral( $this->tpl );
		
				$done = $form->process();
						
				if($done)
				{
					$this->setMessageAdd( $form );
					$this->tpl->clear_all_cache();
				}
				
			break;
			
			case 'mod':
				$siteAdmin = $this->needASiteAdminSelected();
				
				if($siteAdmin)
				{
					$form = new FormSiteGeneral( $this->tpl, $siteAdmin );
			
					$done = $form->process();
						
					if($done)
					{
						$this->setMessage( );
					}
				}
				
			break;
			
			case 'del':
			
				$siteAdmin = $this->needASiteAdminSelected();
				
				if($siteAdmin)
				{	
					$confirmed = $this->needConfirmation( 'site', $siteAdmin );
					
					if($confirmed)
					{
						$confSite = new SiteConfigDb();
						$confSite->delSite( $siteAdmin );
						
						$this->setMessage( );
						$this->tpl->clear_all_cache();
					}
				}
			break;
			
		}
		
		// case no site installed, do not generate 
		if(is_a( $this->site, "Site"))
		{
			$this->site->generateFiles();
		}	
		
	}
	
	
	
	function setMessageAdd( &$form )
	{
		$this->tpl->template = "admin/message.tpl";
		$tmpIdSite = $form->siteAdmin;
		$this->tpl->assign("message", $GLOBALS['lang']['generique_done'] . "<br><br><p class='texte'>". sprintf($GLOBALS['lang']['admin_site_link_javascript'], "<a href='index.php?mod=admin_site_javascript_code&site=$tmpIdSite&adminsite=$tmpIdSite'>","</a>"). '</p>'. getCountImgHtml( $form->getSubmitValue('form_url'), $form->getSubmitValue('form_name')));
	}
}
?>