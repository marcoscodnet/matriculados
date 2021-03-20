<?php

/**
 * Acción para visualizar una entidad emisora.
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class ViewEntidadEmisoraAction extends UpdateEntidadEmisoraInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);


	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout() {
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle() {
		return CPIQ_MSG_ENTIDAD_EMISORA_TITLE_VIEW;
	}

}
