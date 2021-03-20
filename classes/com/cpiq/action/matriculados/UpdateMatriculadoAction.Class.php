<?php

/**
 * Acción para actualizar un matriculado
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */
class UpdateMatriculadoAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPMatriculadoForm();
	}

	public function getNewEntityInstance(){
		$oMatriculado = new Matriculado();
		$oUser = CdtSecureUtils::getUserLogged();
		$oMatriculado->setUser($oUser);
		$oMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oMatriculado;
	}

	protected function getEntityManager(){
		return ManagerFactory::getMatriculadoManager();
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
		return 'update_matriculado_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_matriculado_error';
	}



}
