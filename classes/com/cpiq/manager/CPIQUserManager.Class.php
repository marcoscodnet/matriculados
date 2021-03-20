<?php 

/** 
 * Manager para CPIQUser
 *  
 * @author Marcos
 * @since 28-10-2013
 */ 
class CPIQUserManager extends CdtUserManager{ 

	
	public function signup( CdtUser $oUser ){
				
		//chequeamos el captcha.
		//TODO ver c�mo mejorarlo.
		
		include("libs/captcha/securimage.php");
		$img = new Securimage();
		$valid = $img->check(CdtUtils::getParamPOST('captcha'));
		if(!$valid)
			throw new CaptchaException();
		
		CdtUtils::log_debug( "signup 1 ");
		
		//creamos la registraci�n
		$oRegistration = new CdtRegistration();
		
		$oRegistration->setDs_username( $oUser->getDs_username() );
		$oRegistration->setDs_password( md5($oUser->getDs_password()) ); 
		$oRegistration->setDs_email( $oUser->getDs_email() );
		
		CdtUtils::log_debug( "signup 2 ");
		
		$oManager = new CPIQRegistrationManager();
		$oManager->addCdtRegistration( $oRegistration );
		
				
	}	
	

	public function activateRegistration( $ds_activationCode ){

		$oRegistrationManager = new CPIQRegistrationManager();
		
		//buscamos la registraci�n
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_activationcode', $ds_activationCode, "=", new CdtCriteriaFormatStringValue());
		
		$oRegistration = $oRegistrationManager->getCdtRegistration( $oCriteria ); 
		if($oRegistration==null || $oRegistration->getCd_registration()==0){
			throw new GenericException( CDT_SECURE_MSG_ACTIVATION_CODE_INVALID );			
		}
		
		//vemos si ya expir�
		$dt_expiredTime = $oRegistration->getDt_date();
		$dt_expiredTime= date("Ymd", strtotime("$dt_expiredTime + 30 days"));
		$dt_date = date("Ymd");
		if($dt_expiredTime < $dt_date ){
			throw new GenericException( CDT_SECURE_MSG_ACTIVATION_CODE_EXPIRED );			
		}
		
		$oUser = $oRegistration->createCdtUser();
		
		//setear el usergroup por default.
		$oUserGroupManager = new CdtUserGroupManager();
		$oUserGroup = $oUserGroupManager->getCdtUserGroupById( CDT_SECURE_USERGROUP_DEFAULT_ID );
		
		$oUser->setCdtUserGroup( $oUserGroup );
		
		//persistir el usuario en la bbdd.
		$this->addCdtUser( $oUser );		
		
		//le agregamos el cd_user al matriculado
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('nroDocumento', $oUser->getDs_username(), '=');
		
		$managerMatriculado =  ManagerFactory::getMatriculadoManager();
		$oMatriculado = $managerMatriculado->getEntity($oCriteria);
		if (empty($oMatriculado)) {
			throw new GenericException( CPIQ_SECURE_MSG_ACTIVATION_MATRICULADO_ERROR );			
		}
		else{
			$oMatriculado->setCdtUser($oUser);
			$managerMatriculado->updateUsuario($oMatriculado);
		}
		
		//borrar la registraci�n.
		$oRegistrationManager->deleteCdtRegistration( $oRegistration->getCd_registration() );
		
		
		//TODO login del usuario.
		//$this->login( $oUsuario->getDs_nomusuario(), $oUsuario->getDs_password());
		
	}	
	
	public function addCdtUser(CdtUser $oCdtUser, $sendEmail=false, $subject="", XTemplate $xtpl=null) {
		 
		//validaciones;
		$this->validateNewUser( $oCdtUser->getDs_username(), $oCdtUser->getDs_email() );
		
		//persistir en la bbdd.
		$this->getCdtUserDAO()->addCdtUser($oCdtUser);
		
		//enviamos el email al nuevo usuario.
		$emailTo = $oCdtUser->getDs_email();
		if( $sendEmail && !empty( $emailTo ) ){
			
			$nameTo = $oCdtUser->getDs_name();
			
			//template
			if( empty( $xtpl)  )
				$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_MAIL_NEW_USER );
			
			//armamos el email.
			$bodyEmail = $this->buildNewUserEmail($oCdtUser, $newPassword, $xtpl );
			
			//subject
			if(empty($subject))
        		$subject = CDT_SECURE_MSG_NEW_USER_MAIL_SUBJECT;
        
        	//enviamos el mail.
			CdtUtils::sendMail($nameTo, $emailTo, $subject, $bodyEmail);
		}
			
		return $newPassword;
	}
	
/**
	 * se le env�a una nueva contrase�a a un usuario
	 * @param $ds_user puede ser el email o el username
	 */
	public function sendNewPassword( $ds_user, $subject="" ){
		
		//$ds_user puede ser el email o el username
		try{
			
			$oUser = $this->getUserByUsername( $ds_user );
				
		}catch (GenericException $ex){
			
			//si no existe buscamos por email.
			$oUser = $this->getUserByEmail( $ds_user );
		}
		

		//generamos la nueva clave.
		$newPassword =  CdtUtils::textoRadom(8) ;
		$oUser->setDs_password ( md5( $newPassword ) );
		
		//modificamos el usuario.
		$this->getCdtUserDAO()->updatePassword( $oUser );
		
		//enviamos el email con la nueva contrase�a.
		$to = $oUser->getDs_email();
		$nameTo = $oUser->getDs_name();
		if(!empty($namteTo))
			$nameTo = str_replace(",","", $namteTo);
		else{	
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nroDocumento', $oUser->getDs_username(), '=');
		
			$managerMatriculado =  ManagerFactory::getMatriculadoManager();
			$oMatriculado = $managerMatriculado->getEntity($oCriteria);
			if (empty($oMatriculado)) {
				$nameTo = $oMatriculado->getNombre().' '.$oMatriculado->getApellido();
			}
		}
			
		$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_MAIL_FORGOT_PASSWORD );
		$xtpl->assign ( 'WEB_PATH', WEB_PATH );
		$xtpl->assign('name', $nameTo);
		$xtpl->assign('password', $newPassword);
		$xtpl->parse('main');		
		$msg = $xtpl->text('main');
		
        if(empty($subject))
        	$subject = CDT_SECURE_MSG_FORGOT_PASSWORD_MAIL_SUBJECT;
        
		CdtUtils::sendMail($nameTo, $to, $subject, $msg);
		
		
	}
	
}
 
?>
