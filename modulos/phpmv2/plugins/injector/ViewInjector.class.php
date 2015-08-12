<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: ViewReferers.class.php 29 2006-08-18 07:35:21Z matthieu_ $


require_once INCLUDE_PATH."/core/include/AdminModule.class.php";

class ViewInjector extends AdminModule
{
    var $viewTemplate = "injector/viewinjector.tpl";
    
    /**
     * Constructor
     */
	function ViewPagesDetailsOne()
	{
		parent::AdminModule();
	}
	
	/**
	 * Data processing method
	 * only called if template is not cached
	 */
	function process()
	{
		$this->tpl->assign("PARAM_URL_NEWSLETTER", PARAM_URL_NEWSLETTER);
		$this->tpl->assign("PARAM_URL_PARTNER", PARAM_URL_PARTNER);
		
		$idSite = $this->needASiteAdminSelected();
		$o_site = new Site( $idSite);
		$listSite = $o_site->getAllowedSites( 'view' );
		$listNid = array();
		$listPid = array();
		foreach ($listSite as $key => $info) {
			$o_site = new Site( $key);
			$listNid[$key] = $o_site->getNewslettersSite();
			$listPid[$key] = $o_site->getPartnerSite();
		}
		
		$this->tpl->assign( 'newsletters_available', $listNid);
		$this->tpl->assign( 'partners_available', $listPid);
		$this->tpl->assign( 'searchEngines_available', $GLOBALS['searchEngines'] );
		$this->tpl->assign( 'COOKIE_PMVLOG_NAME', COOKIE_PMVLOG_NAME); 
		$this->tpl->assign( 'PHPMV_URL', PHPMV_URL); 
		$this->tpl->assign( 'CATEGORY_DELIMITER', CATEGORY_DELIMITER); 
		
		
		
		
	}
/*
		$selectCat = getRequestVar ('cat', "", 'string');
		$statVal = getRequestVar ('stat', "", 'string');
		$initKey = getRequestVar ('init', "", 'string');
		if ($initKey != "") {
			$tabInitKey = split(",", $initKey);
			$this->tpl->assign("InitKey", $tabInitKey);
			// Search lib for each key
			$tabInitLib = array();
			foreach ($tabInitKey as $key) {
				$tabInitLib[] = $this->getName ($key);
			}
			$this->tpl->assign("InitLib", $tabInitLib);
		}
		elseif ($statVal != "") {
			$methods = array(
			  "zoom" => array('')
			);
			$this->getDataMethod( $methods );
			
			$tabStatVal = split(",", $statVal);
			$nbElem = count($tabStatVal);
			$returnData = array();
			for ($i = 1; $i <= $nbElem; $i++) {
				$returnData = $this->constructData ($tabStatVal, $i, $returnData);
			}
			$this->returnAllElemXML($returnData);
*/
/*
			$this->getDataMethod( $methods );
			$tmpData = $this->data->getPagesZoom("");
			var_dump ($tmpData);
			exit;
*/
/*
			$tempData = unserialize(uncompress($this->data->infoSerialized['vis_pag_grp'],1));
			$tabStatVal = split(",", $statVal);
			$returnData = $tempData;
			foreach ($tabStatVal as $key) {
				if (isset ($returnData[$key])) {
					$returnData = $returnData[$key];
				}
				else {
					$returnData = null;
					break;
				}
			}
			if (isset($returnData["p_pmv_sum"])) {
//				$this->returnAllElemXML($returnData["p_pmv_sum"]);
				$this->returnAllElemXML($returnData);
			}
			else {
				$this->returnAllElemXML($returnData);
			}
			//var_dump($tempData);
			//print "fin";
			//exit;
			exit;
*/
/*
		}
		elseif ($selectCat != "") {
			if ($selectCat == "-1") {
				$this->returnAllElemXML(
						$this->returnQueryXML("SELECT idcategory, complete_name, name, level, idparent FROM ".T_CATEGORY." WHERE level=1",
									"SELECT idpage, idcategory, name  FROM ".T_PAGE." WHERE idcategory = 0"));
			}
			else {
				$this->loadSubCategory ($selectCat);				
			}
			
			//$this->returnXML ("SELECT idcategory, complete_name, name, level, idparent FROM ".T_CATEGORY." WHERE level = 3");
			//$this->returnXML ("SELECT idpage, idcategory, name  FROM ".T_PAGE." WHERE idcategory = 0");
			//$this->returnXML ("SELECT idcategory, complete_name, name, level, idparent FROM ".T_CATEGORY." WHERE level = 3");
		}
		else {
		
			// Select first categories
			$allElem = $this->returnQueryXML("SELECT idcategory, complete_name, name, level, idparent FROM ".T_CATEGORY." WHERE level=1",
									"SELECT idpage, idcategory, name  FROM ".T_PAGE." WHERE idcategory = 0");
			$this->tpl->assign("FirstCategoryList", $allElem);
		}		
*/		
		
/*

		$a_dataToLoad = array(
				
				// tables
				'searchengines' 		=> 'refererssearchengines',
				'searchenginesinterest' => 'refererssearchenginesinterest',
				'keywords'				=> 'refererskeywords',
				'keywordsinterest' 		=> 'refererskeywordsinterest',
				'sites' 				=> 'refererssites',
				'sitesinterest' 		=> 'refererssitesinterest',
				'partners' 				=> 'refererspartners',
				'partnersinterest'		=> 'refererspartnersinterest',
				'newsletters' 			=> 'referersnewsletters',
				'newslettersinterest' 	=> 'referersnewslettersinterest',
				'typeinterest' 			=> 'refererstypeinterest',
				
			);
			
				
		$o_mod = new ViewDataArray( null );
		$o_mod->init($this->request);//, $this->tpl);
		
		foreach($a_dataToLoad as $key => $value)
		{
			//printTime('before'.$key, true);
			$this->tpl->assign( $key, $o_mod->showAll( $value , true, true ));
		}

		$this->request->setModuleName('view_referers');
		
		$methodsToLoad = array(
			"numbers" => array()
		);
		$this->getDataMethod( $methodsToLoad );
*/
}
?>