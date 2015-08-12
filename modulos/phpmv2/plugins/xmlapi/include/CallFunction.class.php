<?php

class CallFunction {

	var $fctApiName;
	var $fctComment;
	var $fctCodeName;
	var $fctParameters;
	var $fctResultDetail;

    function CallFunction($p_apiName, $p_comment, $p_codeName, $p_resultDetail) {
		$this->fctApiName = $p_apiName;
		$this->fctComment = $p_comment;
		$this->fctCodeName = $p_codeName;
		$this->fctResultDetail = $p_resultDetail;
		$this->fctParameters = array();
    }
    
	function addParameter($p_name, $p_comment, $p_defaultValue) {
		$this->fctParameters[] = new CallFunctionParameter($p_name, $p_comment, $p_defaultValue);
	}
}
?>