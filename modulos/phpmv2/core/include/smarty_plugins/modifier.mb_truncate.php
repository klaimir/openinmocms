<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty mb_truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     mb_truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string. (MultiByte version)
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @param string
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @return string
 */
function smarty_modifier_mb_truncate($string, $length = 80, $etc = '...', $break_words = false)
{
	if ($length == 0)
	{
		return '';
	}
	$string = str_replace("&amp;", "&", $string);
	if(function_exists("mb_internal_encoding")
		&& function_exists("mb_strlen")
		&& function_exists("mb_substr")
		)
	{
		mb_internal_encoding("UTF8");
		
		if (mb_strlen($string) > $length) 
		{
			$length -= mb_strlen($etc);
			
			if (!$break_words)
			{
				$string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1));
			}
			$string =  mb_substr($string, 0, $length).$etc;
		}
	}
	else
	{
		//modifier.truncate
		if (strlen($string) > $length) 
		{
			$length -= strlen($etc);
			if (!$break_words)
			{
				$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
			}
			
			$string =  substr($string, 0, $length).$etc;
		} 
	}
	
	$string = str_replace("&", "&amp;", $string);
	return $string;
}

/* vim: set expandtab: */

?> 