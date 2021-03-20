<?php

/**
 * Acción para inicializar el contexto
 * para editar un título.
 *
 * @author marcos
 * @since 31-07-2013
 *
 */

class AddMatriculadoAddTituloInitAction extends AddTituloInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		
		$form = new CMPTituloForm($action);
		$form->setOnSuccessCallback("miSuccess");
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$titulo = new Titulo();
		$titulo->setFechaMatriculacion(date(CPIQ_DATE_FORMAT));
		$matriculado_oid = CdtUtils::getParam('matriculado_oid');
			
		if (!empty( $matriculado_oid )) {
			$matriculado = new Matriculado();
			$matriculado->setOid($matriculado_oid);
			$titulo->setMatriculado($matriculado);
		}
		/*$filter = new CMPTituloFilter();
		$filter->fillSavedProperties();
		$titulo->setMatriculado($filter->getMatriculado());*/
		
		return $titulo;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_TITULO_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_matriculado_add_titulo";
	}


}
