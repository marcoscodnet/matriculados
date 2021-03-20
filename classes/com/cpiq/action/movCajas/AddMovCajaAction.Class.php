<?php

/**
 * Acción para dar de alta un movCaja
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class AddMovCajaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPMovCajaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oMovCaja = new MovCaja();
		$oUser = CdtSecureUtils::getUserLogged();
		$oMovCaja->setUser($oUser);
		$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCaja->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oMovCaja;
	}

	protected function getEntityManager(){
		return ManagerFactory::getMovCajaManager();
	}

	
	
	
}
