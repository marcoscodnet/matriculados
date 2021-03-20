<?php

/**
 * Acción para inicializar el contexto
 * para editar un tipo de estado de encomienda.
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */

class UpdateTipoEstadoEncomiendaInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getTipoEstadoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPTipoEstadoEncomiendaForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoEstadoEncomienda();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_TIPO_TITULO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_tipoEstadoEncomienda";
	}


}
