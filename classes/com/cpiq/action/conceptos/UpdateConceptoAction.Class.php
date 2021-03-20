<?php

/**
 * Acción para actualizar una concepto
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class UpdateConceptoAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPConceptoForm();
	}

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

	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_concepto_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_concepto_error';
	}

	
	


}
