<?php

/**
 * Acción para actualizar un registro matriculado
 *
 * @author Marcos
 * @since 20-09-2013
 *
 */
class UpdateRegistroMatriculadoAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPRegistroMatriculadoForm();
	}

	public function getNewEntityInstance(){
		$oRegistroMatriculado = new RegistroMatriculado();
		$oUser = CdtSecureUtils::getUserLogged();
		$oRegistroMatriculado->setUser($oUser);
		$oRegistroMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oRegistroMatriculado;
	}

	protected function getEntityManager(){
		return ManagerFactory::getRegistroMatriculadoManager();
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
		return 'update_registroMatriculado_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_registroMatriculado_error';
	}



}
