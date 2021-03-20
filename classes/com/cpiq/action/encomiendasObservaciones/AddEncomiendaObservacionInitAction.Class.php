<?php

/**
 * Acción para inicializar el contexto
 * para editar una observacion de la encomienda.
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */

class AddEncomiendaObservacionInitAction extends EditEntityInitAction {

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
		$encomiendaObservacion = new EncomiendaObservacion();
		
		$filter = new CMPEncomiendaObservacionFilter();
		$filter->fillSavedProperties();
		$encomiendaObservacion->setEncomienda($filter->getEncomienda());
		
		return $encomiendaObservacion;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_encomiendaObservacion";
	}


}
