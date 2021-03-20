<?php

/**
 * Acción para actualizar un tipo de título
 *
 * @author Bernardo
 * @since 17-05-2013
 *
 */
class UpdateTipoTituloAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPTipoTituloForm();
	}

	public function getNewEntityInstance(){
		return new TipoTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoTituloManager();
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
		return 'update_tipoTitulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_tipoTitulo_error';
	}



}
