<?php

/**
 * Acción para inicializar el contexto
 * para editar un estado.
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */

class UpdateEstadoMatriculadoInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getEstadoMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPEstadoMatriculadoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EstadoMatriculado();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ESTADO_MATRICULADO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_estadoMatriculado";
	}


}
