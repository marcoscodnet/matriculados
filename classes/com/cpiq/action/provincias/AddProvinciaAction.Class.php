<?php

/**
 * Acción para dar de alta una Provincia
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class AddProvinciaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPProvinciaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Provincia();
	}

	protected function getEntityManager(){
		return ManagerFactory::getProvinciaManager();
	}

}
