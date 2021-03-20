<?php

/**
 * Acción para inicializar el contexto
 * para editar un matriculado.
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */

class UpdateMatriculadoInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPMatriculadoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Matriculado();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_MATRICULADO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_matriculado";
	}


}