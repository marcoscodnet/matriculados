<?php

/**
 * Redefinimos el login para setear en sesi�n el matriculado
 * asociado al usuario logueado..
 *
 * @author Marcos
 * @since 08-10-2013
 *  
 */
class CPIQLoginAction extends CdtLoginAction {

    public function execute() {
        $forward = parent::execute();
        if (CdtSecureUtils::isUserLogged()) {

        	CdtUtils::cleanRequestError();
        	
            //obtenemos el usuario logueado.
            $oUser = CdtSecureUtils::getUserLogged();

            //chequeamos si el usuario es un matriculado.
            $oManager = new MatriculadoManager();
            $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_user', $oUser->getCd_user (), '=');
			$oMatriculado = $oManager->getEntity($oCriteria);
            if (!empty($oMatriculado)) {
            	CPIQUtils::login($oMatriculado);
                //$forward = 'login_member_success';
            }
            
            
        }

        return $forward;
    }

}