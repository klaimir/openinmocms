<?php
	
$allQueries = array(
' ALTER TABLE `'.T_IP_IGNORE.'` CHANGE `ip_min` `ip_min` BIGINT( 11 ) NULL DEFAULT NULL ,
CHANGE `ip_max` `ip_max` BIGINT( 11 ) NULL DEFAULT NULL 
'
);

foreach($allQueries as $query)
{
	query($query);
}	
	
	
?>