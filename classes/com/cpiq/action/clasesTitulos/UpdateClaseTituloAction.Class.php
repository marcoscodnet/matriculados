<?php

/**
 * Acción para actualizar una clase título
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class UpdateClaseTituloAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPClaseTituloForm();
	}

	public function getNewEntityInstance(){
		return new ClaseTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getClaseTituloManager();
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
		return 'update_claseTitulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_claseTitulo_error';
	}



}
