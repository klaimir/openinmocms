<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: commonDB.php 237 2009-12-16 14:29:03Z matthieu_ $


// connnexion BDD

/*define('DB_HOST', 'localhost'); 
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'nintendo');
define('DB_NAME', 'v2');
*/

define ("KEY_PHPMV", "PHPMV");

class Db
{
	var $host;
	var $login;
	var $password;
	var $name;
	var $state;
	var $allInstalled;
	var $pluginKey;
		
	function Db($p_PluginKey)
	{
		$this->pluginKey = $p_PluginKey;
	}
	
	/**
     * Singleton
     */
    function &getInstance($p_PluginKey = KEY_PHPMV)
    {
     	static $PluginTabInstance;
        if (!isset($PluginTabInstance)){
        	$PluginTabInstance = array();
        }
        if (!isset($PluginTabInstance[$p_PluginKey])) {
        	$c = __CLASS__;
        	$instance = new $c($p_PluginKey);
        	$PluginTabInstance[$p_PluginKey] =& $instance;
        }
        else {
        	$instance =& $PluginTabInstance[$p_PluginKey];
        }
		return $instance;
    }
	
	function connect()
	{
		$this->host = DB_HOST;
		$this->login = DB_LOGIN;
		$this->password = DB_PASSWORD;
		$this->name = DB_NAME;
		$this->init();
	}
	
	function init()
	{
		$this->connection = @mysql_connect(
							$this->host,
							$this->login,
							$this->password
						);
	
		
		if(!$this->connection) 
		{ 
			$this->state = false;
			$GLOBALS['header_error_message_tpl'] = "'".$this->host ."' 
							database connection error! <br/>".mysql_error() ;
			
		} 
		else
		{
			
			// sélection BDD
			$selection = @mysql_select_db( $this->name, $this->connection);
			if(!$selection) 
			{ 
				$this->state = false;
				$GLOBALS['header_error_message_tpl'] = "'". $this->name ."' database selection error! <br/>".mysql_error() . "<br>" ; 
			}
			else
			{
				$this->state = true;
			}
		}
		return true;
	}
	
	function close()
	{
		mysql_close($this->connection);
	}
	
	function isReady()
	{
		return $this->state;
	}

	function getInstallSqlFile() {
		if ($this->pluginKey == KEY_PHPMV) {
			return INCLUDE_PATH . "/core/include/installSql.php";
		}
		else {
			return PLUGINS_PATH.$this->pluginKey."/updates/installSql.php";
		}
	}

	function getUpdatesDir() {
		if ($this->pluginKey == KEY_PHPMV) {
			return INCLUDE_PATH . "/core/include/updates/";
		}
		else {
			return PLUGINS_PATH.$this->pluginKey."/updates/";
		}
	}
	
	function getPluginPrefix() {
		if ($this->pluginKey == KEY_PHPMV) {
			return DB_TABLES_PREFIX;
		}
		else {
			return DB_TABLES_PREFIX.$this->pluginKey."_";
		}
	}
	
	function getConstantTableName ($name) {
		if ($this->pluginKey == KEY_PHPMV) {
			return 'T_' . strtoupper($name);
		}
		else {
			return 'T_' . strtoupper($this->pluginKey."_".$name);
		}
	}
	
	function getAllTablesList()
	{
		$create = array();
		$tmpFile = $this->getInstallSqlFile();
		if (is_file($tmpFile)) {
			if ($this->pluginKey != KEY_PHPMV) {
				$prefixPlugin = $this->getPluginPrefix();
			}
			require $tmpFile;
		}
		return array_keys($create);
	}
	
	function areAllTablesInstalled()
	{
		return sizeof($this->getAllInstalledTables()) === sizeof($this->getAllTablesList());
	}
	
	function getAllInstalledTables()
	{
		if( !defined('DB_TABLES_PREFIX') ) 
			return array();
			
		if(!isset($this->allInstalled) )
		{
			$all = $this->getAllTablesList();
			$prefixedTables = array();
			foreach($all as $name)
			{
				$prefixedTables[] = $this->getPluginPrefix() . $name;
			}

			$r = query('SHOW TABLES');
			
			while($l = mysql_fetch_row($r))
			{
				$name = $l[0];
				
				if(in_array($name, $prefixedTables))
				{ 
					$this->allInstalled[] = $l[0];
				}
			}
		}
		return $this->allInstalled;
	}
	
	function eraseExistingTables()
	{
		foreach($this->allInstalled as $name)
		{
			$r = query("DROP TABLE `$name`");
		}
	}
	
	function createAllTables($p_version = PHPMV_VERSION)
	{
		$create = array();
		$createRecords = array();
		//print("create tables!");
		$tmpFile = $this->getInstallSqlFile();
		if (is_file($tmpFile)) {
			if ($this->pluginKey != KEY_PHPMV) {
				$prefixPlugin = $this->getPluginPrefix();
			}
			require $tmpFile;
		}
		
		foreach($create as $sqlCode)
		{			
			$r = query($sqlCode);
		}
		foreach($createRecords as $sqlCode)
		{			
			$r = query($sqlCode);
		}
		
		$this->updateVersion($p_version);
	}
	
	function updateTables ($p_version = PHPMV_VERSION) {
		$dirUpdates = $this->getUpdatesDir();
		$oldVersion = $this->getVersion();
		
		if($dh = opendir( $dirUpdates ))
		{
			while(($file = readdir($dh)) !== false)
			{
				if($file != "update-currentversion.php" 
				&& preg_match("/^update-(.*)\.php$/", $file, $matches))
				{
					if(version_compare( $oldVersion, $matches[1] ) == -1)
					{
						require $dirUpdates . $matches[0];
					}
				}
			}
			closedir($dh);
		}
		
		$this->setVersion($p_version);
	}
	
	function defineTables()
	{
		if(defined('DB_TABLES_PREFIX'))
		{
			$tables = $this->getAllTablesList();
			foreach($tables as $name)
			{
				if (! defined($this->getConstantTableName ($name))) {
					define($this->getConstantTableName ($name), $this->getPluginPrefix() . $name);
				}
			}
		}
	}

	function updateVersion($p_version = PHPMV_VERSION)
	{
		if ($this->pluginKey == KEY_PHPMV) {
			$r = query("UPDATE ".T_VERSION."
						SET `version` = '".PHPMV_VERSION."' 
						LIMIT 1");
		}
		else {
		$r = query("UPDATE ".T_PLUGIN_VERSION."
					SET `version` = '".$p_version."' 
					WHERE code = '".$this->pluginKey."'");
		}
	}
	
	function setVersion( $p_version )
	{
		if ($this->pluginKey == KEY_PHPMV) {
			$r = query("DELETE FROM ".T_VERSION);
			$r = query("INSERT INTO ".T_VERSION." (version)
						VALUES ('".$p_version."')");
		}
		else {
			$r = query("DELETE FROM ".T_PLUGIN_VERSION." WHERE code = '".$this->pluginKey."'");
			$r = query("INSERT INTO ".T_PLUGIN_VERSION." (code, version)
						VALUES ('".$this->pluginKey."', '".$p_version."')");
		}
	}
	
	function getVersion()
	{
		if(!isset($this->version))
		{
			$this->loadVersion();
		}
		return $this->version;
	}
	
	function loadVersion()
	{
		if ($this->pluginKey == KEY_PHPMV) {
			$r = query("SELECT version
						FROM ".T_VERSION);
		}
		else {
			$r = query("SELECT version
						FROM ".T_PLUGIN_VERSION." WHERE code = '".$this->pluginKey."'");
		}
					
		$rr = mysql_fetch_assoc($r);
		
		$return = $rr['version'];
		
		if ($this->pluginKey == KEY_PHPMV) {
			$this->version = empty($return) ? '2.0beta1' : $return;
		}
		else {
			$this->version = empty($return) ? '0.1beta1' : $return;
		}
	}
}


/**
 * performs a query to the database and manage errors
 * 
 * @param string $query SQL Query
 * @param int $line line of the file where the query is called
 * 
 * @return resource mysql_query
 */
function query($query)
{
	$db =& Db::getInstance();
	if($db->isReady())
	{
		if(!isset($GLOBALS['query_log'][$query]))
		{
			$GLOBALS['query_log'][$query]=0;
		}
		$GLOBALS['query_log'][$query]++;
		if(!isset($GLOBALS['query_count']))
		{
			$GLOBALS['query_count'] = 0;
		}
		
		if(!isset($GLOBALS['total_time_query']))
		{
				$GLOBALS['total_time_query'] = 0;
		}
		$GLOBALS['query_count']++;
		
		$beg = getMicrotime();
		if(PRINT_QUERY)
		{
			$a_d = debug_backtrace();
			printDebug("<hr><i>line  : ".$a_d[0]['line']." in file ".$a_d[0]['file']."</i><br>".$query."<br>");
		}	
		
		$r = mysql_query($query);
		
		$end = getMicrotime()-$beg;
		$res = getMicrotime()-$GLOBALS['time_start'];
		$GLOBALS['total_time_query'] += $end;
		
		if(PRINT_QUERY)
		{
			if($end>TIME_SLOW_QUERY)
			{
				$GLOBALS['slow_queries'][] = $query."<br><b>$end s</b>";
			}
			printDebug("Total time : <b>$res</b> | Query Time <b>".substr($end, 0, 6)."</b> sec<br><br>");
		}
		
		if($r)
		{
			return $r;
		}
		else
		{		
			print(mysql_error()."</b>");
			print("<br><br>Query : ".$query);
			exit();
			return;
		}
	}
	return false;
}

// $arr =
// field name => value

// $idField = idfieldname
function updateLine($table, $a_fieldNamesValues, $idFieldName)
{
	$values = array();
	foreach($a_fieldNamesValues as $key => $val)
	{                
		if ((isset($key) && isset($val)) && (!empty($key) && ($val == 0 || !empty($val)) ))
		{
			$values[] = "$key = '$val'";
		}
	}
	if ( !count($values) ) 
	{
		return false;
	}
	$query = "UPDATE $table 
				SET ".implode(", ", $values)." 
				WHERE $idFieldName = '".$a_fieldNamesValues[$idFieldName]."' 
				LIMIT 1";
	$r = query( $query );
	if(mysql_affected_rows() === 0)
	{
		//print(mysql_error()." <= Requete UPDATE n'affecte aucune ligne ! <br><b>$query</b><br><br>");
		//exit;
	}
	return $r;
}

function insertLine( $table, $a_fieldNames, $a_values )
{
	$r = query("INSERT INTO $table (".implode(", ", $a_fieldNames).")
				VALUES ('".implode("','", $a_values)."')
				");
	return mysql_insert_id();
}

?>