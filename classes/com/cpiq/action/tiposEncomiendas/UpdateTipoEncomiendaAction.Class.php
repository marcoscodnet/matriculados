<?php

/**
 * Acción para actualizar una tipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class UpdateTipoEncomiendaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPTipoEncomiendaForm();
	}

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

	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_tipoEncomienda_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_tipoEncomienda_error';
	}

	
	


}
