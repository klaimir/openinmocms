<?php
	
$allQueries = array(
'DROP TABLE IF EXISTS '.T_PLUGIN_VERSION,
"CREATE TABLE ".T_PLUGIN_VERSION." (
  `code` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  PRIMARY KEY  (`code`)
) TYPE=MyISAM
"
);

foreach($allQueries as $query)
{
	query($query);
}	
	
	
?>