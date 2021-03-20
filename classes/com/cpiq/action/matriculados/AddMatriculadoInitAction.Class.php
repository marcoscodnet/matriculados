<?php

/**
 * Acción para inicializar el contexto
 * para editar un matriculado.
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */

class AddMatriculadoInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPMatriculadoForm($action);
		$form->setOnSuccessCallback("miSuccess");
		//$form->setOnCancel("window.location.href = 'doAction?action=list_titulos&id=7';");
		return $form;
		
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
		return CPIQ_MSG_MATRICULADO_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_matriculado";
	}


}
