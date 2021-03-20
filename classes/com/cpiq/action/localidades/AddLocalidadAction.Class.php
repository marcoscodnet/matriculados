<?php

/**
 * Acción para dar de alta una localidad
 *
 * @author Bernardo
 * @since 27-05-2013
 *
 */
class AddLocalidadAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPLocalidadForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Localidad();
	}

	protected function getEntityManager(){
		return ManagerFactory::getLocalidadManager();
	}

}
