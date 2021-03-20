<?php

/**
 * Acción para actualizar un tipo de documento
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class UpdateTipoDocumentoAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPTipoDocumentoForm();
	}

	public function getNewEntityInstance(){
		return new TipoDocumento();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoDocumentoManager();
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
		return 'update_tipoDocumento_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_tipoDocumento_error';
	}



}
