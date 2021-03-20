<?php

/**
 * Acción para inicializar el contexto
 * para editar un encomiendaObservacion.
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */

class UpdateEncomiendaObservacionInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaObservacionManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPEncomiendaObservacionForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EncomiendaObservacion();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_encomiendaObservacion";
	}


}