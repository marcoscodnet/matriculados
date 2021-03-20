<?php

/**
 * Acción para eliminar títulos.
 *
 * @author marcos
 * @since 12-06-2013
 *
 */
class DeleteTituloAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getTituloManager();
	}

}
