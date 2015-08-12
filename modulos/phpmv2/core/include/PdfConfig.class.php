<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: SitePdf.class.php 29 2006-08-18 07:35:21Z matthieu_ $

define("PDF_LOGIN_ADMIN", "pmvAdmin");

class PdfConfig
{
	var $pdfName;
	var $pdfLogin;
	var $pdfParam;
	var $isPublic;
	
	function PdfConfig($namePdf, $paramPdf, $loginPdf, $isPublic = false) {
		$this->pdfName = $namePdf;
		$this->pdfParam = $paramPdf;
		$this->pdfLogin = $loginPdf;
		$this->isPublic = $isPublic;
	}
	
	function isAdminPdf() {
		return ($this->pdfLogin == PDF_LOGIN_ADMIN);
	}
}

?>
