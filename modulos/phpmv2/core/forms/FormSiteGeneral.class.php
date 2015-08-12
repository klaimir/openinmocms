<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: FormSiteGeneral.class.php 236 2007-11-04 15:04:08Z matthieu_ $



require_once INCLUDE_PATH . "/core/forms/Form.class.php";
require_once INCLUDE_PATH . "/core/include/SiteConfigDb.class.php";

class FormSiteGeneral extends Form
{
	
	var $valueName = '';
	var $valueMainUrl = '';
	var $valueLogo = '1.png';
	var $valueRecordGet = 'all';
	var $valueVariableNames = '';
	var $site;
	var $idPdf = -1;
	var $pathTheme = THEME_DEFAULT;
	
	function FormSiteGeneral( &$template, $siteAdmin = null, $action = null)
	{
		parent::Form( $template, $action );
		
		
		// site selected for mod, display site info in form input
		if( !is_null($siteAdmin))
		{
			$siteSelect = new Site($siteAdmin);
			
			$this->valueName = $siteSelect->getName();
			$urls = $siteSelect->getUrls();
			$this->valueMainUrl = $urls[0];
			
			$this->valueLogo = $siteSelect->getLogo();
			$this->idPdf = $siteSelect->getIdPdf();
			$this->pathTheme = $siteSelect->getPathTheme();
			
			$params = $siteSelect->getParams();
			
			$this->valueRecordGet = $params['params_choice'];
			$this->valueVariableNames = $params['params_names'];
			
			$this->siteAdmin = $siteAdmin;
		}
	}
	
	function process()
	{		
		
		// general input
		$tmpImg = (isset( $this->valueLogo) && $this->valueLogo!='pixel.gif' ? $this->valueLogo  : '1.png');
		$formElements = array(
			array('text', 'form_name', $GLOBALS['lang']['admin_site_name'], 'value="'.str_replace('"',"'",$this->valueName).'"'),
			array('text', 'form_url', $GLOBALS['lang']['admin_site_url'], 'value="'.$this->valueMainUrl.'"'),
			array('radio', 'form_logo', sprintf($GLOBALS['lang']['install_afficherlogo'], 
				'<img alt="logo" name="logo_phpmv" src="'.DIR_IMG_LOGOS.'/'. $tmpImg .	'"/> ')
				 , $GLOBALS['lang']['install_oui'] . '<br><br><a href="javascript:popup(\'index.php?mod=list_logos\');">-> '.$GLOBALS['lang']['install_logodispo'].'</a>'
				 , 'yes'),
			array('radio', 'form_logo', null, $GLOBALS['lang']['install_non'], 'no'),
			array('hidden', 'form_logo_no', $tmpImg),
			
			);
		$this->addElements( $formElements , 'General');

		// Prepare PDF list		
		$listPdf = array();
		$listPdfOption = array();
		$listPdf["-1"] = $GLOBALS['lang']['admin_get_default_pdfdefault'];
		if (isset($this->siteAdmin)) {
			$pdfDb = new PdfConfigDb($this->siteAdmin);
			$tmpLstPdf = $pdfDb->getListPdf();
			foreach ($tmpLstPdf as $key => $info) {
				$listPdf[$key] = $info->pdfName. " (".PARAM_URL_NEWSLETTER."=".$key.")";
			}
		}
		
		// Get List of theme
		$dir = INCLUDE_PATH."/themes/";
	    $d = dir($dir);
	    $arDir = array();
	    
	    while (false !== ($entry = $d->read())) 
	    {
	       if( is_dir($dir.$entry) 
	       		&& $entry[0] != '.' // we don't want .. or . or .svn 
	       		)
	           $arDir[$entry] = ucfirst($entry);
	    }
	    $d->close();
		
		
		// optional input (relative to GET variable recording)
		$formElements = array(
			array('radio', 'form_params', $GLOBALS['lang']['admin_get_question'] ,  $GLOBALS['lang']['admin_get_a1'], 'all'),
			array('radio', 'form_params', null, $GLOBALS['lang']['admin_get_a2'] , 'none'),
			array('radio', 'form_params', null,  $GLOBALS['lang']['admin_get_a3'], 'only'),
			array('radio', 'form_params', null,  $GLOBALS['lang']['admin_get_a4'], 'except'),
			array('text', 'form_params_names', sprintf(  $GLOBALS['lang']['admin_get_list'], GET_LIST_EXAMPLE), 
							'value="'.$this->valueVariableNames.'"'),
			array('select','form_idpdf'), // Reserve field postion but it is creating after
//			array('text', 'form_path_theme', $GLOBALS['lang']['admin_get_default_theme'],'value="'.$this->pathTheme.'"'),
			array('select', 'form_path_theme'), // Reserve field postion but it is creating after

		);
		$this->addElements( $formElements , $GLOBALS['lang']['install_utilisateursavances']);

		// Set list PDF with default value
		$s =& $this->createElement('select','form_idpdf', $GLOBALS['lang']['admin_get_default_pdf']);
		$s->loadArray($listPdf, $this->idPdf); // Default value
		$this->addElement($s);

		// Set list theme with default value
		$s =& $this->createElement('select','form_path_theme', $GLOBALS['lang']['admin_get_default_theme']);
		$s->loadArray($arDir, $this->pathTheme); // Default value
		$this->addElement($s);

		// set first radio checked for variables recording
		//$radio =& $this->getElement('form_params');
		//$radio->_attributes['checked'] = 'checked';
		$this->setChecked( 'form_params', $this->valueRecordGet );
		
		// set first radio checked for logo display
		$this->setChecked( 'form_logo', $this->valueLogo=='pixel.gif'?'no':'yes' );

		
		// validation rules
		$formRules = array(
			array('form_name', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_site_name']), 'required'),
			array('form_url', sprintf($GLOBALS['lang']['admin_required'],  $GLOBALS['lang']['admin_site_url']), 'required'),
			$this->getRuleCheckUrl( 'form_url'),
			array('form_logo', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_logo_question']), 'required'),
			array('form_params', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_get_question']), 'required'),
		);
		$this->addRules( $formRules );
		
		// launche process
		return parent::process( 'admin_configetperso' );
	}
	
	function postProcess()
	{
		$confSite = new SiteConfigDb();
		
		$infoSite = array(	
			// db field name => new value
			'name' => $this->getSubmitValue('form_name'),
			'logo' => $this->getSubmitValue('form_logo')=='yes'
							? $this->getSubmitValue('form_logo_no') 
							: 'pixel.gif',
			'params_choice' => $this->getSubmitValue('form_params'),
			'idpdf' => $this->getSubmitValue('form_idpdf'),
			'path_theme' => $this->getSubmitValue('form_path_theme'),
		);
		
		$urlSite = $this->getSubmitValue('form_url');
		
		$params_names = $this->getSubmitValue('form_params_names');
		
		if(!empty($params_names))
		{
			$infoSite['params_names'] = $params_names;
		}
			
		$req =& Request::getInstance();
		switch( $req->getActionName() )
		{
			case 'add':
				$this->siteAdmin = $confSite->addSite( $infoSite, $urlSite);
			break;
			
			case 'mod':
				$infoSite['idsite'] = $this->siteAdmin;
				$confSite->modSite( $infoSite, $urlSite);
			
			break;
						
			default:
				trigger_error('Action not specified for Site configuration. Were you trying to add, modify, delete? Only YOU know that!', E_USER_ERROR);
			break;
		}
		
	}
}
?>