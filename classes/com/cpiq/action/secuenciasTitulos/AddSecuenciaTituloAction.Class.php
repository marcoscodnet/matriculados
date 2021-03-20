<?php

/**
 * Acción para dar de alta una secuencia título
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class AddSecuenciaTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPSecuenciaTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new SecuenciaTitulo();
	}

	protected function getEntityManager(){
		return ManagerFactory::getSecuenciaTituloManager();
	}



	


}
