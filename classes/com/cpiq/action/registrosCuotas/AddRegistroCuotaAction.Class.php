<?php

/**
 * Acción para dar de alta un registro cuota
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class AddRegistroCuotaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPRegistroCuotaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oRegistroCuota = new RegistroCuota();
		$oUser = CdtSecureUtils::getUserLogged();
		$oRegistroCuota->setUser($oUser);
		$oRegistroCuota->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oRegistroCuota;
	}

	protected function getEntityManager(){
		return ManagerFactory::getRegistroCuotaManager();
	}



	


}
