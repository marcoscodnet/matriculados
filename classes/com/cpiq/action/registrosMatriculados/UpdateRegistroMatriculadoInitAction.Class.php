<?php

/**
 * Acción para inicializar el contexto
 * para editar un registro matriculado.
 *
 * @author Marcos
 * @since 20-09-2013
 *
 */

class UpdateRegistroMatriculadoInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getRegistroMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPRegistroMatriculadoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new RegistroMatriculado();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_registroMatriculado";
	}


}