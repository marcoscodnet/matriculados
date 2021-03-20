<?php

/**
 * Acción para actualizar una registro
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class UpdateRegistroAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPRegistroForm();
	}

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

	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_registro_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_registro_error';
	}

	
	


}
