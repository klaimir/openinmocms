<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: index.php 220 2007-06-27 10:01:07Z matthieu_ $

define('INCLUDE_PATH', '.');
define('PLUGINS_PATH', INCLUDE_PATH."/plugins/");
// For profiling, XDEBUG 2.x generates .out to be analysed with KcacheGrind or WinCacheGrind
@set_time_limit(0);
@error_reporting(E_ALL);

require_once INCLUDE_PATH . '/core/include/PmvConfig.class.php';
require_once INCLUDE_PATH . '/core/include/ApplicationController.php';


ApplicationController::init();

if(	Request::moduleIsNotAStrangeModule() )
	printTime('EOF', PRINT_TIME);
?>