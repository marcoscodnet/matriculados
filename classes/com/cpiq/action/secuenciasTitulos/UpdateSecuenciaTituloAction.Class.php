<?php

/**
 * Acción para actualizar una secuencia título
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class UpdateSecuenciaTituloAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPSecuenciaTituloForm();
	}

	public function getNewEntityInstance(){
		return new SecuenciaTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getSecuenciaTituloManager();
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
		return 'update_secuenciaTitulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_secuenciaTitulo_error';
	}



}
