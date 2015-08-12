<?php

class CallFunctionParameter {

	var $fctParamName;
	var $fctParamComment;
	var $fctParamDefaultValue;
	
    function CallFunctionParameter($p_name, $p_comment, $p_defaultValue) {
		$this->fctParamName = $p_name;
		$this->fctParamComment = $p_comment;
		$this->fctParamDefaultValue = $p_defaultValue;
    }
}
?>