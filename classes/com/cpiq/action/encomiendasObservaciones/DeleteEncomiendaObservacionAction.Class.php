<?php

/**
 * Acción para eliminar observacion.
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */
class DeleteEncomiendaObservacionAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaObservacionManager();
	}

	

}
