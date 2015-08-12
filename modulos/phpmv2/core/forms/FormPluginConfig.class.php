<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: FormPdfConfig.class.php 29 2006-08-18 07:35:21Z matthieu_ $



require_once INCLUDE_PATH . "/core/forms/Form.class.php";
require_once INCLUDE_PATH . "/core/include/SiteConfigDb.class.php";
require_once INCLUDE_PATH . "/core/include/Cookie.class.php";
require_once INCLUDE_PATH . "/core/include/PdfConfigDb.class.php";
require_once INCLUDE_PATH . "/libs/Xml/Unserializer.php";

class FormPluginConfig extends Form
{
	var $listAvailablePlugin;
	var $configPluginFile;
	
	function FormPluginConfig( &$template)
	{
		parent::Form( $template );
		
		// Get installed plugins
		$this->configPluginFile = &PmvConfig::getInstance("plugin.php", false);
		
		// Get list available plugins
		$dir = PLUGINS_PATH;
	    $d = dir($dir);
	    $arDir = array();
	    
	    while (false !== ($entry = $d->read())) 
	    {
			if($entry != '.' 
				&& $entry != '..'
				&& is_dir($dir.$entry)
				&& is_file($dir.$entry."/config.xml")) 
			{
				$serializer_options = array (
				    'addDecl' => TRUE,
				    'encoding' => 'UTF-8',
				    'indent' => '  ',
				    'rootName' => 'plugin',
				    'defaultTagName' => 'item',
				    'rootAttributes' => array ( 'version' => '1.0'));
				
				
				$unserializer = &new XML_Unserializer($serializer_options);
				if (($res = $unserializer->unserialize($dir.$entry."/config.xml", true)) === true) 
				{
					$conf = $unserializer->getUnserializedData();
					if (isset($this->configPluginFile ->content[$entry])) 
					{
						$conf['pmv_install'] = true;
						$conf['pmv_type'] = $this->configPluginFile ->content[$entry]['type'];
						$conf['pmv_menuModName'] = $this->configPluginFile ->content[$entry]['menuModName'];
					}
					else 
					{
						$conf['pmv_install'] = false;
						$conf['pmv_type'] = $conf['type'];
						$conf['pmv_menuModName'] = $conf['menuModName'];
					}
					
					if ( isset($conf['langPath']) && !empty($conf['langPath'])) 
					{
						Lang::addPluginLangFile ($entry."/".$conf['langPath'], $conf['defaultLang']);
					}
					$arDir[$entry] = $conf;
				}
			}
	    }
	    $d->close();
	    $this->listAvailablePlugin = $arDir;
	}
	
	function process()
	{
		$listType = array('admin' => 'Admin',
						'menu' => 'Menu',
						'all' => 'All');
		$this->tpl->assign('listType', $listType);

		$listMenu = array("view_visits" => 'menu_visites',
						"view_frequency" => 'frequence_titremenu',
						"view_pages" => 'menu_pagesvues',
						"view_followup" => 'menu_suivi',
						"view_source" => 'menu_provenance',
						"view_settings" => 'menu_configurations',
						"view_referers" => 'menu_affluents');
		$this->tpl->assign('listMenu', $listMenu);
		// Get plugin list
		$this->tpl->assign('listPlugin', $this->listAvailablePlugin);

		// launche process
		return parent::process('admin_pdf_title');
	}
	
	function postProcess() {
		$tabConfig = array();
		foreach ($this->listAvailablePlugin as $key => $value) {
			$installPlugin = $this->getSubmitValue("PluginInstall$key");
			if ($installPlugin == "true") {
				$tabConfig[$key] = $value;
				$tabConfig[$key]['type'] = $this->getSubmitValue("type$key");
				$tabConfig[$key]['menuModName'] = $this->getSubmitValue("menuModName$key");
				//echo "$key : to install<br>";
				// Install table
				$thereIsNoTable = false;
				if (is_dir(PLUGINS_PATH.$key."/updates")) {
					$db =& Db::getInstance($key);
					$tablesInstalled = $db->getAllInstalledTables();
					// some tables are already in the database
					if(sizeof($tablesInstalled) > 0) {
						$thereIsNoTable = false;
					}
					else {
						$thereIsNoTable = true;
					}
					if($thereIsNoTable) {
						$db->createAllTables();
						$db->setVersion( $tabConfig[$key]['version'] );
					}
					elseif ($db->getVersion() != $tabConfig[$key]['version']){
						$db->updateTables ($tabConfig[$key]['version']);
					}
				}
			}
			else {
				//echo "$key : to desinstall<br>";
			}
		}
		$this->configPluginFile->content = $tabConfig;
		$this->configPluginFile->write();
	}
}
?>