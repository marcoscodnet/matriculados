<?php

/**
 * Acción para dar de alta un incumbencia tipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class AddIncumbenciaTipoTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPIncumbenciaTipoTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oIncumbenciaTipoTitulo = new IncumbenciaTipoTitulo();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbenciaTipoTitulo->setUser($oUser);
		$oIncumbenciaTipoTitulo->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbenciaTipoTitulo;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoTituloManager();
	}



	


}
