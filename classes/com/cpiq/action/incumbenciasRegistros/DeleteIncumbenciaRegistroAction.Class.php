<?php

/**
 * Acción para eliminar incumbencia tipoTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class DeleteIncumbenciaRegistroAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaRegistroManager();
	}

	

}
