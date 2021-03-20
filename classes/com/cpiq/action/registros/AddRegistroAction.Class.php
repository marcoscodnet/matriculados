<?php

/**
 * Acción para dar de alta una cuota
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class AddRegistroAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPRegistroForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oRegistro = new Registro();
		$oUser = CdtSecureUtils::getUserLogged();
		$oRegistro->setUser($oUser);
		$oRegistro->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oRegistro;
	}

	protected function getEntityManager(){
		return ManagerFactory::getRegistroManager();
	}
	
}
