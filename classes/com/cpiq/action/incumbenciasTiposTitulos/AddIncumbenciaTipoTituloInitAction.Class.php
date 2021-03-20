<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbencia tipoTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */

class AddIncumbenciaTipoTituloInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPIncumbenciaTipoTituloForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$incumbenciaTipoTitulo = new IncumbenciaTipoTitulo();
		
		$filter = new CMPIncumbenciaTipoTituloFilter();
		$filter->fillSavedProperties();
		$incumbenciaTipoTitulo->setIncumbencia($filter->getIncumbencia());
		
		
		return $incumbenciaTipoTitulo;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_incumbenciaTipoTitulo";
	}


}
