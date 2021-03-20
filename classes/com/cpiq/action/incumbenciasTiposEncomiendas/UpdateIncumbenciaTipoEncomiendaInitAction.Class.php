<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbenciaTipoEncomienda.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */

class UpdateIncumbenciaTipoEncomiendaInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPIncumbenciaTipoEncomiendaForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new IncumbenciaTipoEncomienda();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_incumbenciaTipoEncomienda";
	}


}