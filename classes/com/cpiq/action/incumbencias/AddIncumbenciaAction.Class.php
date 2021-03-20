<?php

/**
 * Acción para dar de alta una incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class AddIncumbenciaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPIncumbenciaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
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
	
}
