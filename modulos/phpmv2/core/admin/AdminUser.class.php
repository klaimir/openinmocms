<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

// $Id: AdminUser.class.php 169 2006-11-16 23:13:44Z cmil $


require_once INCLUDE_PATH."/core/include/AdminModule.class.php";
require_once INCLUDE_PATH."/core/forms/FormUser.class.php";

class AdminUser extends AdminModule
{
    var $viewTemplate = "admin/user.tpl";
    
	function AdminUser()
	{
		parent::AdminModule();		
	}
	
	function needAUserSelected()
	{
		$idUser = $this->request->getAdminUser();
		
		if( !$idUser )
		{
			$o_user =& User::getInstance();
			
			$this->tpl->assign( 'users_available', $o_user->getAllUsers() );
			$this->tpl->template = "admin/user_selection.tpl";
			
			return false;
		}
		else
		{
			return $idUser;
		}
	}
	function process()
	{				
		$this->tpl->assign("action", $this->request->getActionName());
		
		switch( $this->request->getActionName() )
		{
			case 'add':
				$form = new FormUser( $this->tpl );
		
				$done = $form->process();
						
				if($done)
				{
					$this->setMessage( );
				}
			break;
			
			case 'mod':
			case 'modCur':
				if ($this->request->getActionName() === 'modCur') {
					$o_user =& User::getInstance();
					$userLogin = $o_user->getLogin();
				}
				else {
					$userLogin = $this->needAUserSelected();
				}
				
				if($userLogin)
				{
					$this->tpl->assign( 'user_selected', $userLogin );
					
					$form = new FormUser( $this->tpl, $userLogin );
			
					$done = $form->process();
						
					if($done)
					{
						$this->setMessage( );
					}
				}
				// else needASiteAdminSelected display the site selection form
			break;
			
			case 'del':
			
				$login = $this->needAUserSelected();
				
				if($login && $login != 'anonymous')
				{	
					$confirmed = $this->needConfirmation( 'user', $login );
					
					if($confirmed)
					{
						$confUser = new UserConfigDb();
						$confUser->delUser( $login );
						
						$this->setMessage( );
					}
				}
			break;
		}
		
		// case no site installed, do not generate 
		if(is_a( $this->site, "Site"))
		{
			$this->site->generateFiles();
		}
	}
}
?>