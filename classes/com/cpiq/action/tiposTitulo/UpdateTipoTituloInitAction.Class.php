<?php

/**
 * Acción para inicializar el contexto
 * para editar un tipo de título.
 *
 * @author Bernardo
 * @since 17-05-2013
 *
 */

class UpdateTipoTituloInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getTipoTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPTipoTituloForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoTitulo();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_TIPO_TITULO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_tipoTitulo";
	}


}
