<?php

/**
 * Acción para dar de alta un tipo de estado de encomienda
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class AddTipoEstadoEncomiendaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTipoEstadoEncomiendaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoEstadoEncomienda();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoEstadoEncomiendaManager();
	}



	


}
