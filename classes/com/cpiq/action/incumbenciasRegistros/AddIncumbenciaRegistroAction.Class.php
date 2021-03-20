<?php

/**
 * Acción para dar de alta un incumbencia registro
 *
 * @author Marcos
 * @since 13-12-2013
 *
 */
class AddIncumbenciaRegistroAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPIncumbenciaRegistroForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oIncumbenciaRegistro = new IncumbenciaRegistro();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbenciaRegistro->setUser($oUser);
		$oIncumbenciaRegistro->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbenciaRegistro;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaRegistroManager();
	}



	


}
