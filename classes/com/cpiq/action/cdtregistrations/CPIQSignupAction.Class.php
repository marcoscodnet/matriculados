<?php 

/**
 * Acción para registrarse en el sistema.
 * 
 * @author Marcos
 * @since 28-10-2011
 * 
 */
class CPIQSignupAction extends CdtSignupAction{

	/**
	 * se registra el usuario en el sistema.
	 * @return forward.
	 */
	public function execute(){
			
		$oUser = $this->getEntity();
		
		try{
			
			CdtDbManager::begin_tran();
			
			$oManager = new CPIQUserManager();
			$oManager->signup( $oUser );
			
			$forward = 'signup_success';
			
			CdtDbManager::save();
			
		}catch(GenericException $ex){
			CdtDbManager::undo();
			$forward = $this->doForwardException( $ex, 'signup_error' );					
		}

		
		
		return $forward;
	}
	
	protected function getEntity(){
		
		$oUser = new CdtUser ( );
		
		$oUser->setDs_username( CdtUtils::getParamPOST('ds_username') ) ;
		
		$oUser->setDs_email (  CdtUtils::getParamPOST('ds_email') ) ;
		
		$oUser->setDs_password (  CdtUtils::getParamPOST('ds_password') ) ;
		
		return $oUser;
	}	
	
}