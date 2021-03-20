<?php

/**
 * Acción para inicializar el contexto
 * para editar un encomienda.
 *
 * @author Marcos
 * @since 04-10-2013
 *
 */

class AddEncomiendaInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPEncomiendaForm($action);
		
		//reseteamos los profesionales de sesión.
		$manager = new EncomiendaProfesionalSessionManager();
		$manager->deleteAll();

		//reseteamos los registros de sesión.
		$manager = new EncomiendaRegistroSessionManager();
		$manager->deleteAll();
		
		//reseteamos las especialidades de sesión.
		$manager = new EncomiendaEspecialidadSessionManager();
		$manager->deleteAll();
		
		return $form;
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Encomienda();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_encomienda";
	}


}
