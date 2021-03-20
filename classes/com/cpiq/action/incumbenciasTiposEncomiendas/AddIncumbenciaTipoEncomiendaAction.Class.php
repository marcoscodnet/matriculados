<?php

/**
 * Acción para dar de alta un incumbencia tipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class AddIncumbenciaTipoEncomiendaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPIncumbenciaTipoEncomiendaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oIncumbenciaTipoEncomienda = new IncumbenciaTipoEncomienda();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbenciaTipoEncomienda->setUser($oUser);
		$oIncumbenciaTipoEncomienda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbenciaTipoEncomienda;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoEncomiendaManager();
	}



	


}
