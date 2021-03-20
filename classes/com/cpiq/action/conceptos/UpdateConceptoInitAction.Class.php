<?php

/**
 * Acción para inicializar el contexto
 * para editar una concepto.
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */

class UpdateConceptoInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getConceptoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPConceptoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Concepto();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CONCEPTO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_concepto";
	}

}