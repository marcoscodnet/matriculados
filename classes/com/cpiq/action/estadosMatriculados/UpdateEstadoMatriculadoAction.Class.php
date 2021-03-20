<?php

/**
 * Acción para actualizar un estado
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class UpdateEstadoMatriculadoAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPEstadoMatriculadoForm();
	}

	public function getNewEntityInstance(){
		return new EstadoMatriculado();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEstadoMatriculadoManager();
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
		return 'update_estadoMatriculado_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_estadoMatriculado_error';
	}



}
