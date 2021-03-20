<?php

/**
 * Acción para actualizar un incumbencia tipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class UpdateIncumbenciaTipoTituloAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPIncumbenciaTipoTituloForm();
	}

	public function getNewEntityInstance(){
		$oIncumbenciaTipoTitulo = new IncumbenciaTipoTitulo();
		$oUser = CdtSecureUtils::getUserLogged();
		$oIncumbenciaTipoTitulo->setUser($oUser);
		$oIncumbenciaTipoTitulo->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oIncumbenciaTipoTitulo;
	}

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoTituloManager();
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
		return 'update_incumbenciaTipoTitulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_incumbenciaTipoTitulo_error';
	}



}
