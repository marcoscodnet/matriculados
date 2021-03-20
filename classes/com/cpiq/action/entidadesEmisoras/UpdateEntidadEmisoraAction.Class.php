<?php

/**
 * Acción para actualizar una entidad emisora
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class UpdateEntidadEmisoraAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPEntidadEmisoraForm();
	}

	public function getNewEntityInstance(){
		return new EntidadEmisora();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEntidadEmisoraManager();
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
		return 'update_entidadEmisora_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_entidadEmisora_error';
	}



}
