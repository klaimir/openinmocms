<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: Cookie.class.php 239 2009-12-16 21:49:07Z matthieu_ $


/**
 * Class that sets a cookie, read values, saves arrays in cookie, etc.
 */
class Cookie {

	/**
	 * @var string 
	 */
	var $name;
	
	/**
	 * @var array cookie content
	 */
	var $a_content = array();
	
	var $expire;
	
	/**
	 * Constructor
	 * 
	 * @param string $nameCookie
	 */
	function Cookie($nameCookie='pmv_cookie_default')
	{
		$this->expire = COOKIE_EXPIRE;
		
		$this->name=$nameCookie;
				
		if($this->isDefined())
		{
			$this->a_content = $this->get();
		}
		
		//print($this->toString());
		
	}
	
 	function setExpire( $ts )
	{
		$this->expire = $ts;
	}
	/**
	 * returns array contained in the cookie 
	 * 
	 * @return array
	 */
 	function getContent()
 	{
 		return $this->a_content;
 	}
	
	/**
	 * returns true if the cookie already exist, false else
	 * 
	 * @return bool
	 */
 	function isDefined()
 	{
 		return isset($_COOKIE[$this->name]);
 	}
	
	/**
	 * returns the size of the cookie content, in bytes
	 */
	function getSize()
	{
		return strlen($_COOKIE[$this->name]);
	}

	function toString()
	{
		return "Cookie ". $this->name. " : \n<br>Current: ".varToString( $this->get())." \n<br>Next: ".varToString( $this->getContent() );
	}
	
	/**
	 * returns the cookie's content array unserialized 
	 * 
	 * @return array 
	 */
	function get()
	{
	    $varValue = base64_decode($_COOKIE[$this->name]);
	    // some of the values may be serialized array so we try to unserialize it 
	    if (preg_match('/^a:[0-9]+:\{/', $varValue) 
	        && !preg_match('/(^|;|{|})O:[0-9]+:"/', $varValue) 
	        && strpos($varValue, "\0") === false) 
	    { 
    		$return = @unserialize($varValue);
    		if(is_array($return))
    		{
    			return $return;
    		}
	    }
		return array();
	}
	
	/**
	 * returns the $varName value from the array in the cookie
	 * 
	 * @param string $varName
	 * 
	 * @return string|false
	 */
	function getVar($varName)
	{
		if(is_array($this->a_content) && isset($this->a_content[$varName]))
		{
			return secureVar($this->a_content[$varName]);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * assigns a value to a variable in the cookie array
	 * 
	 * @param string $varName variable name
	 * @param all $varValue
	 */
	function setVar($varName, $varValue)
	{
		if(is_array($varValue))
		{
			$length = strlen(serialize($varValue));
		}
		else
		{
			$length = strlen($varValue);
		}
			
		if($length < MAX_LENGTH_ONE_VALUE_IN_COOKIE)
		{
			$this->a_content[$varName] = $varValue;
			return true;
		}
		else
		{
			printDebug("<br>Value '$varName' too big for the cookie, doesn't save...");
			return false;
		}
	}
	
	/**
	 * saves the cookie on visitor computer, called once at the end of the whole process
	 * 
	 * @return bool
	 */
	function save()
	{
		$this->p3p();
		$content = serialize($this->a_content);
		$content = base64_encode ($content);
		$this->setCookie($this->name, $content, time()+ $this->expire);
		return true;
	}
	
	/**
	 * taken from http://usphp.com/manual/en/function.setcookie.php
	 * fix expires bug for IE users (should i say expected to fix the bug in 2.3 b2)
	 * TODO fix domain bug but we don't use it yet
	 */
	function setCookie($Name, $Value, $Expires, $Path = '', $Domain = '', $Secure = false, $HTTPOnly = false)
	{
		if (!empty($Domain))
		{	
			// Fix the domain to accept domains with and without 'www.'.
			if (strtolower(substr($Domain, 0, 4)) == 'www.')  $Domain = substr($Domain, 4);
			
			$Domain = '.' . $Domain;
			
			// Remove port information.
			$Port = strpos($Domain, ':');
			if ($Port !== false)  $Domain = substr($Domain, 0, $Port);
		}
		
		header('Set-Cookie: ' . rawurlencode($Name) . '=' . rawurlencode($Value)
		 . (empty($Expires) ? '' : '; expires=' . gmdate('D, d-M-Y H:i:s', $Expires) . ' GMT')
		 . (empty($Path) ? '' : '; path=' . $Path)
		 . (empty($Domain) ? '' : '; domain=' . $Domain)
		 . (!$Secure ? '' : '; secure')
		 . (!$HTTPOnly ? '' : '; HttpOnly'), false);
	}
	
	function delete()
	{
		$this->p3p();
		setcookie($this->name, false, time() - 3600);
		return true;
	}
	
	function p3p()
	{
		header("P3P: CP='OTI DSP COR NID STP UNI OTPa OUR'");
	}
	
	
	/**
	 * Init the phpmv cookie used in logging. Called when no previous phpmv cookie detected.
	 * 
	 * @param string $uniqId Old uniqId if exists
	 * 
	 * @return string uniqId assigned
	 */
	function put($uniqId='')
	{
		printDebug("<br>=>Cookie is init on visitor (idcookie and last_visit_time)<br>");
		if($uniqId=='')
		{
			$uniqId = md5(uniqid(rand()));
		}
		$this->setVar('idcookie', $uniqId);
		$this->setVar('last_visit_time', todayTime());
		return $uniqId;
	}
}
?>