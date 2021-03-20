<?php

/**
 * Acción para inicializar el contexto
 * para editar una clase título.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */

class UpdateClaseTituloInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getClaseTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPClaseTituloForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new ClaseTitulo();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CLASE_TITULO_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_claseTitulo";
	}


}
