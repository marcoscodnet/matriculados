<?php

/**
 * Acción para dar de alta una entidad emisora en un popup.
 * 
 * @author mMrcos
 * @since 13/06/2013
 */
class AddEntidadEmisoraPopupInitAction  extends AddEntidadEmisoraInitAction {

	/**
	 * layout a utilizar para la salida.
	 * @return Layout
	 */
	protected function getLayout(){
		return new CdtLayoutBasicAjax();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = parent::getNewFormInstance($action);
		
		$onCancel = CdtUtils::getParam("onCancel");
		$form->setOnCancel($onCancel);
		
		$onSuccesCallback = CdtUtils::getParam("onSuccessCallback");
		$form->setOnSuccessCallback( $onSuccesCallback );
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$entidadEmisora =  parent::getNewEntityInstance();
		$entidadEmisora->setNombre( urldecode( CdtUtils::getParam("text") ) );
		return $entidadEmisora;
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
		return "add_entidadEmisora";
	}


}