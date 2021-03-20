<?php

/**
 * Acción para dar de alta una entidad emisora
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class AddEntidadEmisoraAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEntidadEmisoraForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EntidadEmisora();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEntidadEmisoraManager();
	}



	


}
