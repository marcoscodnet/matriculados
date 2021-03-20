<?php

/**
 * Acción para dar de alta una Pais
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class AddPaisAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPPaisForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Pais();
	}

	protected function getEntityManager(){
		return ManagerFactory::getPaisManager();
	}

}
