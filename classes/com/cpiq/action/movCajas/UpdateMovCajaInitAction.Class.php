<?php

/**
 * Acción para inicializar el contexto
 * para editar un movcaja.
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */

class UpdateMovCajaInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getMovCajaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPMovCajaForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new MovCaja();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return "";
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "";
	}

}