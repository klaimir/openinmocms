<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: PmvConfig.class.php 162 2006-11-11 16:16:47Z cmil $

require_once INCLUDE_PATH."/core/include/commonDB.php";
		
class PmvConfig
{
	
	var $url; // config file
	var $content; // config file content array
	var $varname = "config"; // var namein file
	
	function PmvConfig($p_fileName = "config.php", $setDefineAsConstant = true)
	{
		$this->url = INCLUDE_PATH . "/config/".$p_fileName;
		$this->content = array();
		$this->varname = substr($p_fileName, 0, strpos($p_fileName, "."));
		
		if(!@is_file($this->url))
        {
			//trigger_error("Unable to load base config file, can't continue...", E_USER_WARNING);
        }
		else
		{
			include $this->url;
			
			if (!is_array(${$this->varname}))
	        {
				trigger_error('Unattended config file format, please verify or delete your configuration file', E_USER_WARNING);
	        }
			else
			{
				$this->content = ${$this->varname}; //$config;
				if ($setDefineAsConstant) {
					$this->defineAsConstant( $this->content );
				}
			}
		}
		if ($p_fileName == "config.php") {
			//$this->defineTables();
			$db =& Db::getInstance();
			$db->defineTables();
		}
		elseif ($p_fileName == "plugin.php") {
			//$this->defineTables();
			foreach($this->content as $key => $val) {
				$db =& Db::getInstance($key);
				$db->defineTables();
			}
		}
	}
    
	/**
     * Singleton
     */
    function &getInstance($p_fileName = "config.php", $setDefineAsConstant = true)
    {
//        static $instance;
//        if (!isset($instance)){
//            $c = __CLASS__;
//            $instance = new $c($p_fileName, $setDefineAsConstant);
//        }
 		static $PmvConfigTabInstance;
        if (!isset($PmvConfigTabInstance)){
        	$PmvConfigTabInstance = array();
        }
        if (!isset($PmvConfigTabInstance[$p_fileName])) {
        	$c = __CLASS__;
        	$instance = new $c($p_fileName, $setDefineAsConstant);
        	$PmvConfigTabInstance[$p_fileName] =& $instance;
        }
        else {
        	$instance =& $PmvConfigTabInstance[$p_fileName];
        }
		return $instance;
    }
	
//	function defineTables()
//	{
//		if(defined('DB_TABLES_PREFIX'))
//		{
//			$db =& Db::getInstance();
//			$tables = $db->getAllTablesList();
//			foreach($tables as $name)
//			{
//				define('T_' . strtoupper($name), DB_TABLES_PREFIX . $name);
//			}
//		}
//	}
	
	function defineAsConstant( $a_vars )
	{       
		foreach ($a_vars as $constName => $constValue) 
		{
			define(strtoupper($constName), $constValue);
		}
	}
	
	function update( $a_varValue )
	{
		$this->content = array_merge( $this->content, $a_varValue );
	}
	
	function write()
	{
		saveConfigFile( $this->url, $this->content, $this->varname);
	}
}
?>