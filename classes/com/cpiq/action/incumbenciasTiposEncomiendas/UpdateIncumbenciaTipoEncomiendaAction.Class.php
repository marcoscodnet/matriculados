<?php

/**
 * Acción para actualizar un incumbencia tipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class UpdateIncumbenciaTipoEncomiendaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPIncumbenciaTipoEncomiendaForm();
	}

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

	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue actualizado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_incumbenciaTipoEncomienda_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_incumbenciaTipoEncomienda_error';
	}



}
