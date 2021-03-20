<?php

/**
 * Acción para actualizar un incumbencia tipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class UpdateIncumbenciaRegistroAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPIncumbenciaRegistroForm();
	}

	public function getNewEntityInstance(){
		$oIncumbenciaRegistro = new IncumbenciaRegistro();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbenciaRegistro->setUser($oUser);
		$oIncumbenciaRegistro->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbenciaRegistro;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaRegistroManager();
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
		return 'update_incumbenciaRegistro_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_incumbenciaRegistro_error';
	}



}
