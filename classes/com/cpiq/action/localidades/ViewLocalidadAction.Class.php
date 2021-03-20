<?php

/**
 * Acción para visualizar un localidad.
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class ViewLocalidadAction extends UpdateLocalidadInitAction {



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
		return CPIQ_MSG_LOCALIDAD_TITLE_VIEW;
	}

}
