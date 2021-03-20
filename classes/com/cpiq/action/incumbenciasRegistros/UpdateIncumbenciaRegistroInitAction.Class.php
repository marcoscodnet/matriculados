<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbenciaRegistro.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */

class UpdateIncumbenciaRegistroInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaRegistroManager();
	}

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
		return new IncumbenciaRegistro();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_incumbenciaRegistro";
	}


}