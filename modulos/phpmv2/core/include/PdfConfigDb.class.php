<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: PdfConfigDb.class.php 29 2006-08-18 07:35:21Z matthieu_ $

require_once INCLUDE_PATH."/core/include/PdfConfig.class.php";

define("PDF_INDEX_KEY", 0);
define("PDF_INDEX_ALL", 1);
define("PDF_INDEX_INT", 2);
define("PDF_INDEX_AUTRE", 3);
define("PDF_KEY_FREE_PAGE", "PG8");


define("PDF_FLD_PUBLIC", "public");
define("PDF_FLD_PARAM", "param");

class PdfConfigDb {
	var $siteId;
	var $lstPdf;
	var $cookie;
	var $isload = false;

	function PdfConfigDb($idSite, $selectAll = false) 
	{
		$this->siteId = $idSite;

		$user =& User::getInstance();
		if (($selectAll) || ($user->suPermission)) {
			$q = "SELECT PDFSU.idsite, PDFC.idpdf, PDFC.name_pdf, PDFC.params_pdf, PDFSU.login "
					." FROM ".T_PDF_CONFIG." PDFC, ".T_PDF_SITE_USER." PDFSU "
					." WHERE (PDFSU.idsite = ".$this->siteId." OR PDFSU.idsite = 0)"
					." AND PDFSU.idpdf = PDFC.idpdf "
					." ORDER BY PDFSU.idsite, PDFC.name_pdf"
					;
		}
		else 
		{
			$q = "SELECT PDFSU.idsite, PDFC.idpdf, PDFC.name_pdf, PDFC.params_pdf, PDFSU.login "
					." FROM ".T_PDF_CONFIG." PDFC, ".T_PDF_SITE_USER." PDFSU "
					." WHERE (PDFSU.idsite = ".$this->siteId." OR PDFSU.idsite = 0) "
					." AND PDFSU.idpdf = PDFC.idpdf "
					." AND PDFSU.login = '".$user->getLogin()."' "
					." ORDER BY PDFSU.idsite, PDFC.name_pdf"
					;
		}
		
		$r = query($q);
		
		$this->lstPdf = array();
		if($r)
		{
			while($l = mysql_fetch_assoc($r))
			{
			    $varValue = base64_decode($l['params_pdf']);
			    // some of the values may be serialized array so we try to unserialize it 
        	    if (preg_match('/^a:[0-9]+:\{/', $varValue) 
        	        && !preg_match('/(^|;|{|})O:[0-9]+:"/', $varValue) 
        	        && strpos($varValue, "\0") === false) 
        	    { 
    				$tabParam = @unserialize($varValue);
    				$isPublic = false;
    				if (is_array($tabParam)) {
    					if (isset($tabParam[PDF_FLD_PUBLIC])) {
    						$isPublic = $tabParam[PDF_FLD_PUBLIC];
    						$tabParam = $tabParam[PDF_FLD_PARAM];
    					}
    				}
    				$this->lstPdf[$l['idpdf']] = new PdfConfig($l['name_pdf'], $tabParam, $l['login'], $isPublic);
        	    }
			}
		}
		$this->isload = true;
		/*
		foreach ($this->lstPdf as $key2 => $info2) {
			print("conf : ".$key2." : ".$info2->pdfName."<br>");
			
			foreach ($info2->pdfParam as $key => $info) {
				print ("  conf : ".$key." : int : ".$info[PDF_INDEX_INT]." all : ".$info[PDF_INDEX_ALL]);
				if (isset($info[PDF_INDEX_AUTRE])) {
					print(", autre : ".$info[PDF_INDEX_AUTRE]);
				}
				print("<br>");
			}
		}
		*/

	}
	function addPdf($namePdf, $paramPdf, $isPublic = false) {
//		$idPdf = count($this->lstPdf);
//		$this->lstPdf[$idPdf] = new PdfConfig($namePdf, $paramPdf);
		
		$tabParam = array();
		$tabParam[PDF_FLD_PUBLIC] = $isPublic;
		$tabParam[PDF_FLD_PARAM] = $paramPdf;
		$content = serialize($tabParam);
		$content = base64_encode ($content);
		
		// Insert PDF
		$r = query("INSERT 
					INTO ".T_PDF_CONFIG."	(name_pdf, params_pdf) 
					VALUES ('$namePdf', '$content')
					");
		//Get id of pdf
		$r = query("SELECT idpdf FROM ".T_PDF_CONFIG."
					ORDER BY idpdf DESC
					");
		if ($l = mysql_fetch_assoc($r)) {
			$idPdf = $l['idpdf'];
			$user =& User::getInstance();
			if ($user->suPermission) {
				$login = PDF_LOGIN_ADMIN;
			}
			else {
				$login = $user->getLogin();
			}
			// Insert link
			if ($isPublic)
			{
				$r = query("INSERT 
							INTO ".T_PDF_SITE_USER."	(idsite, idpdf, login) 
							VALUES (0, $idPdf, '$login')
							");
			}
			else
			{
				$r = query("INSERT 
							INTO ".T_PDF_SITE_USER."	(idsite, idpdf, login) 
							VALUES (".$this->siteId.", $idPdf, '$login')
							");
			}
		}
	}
	
	function updatePdf($idPdf, $namePdf, $paramPdf, $isPublic = false) {
//		$this->lstPdf[$idPdf]->pdfName = $namePdf;
//		$this->lstPdf[$idPdf]->pdfParam = $paramPdf;
		
		$tabParam = array();
		$tabParam[PDF_FLD_PUBLIC] = $isPublic;
		$tabParam[PDF_FLD_PARAM] = $paramPdf;
		$content = serialize($tabParam);
		$content = base64_encode ($content);
		$r = query("UPDATE ".T_PDF_CONFIG."
					SET name_pdf = '$namePdf', params_pdf='$content'
					WHERE idpdf = $idPdf
					");

		$user =& User::getInstance();
		if ($user->suPermission) {
			$login = PDF_LOGIN_ADMIN;
		}
		else {
			$login = $user->getLogin();
		}

		if ($isPublic)
		{
			$r = query("UPDATE ".T_PDF_SITE_USER." set login='$login', idsite = 0" .
					" WHERE idpdf = $idPdf");
		}
		else
		{
			$r = query("UPDATE ".T_PDF_SITE_USER." set login='$login', idsite=".$this->siteId .
					" WHERE idpdf = $idPdf");
		}
	}
	
	function deletePdf($idPdf) {
		if (isset ($this->lstPdf[$idPdf])) {
			unset ($this->lstPdf[$idPdf]);
			// Delete all link to this pdf
			$r = query("DELETE 
					FROM ".T_PDF_SITE_USER."
					WHERE idpdf = $idPdf
					");
			// Delete config
			$r = query("DELETE 
					FROM ".T_PDF_CONFIG."
					WHERE idpdf = $idPdf
					");

		}
	}
	function getPdf($idPdf) {
		if (! isset ($this->lstPdf[$idPdf])) {
			$this->lstPdf[$idPdf] = new PdfConfig($GLOBALS['lang']['admin_get_default_pdfdefault'], $this->getDefaultPdf(), PDF_LOGIN_ADMIN);
		}
		$ret = $this->lstPdf[$idPdf];
		return $ret;
	}

	function getListPdf() {
		return $this->lstPdf;
	}
	
	
	function getChoixPdf() {
		return $this->listChapter;
	}
	
	function getDefaultPdf() {
		return $this->defaultSelectChapter;
	}

// TIT : Chapter title
// FCT : Function name
// INT : Has interest bloc
// ALL : Can show all data

var $listChapter = array (
		"PG0" => array (
			"TIT" => "summary_title",
			"PAG" => "true"),
		"SUM" => array (
			"TIT"  => "pdf_page_summary",
			"FCT" => "setPageSummary",
			"INT"  => "false",
			"ALL"  => "false"),
		"PG1" => array (
			"TIT" => "visites_titre",
			"PAG" => "true"),
		"VS1" => array (
			"TIT"  => "visites_statistiques",
			"FCT" => "setVisitsStatistics",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS2" => array (
			"TIT"  => "visites_recapperiode",
			"FCT" => "setVisitsPeriodSummaries",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS3" => array (
			"TIT"  => "visites_grapghrecap",
			"FCT" => "setVisitsPeriodSummariesGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS4" => array (
			"TIT"  => "visites_grapghrecaplongterm",
			"FCT" => "setVisitsAllPeriodSummaryGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS5" => array (
			"TIT"  => "visites_graphtempsvisites",
			"FCT" => "setVisitsTimeVisitsGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS6" => array (
			"TIT"  => "visites_graphheureserveur",
			"FCT" => "setVisitsServerTimeGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"VS7" => array (
			"TIT"  => "visites_graphheurevisiteur",
			"FCT" => "setVisitsLocalTimeGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"PG2" => array (
			"TIT" => "frequence_titre",
			"PAG" => "true"),
		"FQ1" => array (
			"TIT"  => "visites_statistiques",
			"FCT" => "setFrequencyStatistics",
			"INT"  => "false",
			"ALL"  => "false"),
		"FQ2" => array (
			"TIT"  => "frequence_nouveauxconnus",
			"FCT" => "setFrequencyNewReturnVisits",
			"INT"  => "false",
			"ALL"  => "false"),
		"FQ3" => array (
			"TIT"  => "frequence_nouveauxconnusgraph",
			"FCT" => "setFrequencyGraphNewReturnVisits",
			"INT"  => "false",
			"ALL"  => "false"),
		"FQ4" => array (
			"TIT"  => "pagesvues_vispervisgraph",
			"FCT" => "setFrequencyGraphNbVisitsPerVisitor",
			"INT"  => "false",
			"ALL"  => "false"),
		"PG3" => array (
			"TIT" => "pagesvues_titre",
			"PAG" => "true"),
		"PZ1" => array (
			"TIT"  => "pagesvues_titre",
			"FCT" => "setPagesZoomTab1",
			"INT"  => "false",
			"ALL"  => "false"),
		"PZ2" => array (
			"TIT"  => "pagesvues_pagesvues",
			"FCT" => "setPagesZoomTab2",
			"INT"  => "false",
			"ALL"  => "true"),
		"PZ3" => array (
			"TIT"  => "pagesvues_tempsparpage",
			"FCT" => "setPagesZoomTpsParPage",
			"INT"  => "false",
			"ALL"  => "true"),
		"PZ4" => array (
			"TIT"  => "pagesvues_graphsnbpages",
			"FCT" => "setPagesByVisitGraph",
			"INT"  => "false",
			"ALL"  => "false"),
		"PG4" => array (
			"TIT" => "suivi_titre",
			"PAG" => "true"),
		"FW1" => array (
			"TIT"  => "suivi_pageentree",
			"FCT" => "setFollowUpEntryPages",
			"INT"  => "false",
			"ALL"  => "true"),
		"FW2" => array (
			"TIT"  => "suivi_pagesortie",
			"FCT" => "setFollowUpExitPages",
			"INT"  => "false",
			"ALL"  => "true"),
		"FW3" => array (
			"TIT"  => "suivi_singlepage",
			"FCT" => "setFollowUpSinglePages",
			"INT"  => "false",
			"ALL"  => "true"),
		"PG5" => array (
			"TIT" => "provenance_titre",
			"PAG" => "true"),
		"SR1" => array (
			"TIT" => "provenance_mappemonde",
			"FCT" => "setWorldMap",
			"INT" => "false",
			"ALL" => "false",
			"PAR1" => "cont"),
		"SR2" => array (
			"TIT" => "provenance_recappays",
			"FCT" => "setSourceCountry",
			"INT" => "true",
			"ALL" => "true"),
		"SR3" => array (
			"TIT" => "provenance_fai",
			"FCT" => "setSourceProviders",
			"INT" => "false",
			"ALL" => "true"),
		"PG6" => array (
			"TIT" => "configurations_titre",
			"PAG" => "true"),
		"ST1" => array (
			"TIT" => "configurations_configurations",
			"FCT" => "setSettingsConfig",
			"INT" => "false",
			"ALL" => "true"),
		"ST2" => array (
			"TIT" => "configurations_os",
			"FCT" => "setSettingsOs",
			"INT" => "true",
			"ALL" => "true"),
		"ST3" => array (
			"TIT" => "configurations_navigateursbytype",
			"FCT" => "setSettingsBrowsersType",
			"INT" => "false",
			"ALL" => "false"),
		"ST4" => array (
			"TIT" => "configurations_navigateurs",
			"FCT" => "setSettingsBrowsersInterest",
			"INT" => "true",
			"ALL" => "true"),
		"ST5" => array (
			"TIT" => "configurations_plugins",
			"FCT" => "setSettingsPlugins",
			"INT" => "false",
			"ALL" => "false"),
		"ST6" => array (
			"TIT" => "configurations_resolutions",
			"FCT" => "setSettingsResolutionsInterest",
			"INT" => "true",
			"ALL" => "true"),
		"ST7" => array (
			"TIT" => "configurations_rapport",
			"FCT" => "setSettingsNormalWidescreen",
			"INT" => "false",
			"ALL" => "false"),
		"PG7" => array (
			"TIT" => "affluents_titre",
			"PAG" => "true"),
		"RF1" => array (
			"TIT" => "affluents_recapimg",
			"FCT" => "setReferersTypeInterest",
			"INT" => "true",
			"ALL" => "false"),
		"RF2" => array (
			"TIT" => "affluents_moteurs",
			"FCT" => "setReferersSearchEnginesInterest",
			"INT" => "true",
			"ALL" => "true"),
		"RF3" => array (
			"TIT" => "affluents_motscles",
			"FCT" => "setReferersKeywordsInterest",
			"INT" => "true",
			"ALL" => "true"),
		"RF4" => array (
			"TIT" => "affluents_sitesinternet",
			"FCT" => "setReferersSitesInterest",
			"INT" => "true",
			"ALL" => "true"),
		"RF5" => array (
			"TIT" => "affluents_partenaires",
			"FCT" => "setReferersPartnersInterest",
			"INT" => "true",
			"ALL" => "true"),
		"RF6" => array (
			"TIT" => "affluents_newsletters",
			"FCT" => "setReferersNewslettersInterest",
			"INT" => "true",
			"ALL" => "true"),
		"RF7" => array (
			"TIT" => "affluents_entreedirecte",
			"FCT" => "setReferersDirect",
			"INT" => "false",
			"ALL" => "false"),
		"PG8" => array (  //PDF_KEY_FREE_PAGE
			"TIT" => "pdf_free_page",
			"PAG" => "true",
			"PAR1" => "txt"),
		"SP1" => array (
			"TIT" => "pdf_free_chapter",
			"FCT" => "setPersonalChapter",
			"INT" => "false",
			"ALL" => "false",
			"PAR1" => "txt"),
		"SP2" => array (
			"TIT" => "pdf_page_break",
			"FCT" => "setPageBreak",
			"INT" => "false",
			"ALL" => "false")
		);

var $defaultSelectChapter = array (
		array ("PG0", "false","false"),
		array ("SUM", "false","false"),
		
		array ("PG1", "false","false"),
		array ("VS1", "false","false"),
		array ("VS2", "false","false"),
		array ("VS3", "false","false"),
		array ("VS4", "false","false"),
		array ("VS5", "false","false"),
		array ("VS6", "false","false"),
		array ("VS7", "false","false"),
		
		array ("PG2", "false","false"),
		array ("FQ1", "false","false"),
		array ("FQ2", "false","false"),
		array ("FQ3", "false","false"),
		array ("FQ4", "false","false"),
		
		array ("PG3", "false","false"),
		array ("PZ1", "false","false"),
		array ("PZ2", "false","false"),
		array ("PZ3", "false","false"),
		array ("PZ4", "false","false"),
		
		array ("PG4", "false","false"),
		array ("FW1", "false","false"),
		array ("FW2", "false","false"),
		array ("FW3", "false","false"),
		
		array ("PG5", "false","false"),
		array ("SR1", "false","false"),
		array ("SR2", "false","true"),
		array ("SR3", "false","false"),
		
		array ("PG6", "false","false"),
		array ("ST1", "false","false"),
		array ("ST2", "false","true"),
		array ("ST3", "false","false"),
		array ("ST4", "false","true"),
		array ("ST5", "false","false"),
		array ("ST6", "false","true"),
		array ("ST7", "false","false"),
		
		array ("PG7", "false","false"),
		array ("RF1", "false","true"),
		array ("RF2", "false","true"),
		array ("RF3", "false","true"),
		array ("RF4", "false","true"),
		array ("RF5", "false","true"),
		array ("RF6", "false","true"),
		array ("RF7", "false","false")
		);	

		
}
?>
