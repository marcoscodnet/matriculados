<?php

/**
 * Acción para dar de alta una tipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class AddTipoEncomiendaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTipoEncomiendaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oTipoEncomienda = new TipoEncomienda();
		$oUser = CdtSecureUtils::getUserLogged();
		$oTipoEncomienda->setUser($oUser);
		$oTipoEncomienda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oTipoEncomienda;
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoEncomiendaManager();
	}
	
}
