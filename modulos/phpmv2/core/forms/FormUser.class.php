<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: FormUser.class.php 187 2007-01-17 11:03:48Z matthieu_ $


require_once INCLUDE_PATH . "/core/forms/Form.class.php";
require_once INCLUDE_PATH . "/core/include/UserConfigDb.class.php";

class FormUser extends Form
{
	var $login;
	function FormUser( &$template, $userLogin = false )
	{
		parent::Form( $template );
		
		$this->login = $userLogin;
	}
	
	function process()
	{
		
		if($this->login == 'anonymous') {
			return false;
		}
		if($this->login) {
			$info = User::getInfo( $this->login );
		}
		
		$req =& Request::getInstance();

		$tmpPassword = @$info['password'];
		$passwordMd5OrNot = !empty($tmpPassword)?$tmpPassword:'';
		if($req->getActionName() === 'modCur' ) 
		{
			$formElements = array(
				array ('hidden', 'form_login', $this->login),
				array('password', 'form_passwordold', "Old password:", 'value=""'),
				array('password', 'form_password', "New password:", 'value=""'),
				array('password', 'form_password2', $GLOBALS['lang']['admin_type_again'], 'value=""'),
				array('text', 'form_alias', "Alias", 'size=40 value="'.@$info['alias'].'"'),
				array('text', 'form_email', "email", 'value="'.@$info['email'].'"'),
				array('radio', 'form_send_mail', $GLOBALS['lang']['install_send_mail'], $GLOBALS['lang']['install_oui'], 'yes'),
				array('radio', 'form_send_mail', null, $GLOBALS['lang']['install_non'], 'no'),
			);
			$formRules = array(
				array('form_email', $GLOBALS['lang']['admin_valid_email'], 'email', '', 'server'),
				array('form_email', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_admin_mail']), 'required'),
	
				array('form_passwordold', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_user_oldPwd']), 'required'),
				array('form_passwordold', $GLOBALS['lang']['admin_user_oldPwd_bad'], 'checkOldCurrentPassword'),
				
				array('form_password', $GLOBALS['lang']['admin_valid_pass'], 'complexPassword'),
				array('form_password', $GLOBALS['lang']['admin_match_pass'], 'compareField', 'form_password2'),
				array('form_password', $GLOBALS['lang']['admin_valid_pass'], 'changePassword'),
	
				);
		}
		else {
			$formElements = array(
				array('password', 'form_password', "Password:", 'value="'.$passwordMd5OrNot.'"'),
				array('password', 'form_password2', $GLOBALS['lang']['admin_type_again'], 'value="'.$passwordMd5OrNot.'"'),
				array('text', 'form_alias', "Alias", 'size=40 value="'.@$info['alias'].'"'),
				array('text', 'form_email', "email", 'value="'.@$info['email'].'"'),
				array('radio', 'form_send_mail', $GLOBALS['lang']['install_send_mail'], $GLOBALS['lang']['install_oui'], 'yes'),
				array('radio', 'form_send_mail', null, $GLOBALS['lang']['install_non'], 'no'),
			);
		
			$formRules = array(
				array('form_email', $GLOBALS['lang']['admin_valid_email'], 'email', '', 'server'),
				array('form_email', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['admin_admin_mail']), 'required'),
	
				array('form_password', sprintf($GLOBALS['lang']['admin_required'], $GLOBALS['lang']['install_mdpadmin']), 'required'),
				array('form_password', $GLOBALS['lang']['admin_valid_pass'], 'complexPassword'),
				array('form_password', $GLOBALS['lang']['admin_match_pass'], 'compareField', 'form_password2'),
	
				);
		}
		

		// when adding a new element, add an input named login
		// else read the login in url
		if($req->getActionName() === 'add' )
		{
			$formElements = array_merge( 
				array(	array('text', 'form_login', "Login:", 'value=""')),
				$formElements
				);
			$formRules[] = array('form_login', sprintf($GLOBALS['lang']['admin_required'], "Login"), 'required');
			$formRules[] = array('form_login', "Alpha numeric only", 'alphanumeric');
			
			if($login = $this->getSubmitValue('form_login'))
			{
				$all = array_keys(User::getAllUsers());
				if(in_array( $login, $all ))
				{
					$this->setElementError( 'form_login', 'Login already exist in database!');
				}
			}
		}
		
		$this->addElements( $formElements , 'User Information');
		$this->setChecked( 'form_send_mail', @$info['send_mail']=='1'?'yes':'no' );
		$this->addRules( $formRules );
		
		
		return parent::process('install_general_setup');
	}
	
	function postProcess()
	{
		$confUser = new UserConfigDb();
		
		$req =& Request::getInstance();
		$curAction = $req->getActionName();
		
		if($curAction === 'modCur' ) 
		{
			// Verify if we update current user
			if ($this->getSubmitValue('form_login') === $this->login) 
			{
				$currentInfo = User::getInfo( $this->login );
				
				// Verify if old password is ok
				$tmpOldPwd = md5($this->getSubmitValue('form_passwordold'));
				if (@$currentInfo['password'] !== $tmpOldPwd) 
				{
					// Bad old password
					trigger_error('Bad old passord!', E_USER_ERROR);
				}
				else 
				{
					$info = array(	
						// db field name => new value
						'login' => $this->login,
						//'password' => $tmpPassword,
						'alias' => $this->getSubmitValue('form_alias'),
						'email' => $this->getSubmitValue('form_email'),
						'send_mail' => $this->getSubmitValue('form_send_mail')=='no'?0:1,
						);
						
					$submitPassword = $this->getSubmitValue('form_password');
					if ( !empty($submitPassword) && $submitPassword !== $tmpOldPwd) 
					{
						$info ['password'] = md5($submitPassword);
					}
					$curAction = 'mod';
				}
			}
			else 
			{
				trigger_error('Action not authorized. You can modify only your settings!', E_USER_ERROR);
			}
		}
		else {
			$info = array(	
				// db field name => new value
				'login' => $this->login?$this->login:$this->getSubmitValue('form_login'),
				//'password' => md5($this->getSubmitValue('form_password')),
				'alias' => $this->getSubmitValue('form_alias'),
				'email' => $this->getSubmitValue('form_email'),
				'send_mail' => $this->getSubmitValue('form_send_mail')=='no'?0:1,
			);
			if ($curAction == 'mod') {
				$currentInfo = User::getInfo( $this->login );
				if ($currentInfo['password'] !== $this->getSubmitValue('form_password')){
					$info['password'] = md5($this->getSubmitValue('form_password'));
				}
			}
			else {
				$info['password'] = md5($this->getSubmitValue('form_password'));
			}
		}
			
		switch( $curAction )
		{
			case 'add':
				$confUser->addUser( $info );
			break;
			
			case 'mod':				
				$confUser->modUser( $info );
			break;
						
			default:
				trigger_error('Action not specified for User configuration. Were you trying to add, modify, delete? Only YOU know that!', E_USER_ERROR);
			break;
		}
	}
}
?>