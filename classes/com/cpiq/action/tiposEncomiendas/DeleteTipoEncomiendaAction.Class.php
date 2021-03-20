<?php

/**
 * Acción para eliminar tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class DeleteTipoEncomiendaAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getTipoEncomiendaManager();
	}

	

}
