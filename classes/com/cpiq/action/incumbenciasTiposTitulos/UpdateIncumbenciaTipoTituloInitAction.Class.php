<?php

/**
 * Acción para inicializar el contexto
 * para editar un incumbenciaTipoTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */

class UpdateIncumbenciaTipoTituloInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoTituloManager();
	}

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
		return new IncumbenciaTipoTitulo();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_incumbenciaTipoTitulo";
	}


}