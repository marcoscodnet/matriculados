<?php

/**
 * Acción para inicializar el contexto
 * para editar una tipoEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */

class UpdateTipoEncomiendaInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getTipoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPTipoEncomiendaForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoEncomienda();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_tipoEncomienda";
	}

}