<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: ViewReferers.class.php 29 2006-08-18 07:35:21Z matthieu_ $


require_once INCLUDE_PATH."/core/include/ViewModule.class.php";
require_once INCLUDE_PATH."/libs/Xml/Serializer.php";
require_once INCLUDE_PATH."/plugins/xmlapi/include/CallFunction.class.php";
require_once INCLUDE_PATH."/plugins/xmlapi/include/CallFunctionParameter.class.php";

class ViewXmlapi extends ViewModule
{
    var $viewTemplate = "xmlapi/viewxmlapi.tpl";
    
    /**
     * Constructor
     */
	function ViewXmlapi()
	{
		parent::ViewModule( "pages");
	}
	
	
	function returnQueryXML ($p_query, $p_query2 = "") {
		$r = query($p_query);
		$allElem = array();
		while($l = mysql_fetch_assoc($r))
		{
			$l['idcategory'] = "c".$l['idcategory'];
			$allElem[] = $l;
		}
		if ($p_query2 != "") {
			$r = query($p_query2);
			while($l = mysql_fetch_assoc($r))
			{
				if (isPrefixTag($l['name'])) {
					$l['idpage'] = "f".$l['idpage'];
				}
				else {
					$l['idpage'] = "p".$l['idpage'];
				}
				$allElem[] = $l;
			}
		}
		return $allElem;
	}
	
	function returnAllElemXML ($allElem, $p_request) {
		// An array of serializer options
		$serializer_options = array (
			    'addDecl' => TRUE,
			    'encoding' => 'UTF-8',
			    'indent' => '  ',
			    'rootName' => 'XmlApi',
			    'defaultTagName' => 'item',
			    'rootAttributes' => array ( 'version' => '1.0', 'request' => $p_request),
		);
			
		$Serializer = &new XML_Serializer($serializer_options);
		// Serialize the data structure
		$Serializer->setOption("keyAttribute", "rdf:about");
		
		$status = $Serializer->serialize($allElem);
		
		$allData =  $Serializer->getSerializedData();
		
		// Display the XML document
		header('Content-type: text/xml');
		print($allData);
		exit;
	}

	function initFunctionTab () {
		$tmpTab = array();
		$tmp = new CallFunction("getViewPage", "Get visit to pages", "getPagesZoom", "sum.1");
		$tmp->addParameter("cat", "Categorie id (sample : c1697 or c1697>c1701)", "");//sample : c1697 => c_id_zoom in url
		$tmpTab[$tmp->fctApiName] = $tmp;
		
		$tmp = new CallFunction("getTimePages", "Get time by pages", "getPagesZoom", "sumtime");
		$tmp->addParameter("cat", "Categorie id (sample : c1697 or c1697>c1701)", "");//sample : c1697 => c_id_zoom in url
		$tmpTab[$tmp->fctApiName] = $tmp;

		$tmp = new CallFunction("getVisitsStatistics", "Get visit statisitics", "getVisitsStatistics", ""); //one_page_rate
		$tmpTab[$tmp->fctApiName] = $tmp;
		
		return $tmpTab;
		
	}
	/**
	 * Data processing method
	 * only called if template is not cached
	 */
	function process()
	{
		$request = getRequestVar ('request', "", 'string');
		$tab = $this->initFunctionTab ();
		
		if ($request == "") {
			
			$this->tpl->assign("XmlapiFunctionTab", $tab);
			$this->tpl->assign("PHPMV_URL", PHPMV_URL);
		}
		else {
			// Get function element
			$fct = $tab[$request];
			
			// Get parameter from url
			$tabParam = array();
			foreach ($fct->fctParameters as $key => $elem) {
				$tabParam[$elem->fctParamName] = html_entity_decode(getRequestVar ($elem->fctParamName, 
							$elem->fctParamDefaultValue, 'string'));
				//echo "test : " . $tabParam[$elem->fctParamName] . "<br>";
			}
			
			// Call function with parameters
			//$data = $this->data->{$fct->fctCodeName}();
			$data = call_user_func_array(array(& $this->data, $fct->fctCodeName), $tabParam);
			
			// Get anly specific detail
			if ($fct->fctResultDetail != "") {
				$resultTab = split("[/.-]", $fct->fctResultDetail);
				foreach ($resultTab as $key => $elem) {
					$data = $data[$elem];
				}
			}
			
			// Return xml
			$this->returnAllElemXML($data, $fct->fctApiName);
		}
	}
}
?>