<?php

/**
 * Acción para actualizar un localidad
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class UpdateLocalidadAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPLocalidadForm();
	}

	public function getNewEntityInstance(){
		return new Localidad();
	}

	protected function getEntityManager(){
		return ManagerFactory::getLocalidadManager();
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
		return 'update_localidad_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_localidad_error';
	}



}
