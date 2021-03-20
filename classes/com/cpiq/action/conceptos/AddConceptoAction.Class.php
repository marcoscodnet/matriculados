<?php

/**
 * Acción para dar de alta una concepto
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class AddConceptoAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPConceptoForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oConcepto = new Concepto();
		$oUser = CdtSecureUtils::getUserLogged();
		$oConcepto->setUser($oUser);
		$oConcepto->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oConcepto;
	}

	protected function getEntityManager(){
		return ManagerFactory::getConceptoManager();
	}

	
	
	
}
