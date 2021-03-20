<?php

/**
 * Acción para inicializar el contexto
 * para editar un localidad.
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */

class UpdateLocalidadInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getLocalidadManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPLocalidadForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Localidad();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_LOCALIDAD_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_localidad";
	}


}
