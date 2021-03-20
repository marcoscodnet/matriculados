<?php

/**
 * Acción para actualizar un pais
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class UpdatePaisAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPPaisForm();
	}

	public function getNewEntityInstance(){
		return new Pais();
	}

	protected function getEntityManager(){
		return ManagerFactory::getPaisManager();
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
		return 'update_pais_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_pais_error';
	}



}
