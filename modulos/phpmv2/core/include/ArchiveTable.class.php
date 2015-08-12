<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: ArchiveTable.class.php 198 2007-01-17 16:47:59Z matthieu_ $



/**
 * Class that manages with database tables a_*
 * It records all datas, getId associated with Names, Name from Id, etc.
 */
class ArchiveTable
{
	/**
	 * @var string suffix of the table
	 */
	var $tableName; // suffix of a_* tables
	
	/**
	 * @var array contains NameToId relation
	 */
	var $nameToId;
	
	/**
	 * @var array contains idToName relation
	 */
	var $idToName;
	
	var $arrayAlreadyLoaded;
	/**
	 * Constructor
	 * 
	 * @param string $type suffix of the table
	 */
	function ArchiveTable($type)
	{
		$this->tableSuffix=$type;
		$this->tableName = DB_TABLES_PREFIX.'a_'.$type;
		$this->nameToId = array();
		$this->idToName = array();
		$this->arrayAlreadyLoaded = array();
	}

	/**
	 * returns name associated to int id
	 * 
	 * @param int|array $id
	 * 
	 * @return string 
	 */
	function getName($id)
	{
		if(empty($id) || $id == -1)
		{
			return "default";
		}
		
		if(!isset($this->idToName[$id]))
		{
			$this->loadName($id);
		}
		
		return stripslashes($this->idToName[$id]);
	}
	
	function loadName($id)
	{
		if(is_array($id))
		{
			foreach($id as $eachId)
			{
				$this->idToName[$eachId] = 'default';
			}
			sort($id);

			$r = query("SELECT name, id " .
				" FROM ".$this->tableName.
				" WHERE id IN (".implode(',',$id).")"
			);
		}
		else
		{
			$id = (int)$id; // in some case its not int, why??
			$r = query("SELECT name, id 
					 FROM ".$this->tableName."
					 WHERE id = $id");
		
		}
		
		if(isset($r) && mysql_num_rows($r) != 0)
		{
			while($l = mysql_fetch_assoc($r))
			{
				//fix FS#209 - Unicode <title> problem
				$l['name'] = U2U($l['name']);
				
				$this->nameToId[$l['name']] = $l['id'];
				$this->idToName[$l['id']] = $l['name'];
			}
		}
		else
		{
			if(is_array($id))
			{
				foreach($id as $eachId)
				{
					// case http://www.phpmyvisites.us/forums/index.php/m/13777/
					// first day with unknown ID
					if($eachId >= 0)
					{
						$this->idToName[$eachId] = "Unknown ($eachId in ".$this->tableName.")";
					}
				}
			}
			else {
				$id = (int)$id; // in some case its not int, why??
				$this->idToName[$id] = "Unknown ($id in ".$this->tableName.")";
			}
		}
				
	}
	
	/**
	 * returns id associated to string name
	 * 
	 * @param string $name
	 * 
	 * @return id
	 */
	function getId($name)
	{
		//if($this->tableSuffix=='page') trigger_error("stop dude $name", E_USER_ERROR);
		$name = databaseEscape(stripslashes($name));
		
		if(empty($name))
		{
			return -1;
		}
		if(isset($this->nameToId[$name]))
		{
			return $this->nameToId[$name];
		}
		else
		{
			$r = query("SELECT id
						FROM ".$this->tableName."
						WHERE name = '$name'
						LIMIT 1");
			if(mysql_num_rows($r) == 0)
			{
				return $this->save($name);
			}
			else
			{
				$l = mysql_fetch_assoc($r);
				$this->nameToId[$name] = $l['id']; 
				$this->idToName[$l['id']] = $name; 
				//printDebug("$name is id ".$l['id']);
				return $this->getId($name);
			}
		}
	}

	/**
	 * Saves the name in the table
	 * Called by this->getId when asked id<->name doesn't exist yet
	 * 
	 * @param string $name
	 * 
	 * @return id of the row inserted
	 */
	function save($name)
	{
		//if($this->tableSuffix=='page') trigger_error("stop dude $name", E_USER_ERROR);
		$r = query("INSERT INTO ".$this->tableName." (name)
					VALUES ('$name')");
		$i = mysql_insert_id();
		//print("$i <br>");
		return $i;
	}
}
?>