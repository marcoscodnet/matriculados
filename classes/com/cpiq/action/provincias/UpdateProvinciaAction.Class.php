<?php

/**
 * Acción para actualizar un provincia
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class UpdateProvinciaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPProvinciaForm();
	}

	public function getNewEntityInstance(){
		return new Provincia();
	}

	protected function getEntityManager(){
		return ManagerFactory::getProvinciaManager();
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
		return 'update_provincia_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_provincia_error';
	}



}
