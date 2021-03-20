<?php

/**
 * Acción para inicializar el contexto
 * para editar un tipo de documento.
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */

class UpdateTipoDocumentoInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getTipoDocumentoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPTipoDocumentoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoDocumento();
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
		return "update_tipoDocumento";
	}


}
