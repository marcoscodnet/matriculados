<?php

/**
 * Acción para actualizar una incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class UpdateIncumbenciaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPIncumbenciaForm();
	}

	public function getNewEntityInstance(){
		$oIncumbencia = new Incumbencia();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbencia->setUser($oUser);
		$oIncumbencia->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbencia;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaManager();
	}

	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_incumbencia_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_incumbencia_error';
	}

	
	


}
