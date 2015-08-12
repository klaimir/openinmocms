<?php
	
$allQueries = array(
'DROP TABLE IF EXISTS '.T_PDF_CONFIG,
"CREATE TABLE ".T_PDF_CONFIG." (
  idpdf int(10) unsigned NOT NULL auto_increment,
  name_pdf varchar(90) default NULL,
  params_pdf longblob,
  PRIMARY KEY  (idpdf)
) TYPE=MyISAM
",
'DROP TABLE IF EXISTS '.T_PDF_SITE_USER,
"CREATE TABLE ".T_PDF_SITE_USER." (
  `idsite` int(10) unsigned NOT NULL default '0',
  `login` varchar(20) NOT NULL default '0',
  `idpdf` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idsite`,`login`,`idpdf`)
) TYPE=MyISAM
",
//"ALTER TABLE ".T_SITE." DROP `idpdf`",
"ALTER TABLE ".T_SITE."  ADD `idpdf` INT( 10 ) DEFAULT '-1' NOT NULL AFTER `params_names`",
//"ALTER TABLE ".T_SITE." DROP `path_theme`",
"ALTER TABLE ".T_SITE."  ADD `path_theme` varchar(255) default 'default' NOT NULL AFTER `idpdf`",
//"ALTER TABLE ".T_VISIT."  DROP `javascript",
"ALTER TABLE ".T_VISIT."  ADD `javascript` tinyint(1) DEFAULT '0' NOT NULL AFTER `java`",
//"ALTER TABLE ".T_VISIT."  DROP `cookie`",
"ALTER TABLE ".T_VISIT."  ADD `cookie` tinyint(1) DEFAULT '0' NOT NULL AFTER `windowsmedia`"
);

foreach($allQueries as $query)
{
	query($query);
}	
	
	
?>