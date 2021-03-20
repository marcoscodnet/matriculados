<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbencia tipoEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */

class AddIncumbenciaTipoEncomiendaInitAction extends EditEntityInitAction {

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
		$incumbenciaTipoEncomienda = new IncumbenciaTipoEncomienda();
		
		$filter = new CMPIncumbenciaTipoEncomiendaFilter();
		$filter->fillSavedProperties();
		$incumbenciaTipoEncomienda->setTipoEncomienda($filter->getTipoEncomienda());
		
		return $incumbenciaTipoEncomienda;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_incumbenciaTipoEncomienda";
	}


}
