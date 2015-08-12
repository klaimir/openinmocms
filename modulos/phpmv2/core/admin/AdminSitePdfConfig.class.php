<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminPdfConfig.class.php 59 2006-08-26 05:37:04Z matthieu_ $


require_once INCLUDE_PATH."/core/include/AdminModule.class.php";
require_once INCLUDE_PATH."/core/forms/FormSitePdfConfig.class.php";
require_once INCLUDE_PATH . "/core/include/SiteConfigDb.class.php";
require_once INCLUDE_PATH . "/core/include/PdfConfigDb.class.php";

class AdminSitePdfConfig extends AdminModule
{
    var $viewTemplate = "admin/site_pdf_config.tpl";
    
	function AdminSitePdfConfig()
	{
		parent::AdminModule();
	}

	function process()
	{	
		$this->tpl->assign( 'action', $this->request->getActionName() );
		
		switch( $this->request->getActionName() )
		{
			case 'add':
				$siteAdmin = $this->needASiteAdminSelected();
				
				if($siteAdmin)
				{
					$this->tpl->assign( 'action', 'add');
					$form = new FormSitePdfConfig( $this->tpl, $siteAdmin );
			
					$done = $form->process();
						
					if($done)
					{
						$this->setMessage( );
					}
				}
			break;
			
			case 'mod':
				$siteAdmin = $this->needASiteAdminSelected();
				
				if($siteAdmin)
				{
					
					$idPdf = $this->needAPdf( $siteAdmin );
					
					if($idPdf)
					{
						$this->tpl->assign( 'action', 'mod');
						$form = new FormSitePdfConfig( $this->tpl, $siteAdmin, $idPdf );
						
						$done = $form->process();
						
						if($done)
						{
							$this->setMessage( );
						}
					}
					
				}
				// else needASiteAdminSelected display the site selection form
			break;
			
			case 'del':
				$siteAdmin = $this->needASiteAdminSelected();
				
				if($siteAdmin)
				{
					$idPdf = $this->needAPdf( $siteAdmin );
					
					if($idPdf)
					{
						
						$confirmed = $this->needConfirmation( 'pdf', $idPdf );
						
						if($confirmed)
						{	
							$confPdf = new PdfConfigDb($siteAdmin);
							$confPdf->deletePdf( $idPdf );
							//$confPdf->savePdf ();
							$this->setMessage( );
						}
					}
				}
			break;
		}
		$this->tpl->clear_all_cache();
		
		$this->site->generateFiles();
	}
	
	function needAPdf( $idSite)
	{
		$idPdf = getRequestVar('idPdf', false, 'int');
		
		if(!$idPdf)
		{
			
			$pdfDb = new PdfConfigDb($idSite);
			
			$this->tpl->assign( 'pdf_available', $pdfDb->getListPdf());
			$this->tpl->template = "admin/site_pdf_selection.tpl";
			
			$ret =  false;
		}
		else
		{
			$ret = $idPdf;
		}
		return $ret;
	}
}
?>