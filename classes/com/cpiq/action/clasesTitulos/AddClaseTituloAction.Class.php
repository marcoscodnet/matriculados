<?php

/**
 * Acción para dar de alta una clase título
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class AddClaseTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPClaseTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new ClaseTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getClaseTituloManager();
	}



	


}
