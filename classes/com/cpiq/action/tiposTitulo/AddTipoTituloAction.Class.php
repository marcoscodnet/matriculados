<?php

/**
 * Acción para dar de alta un tipo de título
 *
 * @author Bernardo
 * @since 17-05-2013
 *
 */
class AddTipoTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTipoTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoTituloManager();
	}



	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue agregado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/


}
