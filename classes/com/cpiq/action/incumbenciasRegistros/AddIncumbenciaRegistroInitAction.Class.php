<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbencia registro.
 *
 * @author Marcos
 * @since 13-12-2013
 *
 */

class AddIncumbenciaRegistroInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPIncumbenciaRegistroForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$incumbenciaRegistro = new IncumbenciaRegistro();
		
		$filter = new CMPIncumbenciaRegistroFilter();
		$filter->fillSavedProperties();
		$incumbenciaRegistro->setIncumbencia($filter->getIncumbencia());
		
		
		return $incumbenciaRegistro;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_incumbenciaRegistro";
	}


}
