<?php

/**
 * Acción para actualizar un tipo de estado de encomienda
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class UpdateTipoEstadoEncomiendaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPTipoEstadoEncomiendaForm();
	}

	public function getNewEntityInstance(){
		return new TipoEstadoEncomienda();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoEstadoEncomiendaManager();
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
		return 'update_tipoEstadoEncomienda_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_tipoEstadoEncomienda_error';
	}



}
